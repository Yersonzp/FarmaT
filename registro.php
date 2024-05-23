<?php
include 'php/config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer\src\Exception.php';
require 'PHPMailer\src\PHPMailer.php';
require 'PHPMailer\src\SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $birthdate = $_POST['birthdate'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $activation_code = md5($email . time());

    // Insertar el nuevo usuario en la base de datos
    $sql = "INSERT INTO usuarios (username, email, birthdate, password, activation_code, activated) VALUES (?, ?, ?, ?, ?, 0)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $username, $email, $birthdate, $password, $activation_code);

    if ($stmt->execute()) {
        // Enviar el correo de activación usando PHPMailer
        $activation_link = "http://localhost/FarmaT/activate.php?code=$activation_code";

        $mail = new PHPMailer(true);
        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp-relay.gmail.com'; // Cambia esto si usas otro servidor SMTP
            $mail->SMTPAuth   = true;
            $mail->Username   = 'farmat373@gmail.com'; // Tu correo de Gmail
            $mail->Password   = 'gihy kgyz vxwb oxub'; // Contraseña de la app de Gmail
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Recipientes
            $mail->setFrom('no-reply@tu-dominio.com', 'FarmaT');
            $mail->addAddress($email);

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Activa tu cuenta';
            $mail->Body    = "Hola $username,<br><br>Por favor, haz clic en el siguiente enlace para activar tu cuenta:<br><a href='$activation_link'>$activation_link</a><br><br>Gracias.";
            $mail->AltBody = "Hola $username,\n\nPor favor, haz clic en el siguiente enlace para activar tu cuenta:\n$activation_link\n\nGracias.";

            $mail->send();
            echo 'Registro exitoso. Por favor, revisa tu correo para activar tu cuenta.';
        } catch (Exception $e) {
            echo "Error al enviar el correo de activación. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Usuario</title>
  <link rel="stylesheet" href="css/registro.css">
</head>
<body>
    <div class="container">
      <div class="logo-container">
        <img src="ruta-a-tu-logo.png" alt="Logo" class="logo">
      </div>
      <h2>Registro de Usuario</h2>
      <form id="registration-form" action="registro.php" method="POST">
        <div class="form-group">
          <label for="username">Nombre de Usuario:</label>
          <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
          <label for="email">Correo Electrónico:</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="birthdate">Fecha de Nacimiento:</label>
          <input type="date" id="birthdate" name="birthdate" required>
        </div>
        <div class="form-group">
          <label for="password">Contraseña:</label>
          <input type="password" id="password" name="password" required>
          <div id="password-strength"></div>
        </div>
        <button type="submit">Registrarse</button>
      </form>
      <p>Si ya tienes una cuenta, <a href="login.php">inicia sesión aquí</a>.</p>
    </div>
  <script src="registro.js"></script>
</body>
</html>

