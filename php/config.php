<?php
$servername = "localhost";
$username = "root";
$password = ""; // Cambia esto si es necesario
$dbname = "farmaT_db";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
