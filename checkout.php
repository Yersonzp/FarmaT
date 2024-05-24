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
                  <label for="c_phone" class="text-black">Celular <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Phone Number">
                </div>
              </div>

              <div class="form-group">
                <label for="c_create_account" class="text-black" data-toggle="collapse" href="#create_an_account" role="button" aria-expanded="false" aria-controls="create_an_account"><input type="checkbox" value="1" id="c_create_account"> ¿Crear una cuenta?</label>
                <div class="collapse" id="create_an_account">
                  <div class="py-2">
                    <p class="mb-3">Crea una cuenta intruduciendo la informacion que aparece a continuacio.
                      Uste es un cliente recurrente,inicie session en la parte superior de la pagina.</p>
                    <div class="form-group">
                      <label for="c_account_password" class="text-black">Contraseña de la cuenta</label>
                      <input type="email" class="form-control" id="c_account_password" name="c_account_password" placeholder="">
                    </div>
                  </div>
                </div>
              </div>



              <div class="form-group">
                <label for="c_order_notes" class="text-black">Notas del pedido</label>
                <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
              </div>

            </div>
          </div>
          <div class="col-md-6">

            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Su pedido</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Producto</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Bioderma <strong class="mx-2">x</strong> 1</td>
                        <td>$55.00</td>
                      </tr>
                      <tr>
                        <td>Ibuprofeen <strong class="mx-2">x</strong> 1</td>
                        <td>$45.00</td>
                      </tr>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Subtotal del carrito</strong></td>
                        <td class="text-black">$350.00</td>
                      </tr>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Total de pago</strong></td>
                        <td class="text-black font-weight-bold"><strong>$350.00</strong></td>
                      </tr>
                    </tbody>
                  </table>

                  <div class="border mb-3">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Transferencia bancaria directa</a></h3>

                    <div class="collapse" id="collapsebank">
                      <div class="py-2 px-4">
                        <p class="mb-0">Realiza tu pago directamente en nuestra cuenta bancaria. Por favor, utilice su ID de pedido como
                          Referencia de pago. Su pedido no se enviará hasta que los fondos se hayan liquidado en nuestra cuenta
                        </p>
                      </div>
                    </div>
                  </div>

                  <div class="border mb-3">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Pago con cheque</a></h3>

                    <div class="collapse" id="collapsecheque">
                      <div class="py-2 px-4">
                        <p class="mb-0">Realiza tu pago directamente en nuestra cuenta bancaria. Por favor, utilice su ID de pedido como
                          Referencia de pago. Su pedido no se enviará hasta que los fondos se hayan liquidado en nuestra cuenta.
                        </p>
                      </div>
                    </div>
                  </div>

                  <div class="border mb-5">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>

                    <div class="collapse" id="collapsepaypal">
                      <div class="py-2 px-4">
                        <p class="mb-0">Realiza tu pago directamente en nuestra cuenta bancaria. Por favor, utilice su ID de pedido como
                          Referencia de pago. Su pedido no se enviará hasta que los fondos se hayan liquidado en nuestra cuenta.
                        </p>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <button class="btn btn-primary btn-lg btn-block" onclick="window.location='thankyou.php'">Hacer pedido</button>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- </form> -->
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
              <h3 class="footer-heading mb-4"> Informacion de contacto</h3>
              <ul class="list-unstyled">
                <li class="address">Informacion de contacto</li>
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