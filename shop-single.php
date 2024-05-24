<?php
include('php/config.php');
include('php/funtions.php');

session_start();

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if ($user_id) {
    $cartProducts = getCartProducts($conn, $user_id);
    $user_name = getUserName($conn, $user_id); // función para obtener el nombre del usuario.
} else {
    $cartProducts = [];
}

// Obtener el ID del producto desde la URL
$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Obtener el producto por ID
$productos = getProductById($conn, $product_id); // Cambio realizado aquí

// Mensaje para mostrar resultados de agregar al carrito
$message = '';

// Verificar si se ha enviado una solicitud para agregar un producto al carrito
if (isset($_POST['add_to_cart'])) {
    //optener id del producto
    $productId = $_POST['product_id'];
    //optener el usuario
    $userId = $user_id;

    if ($userId) {
        $message = addToCart($conn, $productId, $userId);
    } else {
        $message = 'Debes estar logueado para agregar productos al carrito.';
    }
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
                            <a href="index.php" class="js-logo-clone"><strong class="text-primary">Pharma</strong>tive</a>
                        </div>
                    </div>
                    <div class="main-nav d-none d-lg-block">
                        <nav class="site-navigation text-right text-md-center" role="navigation">
                            <ul class="site-menu js-clone-nav d-none d-lg-block">
                                <li><a href="index.php">Inicio</a></li>
                                <li class="active"><a href="shop.php">Comprar</a></li>
                                <li class="has-children">
                                    <a href="#">Productos</a>
                                    <ul class="dropdown">
                                        <li><a href="#">Suplementacion</a></li>
                                        <li><a href="#">Vitaminas</a></li>
                                        <li><a href="#">Dieta &amp; Nutricion</a></li>
                                        <li><a href="#">Te &amp; Coffee</a></li>
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
                        <div class="user-buttons">
                            <?php if ($user_id): ?>
                                <a href="#" class="icons-btn d-inline-block"><span class="icon-user"></span> <?php echo htmlspecialchars($user_name); ?></a>
                                <a href="logout.php" class="icons-btn d-inline-block"><span class="icon-sign-out"></span> Logout</a>
                            <?php else: ?>
                                <a href="login.php" class="icons-btn d-inline-block"><span class="icon-user"></span> Login</a>
                            <?php endif; ?>
                        </div>
                        <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0"><a href="index.php">Inicio</a> <span class="mx-2 mb-0">/</span> <a href="shop.php">Comprar</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?php echo $productos['nombre']; ?></strong></div> 
                </div>
            </div>
        </div>

        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 mr-auto">
                        <div class="border text-center">
                            <img src="images/<?php echo $productos['imagen']; ?>" alt="Image" class="img-fluid p-5">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h2 class="text-black"><?php echo $productos['nombre']; ?></h2> 
                        <p><?php echo $productos['descripcion']; ?></p> 
                        <p><del>$<?php echo $productos['precio']; ?></del></p>
                        
                        <div class="mb-5">
                            <div class="input-group mb-3" style="max-width: 220px;">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                </div>
                                <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                </div>
                            </div>
                        </div>
                        <form action="shop-single.php?id=<?php echo $product_id; ?>" method="post">
                            <input type="hidden" name="product_id" value="<?php echo $productos['id']; ?>">
                            <button type="submit" name="add_to_cart" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Añadir al carro</button>
                        </form>
                        <?php if ($message): ?>
                            <p><?php echo $message; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <footer class="site-footer bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                        <div class="block-7">
                            <h3 class="footer-heading mb-4">About <strong class="text-primary">FarmaT</strong></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quae re

                        </div>
                    </div>
                    <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
                        <h3 class="footer-heading mb-4">Navigation</h3>
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
                                <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
                                <li class="email">emailaddress@domain.com</li>
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
