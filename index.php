<?php
include 'php/config.php';
include 'php/funtions.php';

session_start();

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if ($user_id) {
    $cartProducts = getCartProducts($conn, $user_id);
} else {
    $cartProducts = [];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pharmative &mdash; Colorlib Template</title>
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
            <input type="text" class="form-control" placeholder="Busca la palabra clave y pulsa enter...">
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
                <li class="active"><a href="index.php">Inicio</a></li>
                <li><a href="shop.php">Catalogo</a></li>
                <li class="has-children">
                  <ul class="dropdown">
                    <li><a href="#">Suplementos</a></li>
                    <li><a href="#">Vitaminas</a></li>
                    <li><a href="#">Cuidado del bebe</a></li>
                    <li><a href="#">Cuidado personal</a></li>
                    <li><a href="#">Dieta &amp; Nutricion</a></li>
                    <li><a href="#">Otros</a></li>
                  </ul>
                </li>
                <li><a href="about.html">Acerca de</a></li>
                <li><a href="contact.html">Contacto</a></li>
              </ul>
            </nav>
          </div>
          <div class="icons">
            <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
            <a href="carrito.php" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
              <span class="number"><?php echo count($cartProducts); ?></span>
            </a>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
          </div>
        </div>
      </div>
    </div>
  
    <div class="owl-carousel owl-single px-0">
      <div class="site-blocks-cover overlay" style="background-image: url('images/hero_bg.jpg');">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 mx-auto align-self-center">
              <div class="site-block-cover-content text-center">
                <h1 class="mb-0"><strong class="text-primary">FARMAT</strong> ABIERTO LAS 24 HORAS</h1>
                <div class="row justify-content-center mb-5">
                  <div class="col-lg-6 text-center">
                    <p>SIEMPRE AL PENDIENTE DE SU CUIDADO</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="site-blocks-cover overlay" style="background-image: url('images/hero_bg_2.jpg');">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 mx-auto align-self-center">
              <div class="site-block-cover-content text-center">
                <h1 class="mb-0">¡TU SALUD ES NUESTRA <strong class="text-primary">PRIORIDAD!</strong></h1>
                <div class="row justify-content-center mb-5">
                  <div class="col-lg-6 text-center">
                    <p>Descubre una experiencia de compra única en nuestra farmacia.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="feature">
              <span class="wrap-icon flaticon-24-hours-drugs-delivery"></span>
              <h3><a href="#">ENVIOS 24/7</a></h3>
              <p>¡En nuestra farmacia, tu bienestar no tiene horario! Ofrecemos envíos 24/7 para que recibas tus
                medicamentos y productos de salud en cualquier momento del día. Compra en línea y disfruta de la
                comodidad y rapidez de nuestro servicio de entrega continua.</p>
              <p><a href="#" class="d-flex align-items-center"><span class="mr-2">Learn more</span> <span class="icon-keyboard_arrow_right"></span></a></p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="feature">
              <span class="wrap-icon flaticon-medicine"></span>
              <h3><a href="#">nueva medicina todos los dias</a></h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa laborum voluptates excepturi neque labore .</p>
              <p><a href="#" class="d-flex align-items-center"><span class="mr-2">Learn more</span> <span class="icon-keyboard_arrow_right"></span></a></p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="feature">
              <span class="wrap-icon flaticon-test-tubes"></span>
              <h3><a href="#">CALIDAD GARANTIZADA</a></h3>
              <p>Nuestra farmacia se compromete a garantizar la calidad de sus medicamentos en cada etapa, desde el
                almacenamiento hasta la entrega. Trabajamos con proveedores confiables y seguimos estrictos estándares
                de calidad para asegurarnos de que cada producto que ofrecemos cumpla con los más altos estándares de
                seguridad y eficacia.</p>
              <p><a href="#" class="d-flex align-items-center"><span class="mr-2">Learn more</span> <span class="icon-keyboard_arrow_right"></span></a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2>Nuestros <strong class="text-primary">Productos</strong></h2>
          </div>
        </div>
        <div class="row">
          <?php
          $stmt = $conn->prepare("SELECT * FROM productos");
          $stmt->execute();
          $result = $stmt->get_result();

          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo "<div class='col-sm-6 col-lg-4 text-center item mb-4 item-v2'>
                          <a href='shop-single.php?id={$row['id']}'><img src='images/{$row['imagen']}' alt='Image'></a>
                          <h3 class='text-dark'><a href='shop-single.php?id={$row['id']}'>{$row['nombre']}</a></h3>
                          <p class='price'>{$row['precio']}</p>
                        </div>";
              }
          } else {
              echo "<p>No se encontraron productos.</p>";
          }
          ?>
        </div>
      </div>
    </div>

    <div class="site-section bg-image overlay" style="background-image: url('images/hero_bg_2.jpg');">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-7">
            <h3 class="text-white">Registrate para poder disfrutar de nuestro servicio</h3>
            <p class="text-white">y asi tengas una gran esperiecia con nuetra plataforma facil y sencilla.</p>
            <p class="mb-0"><a href="registro.php" class="btn btn-outline-white">Registrar</a></p>
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
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quae reiciendis distinctio voluptates
                sed dolorum excepturi iure eaque, aut unde.</p>
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
