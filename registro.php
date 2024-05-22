<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Usuario</title>
  <link rel="stylesheet" href="css\registro.css">
</head>
<body>
    <body>
        <div class="container">
          <div class="logo-container">
            <img src="ruta-a-tu-logo.png" alt="Logo" class="logo">
          </div>
          <h2>Registro de Usuario</h2>
          <form id="registration-form" action="register.php" method="POST">
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
