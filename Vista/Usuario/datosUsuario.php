<?php
require_once "../../Controlador/UsuarioControlador.php";
require_once "../../include/session.php";
require_once "../../Controlador/cartControlador.php";

$cart = new Cart();
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'add':
            $cart->add_item($_GET['code'], $_GET['amount']);
            break;
        case 'remove':
            $cart->remove_item($_GET['code']);
            break;
    }
}

$id = $_SESSION["usuario"]["id_usuario"];

// $usu = new UsuarioControlador();
$usuarios = UsuarioControlador::usuLC($id);

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--  iconos de google-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="../asset/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="../asset/dist/sweetalert.css">
    <link rel="stylesheet" href="../asset/css/index.css">
    <link rel="stylesheet" href="../asset/css/datosUsu.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../asset/pink/pace-theme-flash.css">

    <title>L&B CAKES</title>
  </head>

  <body>

    <header>
      <?php include "navbar/navbarUsuario.php";?>
      <!--  terminaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->
    </header>
    <?php foreach ($usuarios as $usua): ?>
    <main>
      <div class="container">
        <div class="row">
          <div class="col s12">
            <ul class="tabs ">
              <li class="tab col s4 ">
                <a href="#datosU">Datos De Usuario</a>
              </li>
              <li class="tab col s4 ">
                <a href="#comprasU">mis compras</a>
              </li>
              <li class="tab col s4 ">
                <a class="active" href="#carritoCompras">Carrito </a>
              </li>
            </ul>
          </div>

          <div id="datosU">

            <div class="row" id="datos">
              <div class="input-field col s6">
                <input disabled id="Nombre" type="text" class="validate" value="<?php echo $usua['nombre']; ?>">
                <label>Nombre</label>
              </div>
              <div class="input-field col s6">
                <input disabled type="text" class="validate" value="<?php echo $usua['apellido']; ?>">
                <label>apellido</label>
              </div>
              <div class="input-field col s6">
                <input disabled type="text" class="validate" value="<?php echo $usua['ciudad']; ?>">
                <label>ciudad</label>
              </div>
              <div class="input-field col s6">
                <input disabled type="text" class="validate" value="<?php echo $usua['direccion']; ?>">
                <label>direccion</label>
              </div>
              <div class="input-field col s6">
                <input disabled type="text" class="validate" value="<?php echo $usua['telefono']; ?>">
                <label>telefono</label>
              </div>
              <div class="input-field col s6">
                <input disabled type="text" class="validate" value="<?php echo $usua['barrio']; ?>">
                <label>barrio</label>
              </div>
              <div class="input-field col s6">
                <input disabled type="text" class="validate" value="<?php echo $usua['cedula']; ?>">
                <label>cedula</label>
              </div>
              <div class="input-field col s6">
                <label> Fecha de nacimiento</label>
                <input disabled type="text" class="datepicker" id="fecha" required value="<?php echo $usua['fecha_nacimiento']; ?>">
              </div>

            </div>

          </div>

          <!-- fin de tab datosU -->
          <div id="comprasU">

            <div class="row" id="datos">
              <?php include "miscompras.php"?>


            </div>

          </div>
          <div id="carritoCompras">

            <div class="row" id="datos">


              <table border="1px" cellpadding="5px" width="100%">
                <thead class="cartHeader" display="off">
                  <tr>
                    <th colspan="6">MI CARRITO DE COMPRAS</th>
                  </tr>
                  <tr>
                    <th colspan="3">Total pagar:
                      <?=$cart->get_total_payment();?>
                    </th>
                    <th colspan="3">Total items:
                      <?=$cart->get_total_items();?>
                    </th>
                  </tr>
                </thead>
                <tbody class="cartBody">
                  <tr>
                    <th>Codigo</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Boton Eliminar</th>

                  </tr>
                  <?=$cart->get_items();?>

                </tbody>
              </table>
              <br>
              <div class="center">
                <div class="row">
                  <a href="index.php" class="waves-effect waves-light btn-large pink">Regresar a la tienda</a>
                </div>
              </div>
            </div>
          </div>

          <form method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/">
            <input name="merchantId" type="hidden" value="508029">
            <input name="accountId" type="hidden" value="512321">
            <input name="description" type="hidden" value="Test PAYU">
            <input name="referenceCode" type="hidden" value="TestPayU">
            <input name="amount" type="hidden" value="1000">
            <input name="tax" type="hidden" value="3193">
            <input name="taxReturnBase" type="hidden" value="16806">
            <input name="currency" type="hidden" value="COP">
            <input name="signature" type="hidden" value="7e970e41a70bca6c23117f1fab2ee28e">
            <input name="test" type="hidden" value="1">
            <input name="buyerEmail" type="hidden" value="test@test.com">
            <input name="responseUrl" type="hidden" value="http://www.test.com/response">
            <input name="confirmationUrl" type="hidden" value="http://www.test.com/confirmation">
            <input name="Submit" type="submit" value="Enviar">


            <!-- Producto -->




            <!-- ciere row -->
        </div>

        <!-- cierra de container principal -->
      </div>
    </main>
    <footer class="page-footer" id="footerContainer">
      <?php include "navbar/footer.php";?>
    </footer>
    <div id="modal2" class="modal fixed-footer trans-card z-depth-4">
      <div class="modal-content trans-card col s12 ">
        <div class="row" style="padding:5%;overflow:hidden;">
          <form name="registrar" method="post" id="formE" action="">
            <br>
            <label>
              <h4>Editar Cuenta:</h4>
            </label>
            <input disabled type="text" name="id_usuario" id="id_usuario" style="display:none" required value="<?php echo $_SESSION["
              usuario "]["id_usuario "]; ?>  ">
            <div class="input-field col s6 m6 l6">
              <label>Ciudad</label>
              <input class="validate" type="text" name="ciudad" id="ciudad" pattern="[a-z]{1,15}" required value="<?php echo $usua['ciudad']; ?>">
            </div>
            <div class="input-field col s6 m6 l6">
              <label>telefono</label>
              <input class="validate" type="number" name="telefono" id="telefono" required value="<?php echo $usua['telefono']; ?>">
            </div>

            <div class="input-field col s6 m6 l6">
              <label>Direccion</label>
              <input class="validate" type="text" name="direccion" id="direccion" required value="<?php echo $usua['direccion']; ?>">
            </div>
            <div class="input-field col s6 m6 l6">
              <label>Barrio</label>
              <input class="validate" type="text" name="barrio" id="barrio" required value="<?php echo $usua['barrio']; ?>">
            </div>

            <div class="center col s12 m12 l12">
              <br>
              <button class="btn waves-effect waves-light left  pink darken-1" type="submit" id="submit-item" value="add">Editar
                <i class="material-icons right">send</i>
              </button>
            </div>
            <div class="modal-footer trans-card ">
              <a href="#!" class="modal-action modal-close waves-effect waves-blue btn-flat blue-text darken-2">Cerrar</a>
            </div>
          </form>
        </div>
      </div>


    </div>


    <?php endforeach?>




    <!--  script jquery  -->
    <script type="text/javascript" src="../asset/js/jquery-3.3.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->


    <script type="text/javascript" src="../asset/js/materialize.min.js"></script>
    <script type="text/javascript" src="../asset/dist/sweetalert.min.js"></script>
    <!--  script funciones index -->
    <script src="../asset/js/index.js"></script>

    <script type="text/javascript" src="../asset/js/registro.js"></script>

    <script type="text/javascript" src="../asset/js/pace.min.js"></script>



  </body>

  </html>