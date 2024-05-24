<?php
include 'php/config.php';
session_start();

// Inicializar $cartProducts para evitar errores
$cartProducts = [];

// Verificar si el carrito está en la sesión
if (isset($_SESSION['cart'])) {
    $cartProducts = $_SESSION['cart'];
}

// Obtener ID y nombre del usuario si está conectado
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : '';

// Inicializar $cartProducts para evitar errores
$cartProducts = [];

// Verificar si el carrito está en la sesión
if (isset($_SESSION['cart'])) {
    $cartProducts = $_SESSION['cart'];
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
            <div class="user-buttons">
              <?php if ($user_id) : ?>
                <a href="#" class="icons-btn d-inline-block"><span class="icon-user"></span> <?php echo htmlspecialchars($user_name); ?></a>
                <a href="logout.php" class="icons-btn d-inline-block"><span class="icon-sign-out"></span> Cerrar Sesion</a>
              <?php else : ?>
                <a href="login.php" class="icons-btn d-inline-block"><span class="icon-user"></span> Iniciar Sesion</a>
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
          <div class="col-md-12 mb-0">
            <a href="index.php">Inicio</a> <span class="mx-2 mb-0">/</span>
            <strong class="text-black">Pago</strong>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
            <div class="bg-light rounded p-3">
              <p class="mb-0">Returning customer? <a href="#" class="d-inline-block">Click aqui</a> para ingresar</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Detalle de la facturacion</h2>
            <div class="p-3 p-lg-5 border">
              <div class="form-group">
                <label for="c_country" class="text-black">Pais <span class="text-danger">*</span></label>
                <select id="c_country" class="form-control">
                  <option value="1">Selecciona un pais</option>
                  <option value="2">bangladesh</option>
                  <option value="3">Algeria</option>
                  <option value="4">Afghanistan</option>
                  <option value="5">Ghana</option>
                  <option value="6">Albania</option>
                  <option value="7">Bahrain</option>
                  <option value="8">Colombia</option>
                  <option value="9">Dominican Republic</option>
                </select>
              </div>
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
                  <label for="c_companyname" class="text-black">Nombre de la empresa </label>
                  <input type="text" class="form-control" id="c_companyname" name="c_companyname">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_address" class="text-black">Direccion <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Escriba la dirrecion">
                </div>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" placeholder="Apartamento, suite, unidad etc. (opcional)">
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_state_country" class="text-black">Estado / Pais <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_state_country" name="c_state_country">
                </div>
                <div class="col-md-6">
                  <label for="c_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_postal_zip" name="c_postal_zip">
                </div>
              </div>

              <div class="form-group row mb-5">
                <div class="col-md-6">
                  <label for="c_email_address" class="text-black">Direccion del correo <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_email_address" name="c_email_address">
                </div>
                <div class="col-md-6">
                  <label for="c_phone" class="text-black">Telefono <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Numero del telefono">
                </div>
              </div>

              <div class="form-group">
                <label for="c_create_account" class="text-black" data-toggle="collapse" href="#create_an_account" role="button" aria-expanded="false" aria-controls="create_an_account"><input type="checkbox" value="1" id="c_create_account"> Crear una cuenta?</label>
                <div class="collapse" id="create_an_account">
                  <div class="py-2">
                    <p class="mb-3">Cree una cuenta ingresando la información a continuación. Si usted es un cliente habitual, inicie sesión en la parte superior de la página.</p>
                    <div class="form-group">
                      <label for="c_account_password" class="text-black">Contraseña de la cuenta</label>
                      <input type="password" class="form-control" id="c_account_password" name="c_account_password" placeholder="">
                    </div>
                  </div>
                </div>
              </div>


              <div class="form-group">
                <label for="c_ship_different_address" class="text-black" data-toggle="collapse" href="#ship_different_address" role="button" aria-expanded="false" aria-controls="ship_different_address"><input type="checkbox" value="1" id="c_ship_different_address"> Enviar a una direccion diferente?</label>
                <div class="collapse" id="ship_different_address">
                  <div class="py-2">

                    <div class="form-group">
                      <label for="c_diff_country" class="text-black">Pais <span class="text-danger">*</span></label>
                      <select id="c_diff_country" class="form-control">
                        <option value="1">Selecciona un pais</option>
                        <option value="2">bangladesh</option>
                        <option value="3">Algeria</option>
                        <option value="4">Afghanistan</option>
                        <option value="5">Ghana</option>
                        <option value="6">Albania</option>
                        <option value="7">Bahrain</option>
                        <option value="8">Colombia</option>
                        <option value="9">Dominican Republic</option>
                      </select>
                    </div>


                    <div class="form-group row">
                      <div class="col-md-6">
                        <label for="c_diff_fname" class="text-black">Nombre <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_fname" name="c_diff_fname">
                      </div>
                      <div class="col-md-6">
                        <label for="c_diff_lname" class="text-black">Apellido <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_lname" name="c_diff_lname">
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-md-12">
                        <label for="c_diff_companyname" class="text-black">Nombre de la empresa </label>
                        <input type="text" class="form-control" id="c_diff_companyname" name="c_diff_companyname">
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-md-12">
                        <label for="c_diff_address" class="text-black">Direccion <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_address" name="c_diff_address" placeholder="Escriba la dirrecion">
                      </div>
                    </div>

                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Apartamento, suite, unidad etc. (opcional)">
                    </div>

                    <div class="form-group row">
                      <div class="col-md-6">
                        <label for="c_diff_state_country" class="text-black">Estado / Pais <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_state_country" name="c_diff_state_country">
                      </div>
                      <div class="col-md-6">
                        <label for="c_diff_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_postal_zip" name="c_diff_postal_zip">
                      </div>
                    </div>

                    <div class="form-group row mb-5">
                      <div class="col-md-6">
                        <label for="c_diff_email_address" class="text-black">Direccion del correo <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_email_address" name="c_diff_email_address">
                      </div>
                      <div class="col-md-6">
                        <label for="c_diff_phone" class="text-black">Telefono <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_phone" name="c_diff_phone" placeholder="Numero del telefono">
                      </div>
                    </div>

                  </div>

                </div>
              </div>

              <div class="form-group">
                <label for="c_order_notes" class="text-black">Ordenes de la nota</label>
                <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Escriba sus notas"></textarea>
              </div>

            </div>
          </div>
          <div class="col-md-6">

            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Cupon</h2>
                <div class="p-3 p-lg-5 border">
                  <label for="c_code" class="text-black mb-3">Ingresa tu codigo de cupon si tienes uno</label>
                  <div class="input-group w-75">
                    <input type="text" class="form-control" id="c_code" placeholder="Codigo de cupon" aria-label="Coupon Code" aria-describedby="button-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary btn-sm" type="button" id="button-addon2">Aplicar</button>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Tu orden</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Producto</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
                      <?php
                      $total = 0;
                      foreach ($cartProducts as $product) {
                        $total += $product['price'] * $product['quantity'];
                        echo "<tr>
                                <td>{$product['name']} <strong class='mx-2'>x</strong> {$product['quantity']}</td>
                                <td>$" . number_format($product['price'] * $product['quantity'], 2) . "</td>
                              </tr>";
                      }
                      ?>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Orden Total</strong></td>
                        <td class="text-black font-weight-bold"><strong>$<?php echo number_format($total, 2); ?></strong></td>
                      </tr>
                    </tbody>
                  </table>

                  <div class="border p-3 mb-3">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Transferencia directa bancaria</a></h3>

                    <div class="collapse" id="collapsebank">
                      <div class="py-2">
                        <p class="mb-0">Hacer tu pago directamente en nuestra cuenta bancaria. Por favor use su ID de pedido como referencia del pago. Tu pedido no será enviado hasta que los fondos se hayan liquidado en nuestra cuenta.</p>
                      </div>
                    </div>
                  </div>

                  <div class="border p-3 mb-3">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Cheque Pagos</a></h3>

                    <div class="collapse" id="collapsecheque">
                      <div class="py-2">
                        <p class="mb-0">Hacer tu pago directamente en nuestra cuenta bancaria. Por favor use su ID de pedido como referencia del pago. Tu pedido no será enviado hasta que los fondos se hayan liquidado en nuestra cuenta.</p>
                      </div>
                    </div>
                  </div>

                  <div class="border p-3 mb-5">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">PayPal</a></h3>

                    <div class="collapse" id="collapsepaypal">
                      <div class="py-2">
                        <p class="mb-0">Paga a través de PayPal; puede pagar con su tarjeta de crédito si no tiene una cuenta de PayPal.</p>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <button class="btn btn-primary btn-lg btn-block" onclick="placeOrder()">Realizar pedido</button>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- </form> -->
      </div>
    </div>

    <script>
      function placeOrder() {
        const paymentMethod = document.querySelector('input[name="payment_method"]:checked');
        if (!paymentMethod) {
          alert('Please select a payment method');
          return;
        }
        
        const formData = new FormData();
        formData.append('billing_fname', document.getElementById('c_fname').value);
        formData.append('billing_lname', document.getElementById('c_lname').value);
        formData.append('billing_country', document.getElementById('c_country').value);
        formData.append('billing_address', document.getElementById('c_address').value);
        formData.append('billing_state', document.getElementById('c_state_country').value);
        formData.append('billing_postal_zip', document.getElementById('c_postal_zip').value);
        formData.append('billing_email_address', document.getElementById('c_email_address').value);
        formData.append('billing_phone', document.getElementById('c_phone').value);
        
        const shipDifferentAddress = document.getElementById('c_ship_different_address').checked;
        if (shipDifferentAddress) {
          formData.append('shipping_fname', document.getElementById('c_diff_fname').value);
          formData.append('shipping_lname', document.getElementById('c_diff_lname').value);
          formData.append('shipping_country', document.getElementById('c_diff_country').value);
          formData.append('shipping_address', document.getElementById('c_diff_address').value);
          formData.append('shipping_state', document.getElementById('c_diff_state_country').value);
          formData.append('shipping_postal_zip', document.getElementById('c_diff_postal_zip').value);
          formData.append('shipping_email_address', document.getElementById('c_diff_email_address').value);
          formData.append('shipping_phone', document.getElementById('c_diff_phone').value);
        }

        formData.append('order_notes', document.getElementById('c_order_notes').value);
        formData.append('payment_method', paymentMethod.value);
        
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'process_order.php', true);
        xhr.onload = function () {
          if (xhr.status === 200) {
            alert('Order placed successfully');
            window.location.href = 'order_success.php';
          } else {
            alert('An error occurred while placing the order');
          }
        };
        xhr.send(formData);
      }
    </script>
</body>

</html>
