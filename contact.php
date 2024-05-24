<?php
include 'php/config.php';
session_start();

// Inicializar $cartProducts para evitar errores
$cartProducts = [];

// Verificar si el carrito está en la sesión
if (isset($_SESSION['cart'])) {
    $cartProducts = $_SESSION['cart'];
}

// Obtener ID del usuario si está conectado
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir los datos del formulario
    $fname = $_POST['c_fname'];
    $lname = $_POST['c_lname'];
    $email = $_POST['c_email'];
    $subject = $_POST['c_subject'];
    $message = $_POST['c_message'];

    // Validar los datos del formulario (opcional pero recomendado)
    $errors = [];
    if (empty($fname)) $errors[] = 'El nombre es requerido.';
    if (empty($lname)) $errors[] = 'El apellido es requerido.';
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'El email es inválido.';
    if (empty($message)) $errors[] = 'El mensaje es requerido.';

    if (empty($errors)) {
        $mail = new PHPMailer(true);
        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Cambia esto por el host de tu servidor SMTP
            $mail->SMTPAuth = true;
            $mail->Username   = 'farmat373@gmail.com'; // Tu correo de Gmail
            $mail->Password   = 'gihy kgyz vxwb oxub'; // Contraseña de la app de Gmail
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Configuración del correo
            $mail->setFrom($email, "$fname $lname");
            $mail->addAddress('tu_correo@example.com');
            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();
            $success_message = "Mensaje enviado exitosamente.";
        } catch (Exception $e) {
            $error_message = "Error al enviar el mensaje. Inténtalo de nuevo más tarde.";
        }
    } else {
        $error_message = implode('<br>', $errors);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>FarmaT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="site-wrap">
        <div class="site-navbar py-2">
            <div class="search-wrap">
                <div class="container">
                    <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
                    <form action="#" method="post">
                        <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
                    </form>
                </div>
            </div>
            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="logo">
                        <div class="site-logo">
                            <a href="index.php" class="js-logo-clone"><strong class="text-primary">FAR</strong>MAT</a>
                        </div>
                    </div>
                    <div class="main-nav d-none d-lg-block">
                        <nav class="site-navigation text-right text-md-center" role="navigation">
                            <ul class="site-menu js-clone-nav d-none d-lg-block">
                                <li><a href="index.php">Inicio</a></li>
                                <li class="has-children">
                                    <a href="shop.php">Productos</a>
                                    <ul class="dropdown">
                                        <li><a href="#">Suplementos</a></li>
                                        <li><a href="#">Vitaminas</a></li>
                                        <li><a href="#">Cuidado del bebe</a></li>
                                        <li><a href="#">Cuidado personal</a></li>
                                        <li><a href="#">Dieta &amp; Nutricion</a></li>
                                        <li><a href="#">Otros</a></li>
                                    </ul>
                                </li>
                                <li><a href="about.php">Acerca de</a></li>
                                <li><a href="contact.php">Contacto</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="icons">
                        <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
                        <a href="carrito.php" class="icons-btn d-inline-block bag">
                            <span class="icon-shopping-bag"></span>
                            <span class="number"><?php echo count($cartProducts); ?></span>
                        </a>
                        <?php if ($user_id) : ?>
                            <a href="#" class="icons-btn d-inline-block">Perfil</a>
                            <a href="logout.php" class="icons-btn d-inline-block">Cerrar Sesión</a>
                        <?php else : ?>
                            <a href="login.php" class="icons-btn d-inline-block">Iniciar Sesión</a>
                        <?php endif; ?>
                        <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0">
                        <a href="index.php">Inicio</a> <span class="mx-2 mb-0">/</span>
                        <strong class="text-black">Contacto</strong>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="h3 mb-5 text-black">Póngase en contacto</h2>
                    </div>
                    <div class="col-md-12">
                        <?php if (isset($error_message)) : ?>
                            <div class="alert alert-danger"><?php echo $error_message; ?></div>
                        <?php endif; ?>
                        <?php if (isset($success_message)) : ?>
                            <div class="alert alert-success"><?php echo $success_message; ?></div>
                        <?php endif; ?>

                        <form action="contact.php" method="post">
                            <div class="p-3 p-lg-5 border">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">Nombre <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_fname" name="c_fname">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="c_lname" class="text-black">Apellido <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="c_lname" name="c_lname">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="c_email" name="c_email" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="c_subject" class="text-black">Asunto</label>
                                        <input type="text" class="form-control" id="c_subject" name="c_subject">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="c_message" class="text-black">Mensaje</label>
                                        <textarea name="c_message" id="c_message" cols="30" rows="7" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Enviar Mensaje">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer class="site-footer bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                        <div class="block-7">
                            <h3 class="footer-heading mb-4">Acerca de <strong class="text-primary">FarmaT</strong></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quae reiciendis distinctio voluptates sed dolorum excepturi iure eaque, aut unde.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
                        <h3 class="footer-heading mb-4">Navegacion</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Suplementacion</a></li>
                            <li><a href="#">Vitaminas</a></li>
                            <li><a href="#">Dieta &amp; Nutricion</a></li>
                            <li><a href="#">Te &amp; Coffee</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="block-5 mb-5">
                            <h3 class="footer-heading mb-4">Contacto de Informacion</h3>
                            <ul class="list-unstyled">
                                <li class="address">203 Fake St. Mountain View, San Francisco, Cartagena</li>
                                <li class="phone"><a href="tel://3217514647">+3217514647</a></li>
                                <li class="email">yeimerballesta@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
