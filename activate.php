<?php
include 'php/config.php';

if (isset($_GET['code'])) {
    $activation_code = $_GET['code'];

    // Verificar el código de activación en la base de datos
    $sql = "SELECT * FROM usuarios WHERE activation_code = ? AND activated = 0";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $activation_code);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Activar la cuenta del usuario
        $sql = "UPDATE usuarios SET activated = 1 WHERE activation_code = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $activation_code);
        $stmt->execute();

        echo "Cuenta activada con éxito. Ahora puedes iniciar sesión.";
    } else {
        echo "Código de activación no válido o cuenta ya activada.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "No se proporcionó ningún código de activación.";
}
?>
