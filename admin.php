<?php
include 'php/config.php';
session_start();

// Verificar si el usuario es administrador
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

// Manejar cierre de sesión
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

// Añadir nuevo producto
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];
    $product_image = $_FILES['product_image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($product_image);

    if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO productos (name, price, description, image) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdss", $product_name, $product_price, $product_description, $target_file);

        if ($stmt->execute()) {
            $message = "Producto agregado exitosamente.";
        } else {
            $message = "Error al agregar el producto: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $message = "Error al cargar la imagen.";
    }
}

// Obtener productos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="container">
        <h1>Panel de Administrador</h1>
        <form action="admin.php" method="POST">
            <button type="submit" name="logout">Cerrar Sesión</button>
        </form>
        <h2>Agregar Producto</h2>
        <form action="admin.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="producto_nombre">Nombre del Producto:</label>
                <input type="text" id="product_name" name="product_name" required>
            </div>
            <div class="form-group">
                <label for="producto_precio">Precio del Producto:</label>
                <input type="number" step="0.01" id="product_price" name="product_price" required>
            </div>
            <div class="form-group">
                <label for="producto_descripcion">Descripción del Producto:</label>
                <textarea id="product_description" name="product_description" required></textarea>
            </div>
            <div class="form-group">
                <label for="producto_imagen">Imagen del Producto:</label>
                <input type="file" id="product_image" name="product_image" required>
            </div>
            <button type="submit" name="add_product">Agregar Producto</button>
        </form>
        <?php if (isset($message)) { echo "<p>$message</p>"; } ?>

        <h2>Productos</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Producto</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['precio']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>
                        <td><img src="<?php echo $row['imagen']; ?>" alt="Imagen del producto" width="100"></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
