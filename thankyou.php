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
          <div class="col-md-12 mb-0"><a href="index.php">Inicio</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Gracias</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="icon-check_circle display-3 text-primary"></span>
            <h2 class="display-3 text-black">Gracias!</h2>
            <p class="lead mb-5">Su pedido se completo con exito.</p>
            <p><a href="shop.html" class="btn btn-md height-auto px-4 py-3 btn-primary">VOLVER A LA TIENDA</a></p>
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
              <p>En nuestra farmacia en línea, nos dedicamos a ofrecerte productos farmacéuticos de alta calidad y servicios confiables para cuidar de tu salud y bienestar. Con un amplio catálogo de medicamentos, productos de cuidado personal y atención al cliente excepcional, 
                estamos aquí para ser tu aliado en el camino hacia una vida más saludable.</p>
            </div>

          </div>
          <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4">Navegacion</h3>
            <ul class="list-unstyled">
              <li><a href="#">Suplementos</a></li>
              <li><a href="#">Vitaminas</a></li>
              <li><a href="#">Dieta &amp; Nutricion</a></li>
              <li><a href="#">Te &amp; Cafe</a></li>
            </ul>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contacto de Informacion</h3>
              <ul class="list-unstyled">
                <li class="address">Calle 30 20-115,Cartagena</li>
                <li class="phone"><a href="tel://3217514647">3217514647</a></li>
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