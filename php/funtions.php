<?php
// Función para obtener todos los productos de la base de datos
function getProducts($conn) {
    $sql = "SELECT * FROM productos";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Función para agregar un producto al carrito

function addToCart($conn, $productId, $userId) {
    // Primero, verifica si el producto ya está en el carrito
    $checkSql = "SELECT quantity FROM carrito WHERE product_id = ? AND user_id = ?";
    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param("ii", $productId, $userId);
    $stmt->execute();
    $stmt->store_result();
    
    $quantity = 0;  // Inicializar la variable $quantity
    
    if ($stmt->num_rows > 0) {
        
        // Si el producto ya está en el carrito, obtén la cantidad actual
        $stmt->bind_result($quantity);
        $stmt->fetch();
        $newQuantity = $quantity + 1;

        $updateSql = "UPDATE carrito SET quantity = ? WHERE product_id = ? AND user_id = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("iii", $newQuantity, $productId, $userId);

        if ($updateStmt->execute()) {
            return "Cantidad del producto actualizada en el carrito.";
        } else {
            return "Error al actualizar la cantidad del producto en el carrito: " . $conn->error;
        }
    } else {
        // Si el producto no está en el carrito, insértalo
        $insertSql = "INSERT INTO carrito (product_id, user_id, quantity) VALUES (?, ?, 1)";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bind_param("ii", $productId, $userId);

        if ($insertStmt->execute()) {
            return "Producto agregado al carrito.";
        } else {
            return "Error al agregar el producto al carrito: " . $conn->error;
        }
    }
}


function getProductById($conn, $product_id) {
    $stmt = $conn->prepare("SELECT * FROM productos WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

?>
