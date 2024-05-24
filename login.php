<?php
include 'php/config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id, password, activated, role FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hashed_password, $activated, $role);
        $stmt->fetch();

        if ($activated == 1 || $role == 'admin') {
          if (password_verify($password, $hashed_password)) {
              $_SESSION['user_id'] = $user_id;
              $_SESSION['email'] = $email;
              $_SESSION['role'] = $role;

              if ($role == 'admin') {
                  header("Location: admin.php");
              } else {
                  header("Location: index.php");
              }
              exit();
              
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "Cuenta no activada. Por favor, revisa tu correo para activar tu cuenta.";
        }
    } else {
        echo "Correo electrónico no encontrado.";
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
  <title>Inicio de Sesión</title>
  <link rel="stylesheet" href="css\login.css">
</head>
<body>
    <div class="container">
        <div class="logo-container">
          <img src="ruta-a-tu-logo.png" alt="Logo" class="logo">
        </div>
        <h2>Inicio de Sesión</h2>
        <form id="login-form" action="login.php" method="POST">
          <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
          </div>
          <button type="submit">Iniciar Sesión</button>
        </form>
        <p>¿No tiene una cuenta? <a href="registro.php">Regístrese aquí</a>.</p>
        <p>¿Olvidó su contraseña? <a href="forgot_password.php">Presione aquí</a>.</p>
      </div>
</body>
</html>

