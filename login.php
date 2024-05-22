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

