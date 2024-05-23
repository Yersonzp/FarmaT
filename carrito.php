<?php
include('php/config.php');
include('php/funtions.php');

// Obtener el ID del usuario desde la sesión.
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
} else {
    // Si no hay un usuario en la sesión, redirigir al inicio de sesión o manejar el error.
    header("Location: login.php");
    exit();
}

// Eliminar producto si se recibe la solicitud.
if (isset($_GET['remove_product_id'])) {
    $productId = $_GET['remove_product_id'];
    removeFromCart($conn, $userId, $productId);
    // Redirigir de nuevo al carrito para evitar resubmission.
    header("Location: carrito.php");
    exit();
}

// Obtener productos en el carrito para el usuario actual.
$cartProducts = getCartProducts($conn, $userId);

// Calcular el total del carrito.
$cartTotal = 0;
foreach ($cartProducts as $product) {
    $cartTotal += $product['precio'] * $product['quantity'];
}

// Verificar si se ha enviado una solicitud para actualizar el carrito.
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_cart'])) {
    // Procesar la actualización del carrito.
    foreach ($_POST['product_id'] as $index => $productId) {
        $quantity = $_POST['quantity'][$index];
        updateCartQuantity($conn, $userId, $productId, $quantity);
    }
    // Redirigir para evitar resubmission del formulario.
    header("Location: carrito.php");
    exit();
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
                        <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
                    </form>
                </div>
            </div>
            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="logo">
                        <div class="site-logo">
                            <a href="index.php" class="js-logo-clone"><strong class="text-primary">Farma</strong>T</a>
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
                                        <li class="has-children">
                                            <li><a href="#">Vitaminas</a></li>
                                            <li><a href="#">Dieta &amp; Nutricion</a></li>
                                            <li><a href="#">Te &amp; Coffee</a></li>
                                    </ul>
                                </li>
                                <li><a href="about.html">Acerca de </a></li>
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
        <div class="bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0">
                        <a href="index.php">Inicio</a> <span class="mx-2 mb-0">/</span>
                        <strong class="text-black">Carrito</strong>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-section">
            <div class="container">
                <div class="row mb-5">
                    <form class="col-md-12" method="post">
                        <div class="site-blocks-table">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Productos</th>
                                        <th class="product-price">Precio</th>
                                        <th class="product-quantity">Cantidad</th>
                                        <th class="product-total">Total</th>
                                        <th class="product-remove">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cartProducts as $product): ?>
                                        <tr>
                                            <td class="product-thumbnail">
                                                <img src="images/<?php echo $product['imagen']; ?>" alt="Image" class="img-fluid">
                                            </td>
                                            <td class="product-name">
                                                <h2 class="h5 text-black"><?php echo $product['nombre']; ?></h2>
                                            </td>
                                            <td>$<?php echo $product['precio']; ?></td>
                                            <td>
                                                <div class="input-group mb-3" style="max-width: 120px;">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                                    </div>
                                                    <input type="text" class="form-control text-center" name="quantity[]" value="<?php echo $product['quantity']; ?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>$<?php echo $product['precio'] * $product['quantity']; ?></td>
                                            <td><a href="carrito.php?remove_product_id=<?php echo $product['product_id']; ?>" class="btn btn-primary height-auto btn-sm">X</a></td>
                                            <input type="hidden" name="product_id[]" value="<?php echo $product['product_id']; ?>">
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" name="update_cart" class="btn btn-primary btn-md btn-block">Actualizar el carrito</button>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row mb-5">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <a href="shop.php" class="btn btn-outline-primary btn-md btn-block">Continuar comprando</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pl-5">
                        <div class="row justify-content-end">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12 text-right border-bottom mb-5">
                                        <h3 class="text-black h4 text-uppercase">TOTAL DEL CARRITO</h3>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <span class="text-black">Subtotal</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="text-black">$<?php echo $cartTotal; ?></strong>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <span class="text-black">Total</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="text-black">$<?php echo $cartTotal; ?></strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary btn-lg btn-block" onclick="window.location='checkout.html'">Proceda a pagar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="site-footer">
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
                            <h3 class="footer-heading mb-4">Informacion del contacto</h3>
                            <ul class="list-unstyled">
                                <li class="address">203 Fake St. Mountain View, San Francisco, Cartagena</li>
                                <li class="phone"><a href="tel://23923929210">+3217514647</a></li>
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
