<?php
// Función para obtener todos los productos de la base de datos
function getProducts($conn) {
    $sql = "SELECT * FROM productos";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Función para agregar un producto al carrito
// En functions.php

function addToCart($conn, $productId, $userId) {
    // Insertar el producto en la tabla del carrito
    $sql = "INSERT INTO carrito (product_id, user_id, quantity) VALUES (?, ?, 1)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $productId, $userId);
    if ($stmt->execute()) {
        return "Producto agregado al carrito.";
    } else {
        return "Error al agregar el producto al carrito: " . $conn->error;
    }
}

function getProductById($conn, $product_id) {
    $stmt = $conn->prepare("SELECT * FROM productOs WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

?>
