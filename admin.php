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
    $nombre_producto = $_POST['nombre_producto'];
    $precio_producto = $_POST['precio_producto'];
    $descripcion_producto = $_POST['descripcion_producto'];
    $imagen_producto = $_FILES['imagen_producto']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($imagen_producto);

    if (move_uploaded_file($_FILES['imagen_producto']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO productos (nombre, precio, descripcion, imagen) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdss", $nombre_producto, $precio_producto, $descripcion_producto, $target_file);

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

// Editar producto
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_product'])) {
    $id_producto = $_POST['id_producto'];
    $nombre_producto = $_POST['nombre_producto'];
    $precio_producto = $_POST['precio_producto'];
    $descripcion_producto = $_POST['descripcion_producto'];
    $imagen_producto = $_FILES['imagen_producto']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($imagen_producto);

    if ($imagen_producto != '') {
        if (move_uploaded_file($_FILES['imagen_producto']['tmp_name'], $target_file)) {
            $sql = "UPDATE productos SET nombre=?, precio=?, descripcion=?, imagen=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sdssi", $nombre_producto, $precio_producto, $descripcion_producto, $target_file, $id_producto);
        }
    } else {
        $sql = "UPDATE productos SET nombre=?, precio=?, descripcion=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdsi", $nombre_producto, $precio_producto, $descripcion_producto, $id_producto);
    }

    if ($stmt->execute()) {
        $message = "Producto editado exitosamente.";
    } else {
        $message = "Error al editar el producto: " . $stmt->error;
    }

    $stmt->close();
}

// Obtener productos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

// Obtener historial de ventas
$sql_ventas = "SELECT ventas.*, usuarios.username, productos.nombre AS nombre_producto 
               FROM ventas 
               JOIN usuarios ON ventas.user_id = usuarios.id 
               JOIN productos ON ventas.product_id = productos.id";
$result_ventas = $conn->query($sql_ventas);

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
                <label for="nombre_producto">Nombre del Producto:</label>
                <input type="text" id="nombre_producto" name="nombre_producto" required>
            </div>
            <div class="form-group">
                <label for="precio_producto">Precio del Producto:</label>
                <input type="number" step="0.01" id="precio_producto" name="precio_producto" required>
            </div>
            <div class="form-group">
                <label for="descripcion_producto">Descripción del Producto:</label>
                <textarea id="descripcion_producto" name="descripcion_producto" required></textarea>
            </div>
            <div class="form-group">
                <label for="imagen_producto">Imagen del Producto:</label>
                <input type="file" id="imagen_producto" name="imagen_producto">
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
                    <th>Acciones</th>
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
                        <td>
                            <form action="admin.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id_producto" value="<?php echo $row['id']; ?>">
                                <input type="text" name="nombre_producto" value="<?php echo $row['nombre']; ?>" required>
                                <input type="number" step="0.01" name="precio_producto" value="<?php echo $row['precio']; ?>" required>
                                <textarea name="descripcion_producto" required><?php echo $row['descripcion']; ?></textarea>
                                <input type="file" name="imagen_producto">
                                <button type="submit" name="edit_product">Editar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <h2>Historial de Ventas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Venta</th>
                    <th>Usuario</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result_ventas->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['nombre_producto']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
