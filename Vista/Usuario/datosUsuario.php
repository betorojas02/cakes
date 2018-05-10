  <?php
  include_once('../../Controlador/UsuarioControlador.php');
  session_start( );
  $id =  $_SESSION["usuario"]["id_usuario"];
  $usu = new UsuarioControlador();
  $usuarios = $usu->usuLC($id);

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
    <title>L&B CAKES</title>
  </head>
  <body >

    <header>
      <?php include("navbar/navbarUsuario.php"); ?>
    <!--  terminaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->
  </header>
    <?php foreach ($usuarios as $usua):?>
  <div class="container">
  <div class="row">
    <div class="col s12">
  <main>
    <div class="row">
      <div class="col s12">
        <ul class="tabs ">
          <li class="tab col s3 "><a class="active" href="#datosU">Datos De Usuario</a></li>
          <li class="tab col s3 "><a class="active" href="#comprasU">mis compras</a></li>

        </ul>
      </div>
      <div  class="col s12" >
        <div class="container" id="datos">
            <div class="row">
              <div class="col s12" >
                <div class="center">
                    <h2>L&B</h2>
                </div>
                <div id="datosU" class="col s12" >
                  <h4 class="center">Datos</h4>
                  <div class="row">
                      <div class="input-field col s6">
                            <input disabled id="Nombre" type="text" class="validate"   value="<?php echo $usua['nombre']; ?>">
                            <label >Nombre</label>
                      </div>
                      <div class="input-field col s6">
                                <input disabled  type="text" class="validate"  value="<?php echo $usua['apellido']; ?>">
                                <label >apellido</label>
                      </div>
                      <div class="input-field col s6">
                                <input disabled type="text" class="validate" value="<?php echo $usua['ciudad']; ?>">
                                <label >ciudad</label>
                      </div>
                      <div class="input-field col s6">
                                <input disabled  type="text" class="validate" value="<?php echo $usua['direccion']; ?>">
                                <label >direccion</label>
                      </div>
                      <div class="input-field col s6">
                                <input disabled  type="text" class="validate" value="<?php echo $usua['telefono']; ?>">
                                <label >telefono</label>
                      </div>
                      <div class="input-field col s6">
                                <input disabled type="text" class="validate" value="<?php echo $usua['barrio']; ?>">
                                <label >barrio</label>
                      </div>
                      <div class="input-field col s6">
                                <input disabled type="text" class="validate" value="<?php echo $usua['cedula']; ?>">
                                <label >cedula</label>
                      </div>
                      <div class="input-field col s6">
                      <label> Fecha de nacimiento</label>
                        <input disabled  type="text" class="datepicker" id="fecha" required value="<?php echo $usua['fecha_nacimiento']; ?>">

                      </div>

                </div>

                            <ul class="hide-on-med-and-down ">
                                <li><a  class="waves-effect waves-light btn modal-trigger pink darken-1" href="#modal2">editar </a></li>
                            </ul>

                  </div>
              </div>
            </div>
          </div>
      </div>

    </div>
    </main>
          </div>
        </div>
      </div>

      <div id="modal2" class="modal fixed-footer trans-card z-depth-4">
          <div class="modal-content trans-card col s4">
            <div class="row" style="padding:5%;overflow:hidden;">
              <form name="registrar" method="post" id="formE" action="" >
                <br><label><h4>Editar Cuenta:</h4></label>
                    <input disabled type="text" name="id_usuario" id="id_usuario"  style="display:none" required value="<?php echo $_SESSION["usuario"]["id_usuario"];?>  ">
        
                <div class="input-field col s6 m6 l6">
                  <label>Ciudad</label>
                  <input  class="validate" type="text" name="ciudad" id="ciudad" pattern="[a-z]{1,15}" required value="<?php echo $usua['ciudad']; ?>" >
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
                  <input  class="validate" type="text" name="barrio" id="barrio" required  value="<?php echo $usua['barrio']; ?>">
                </div>
    
              
  

                <div class="center col s12 m12 l12">
                  <br>
                  <button class="btn waves-effect waves-light left  pink darken-1" type="submit" id="submit-item" value="add">Enviar
                    <i class="material-icons right">send</i>
                  </button>
                </div>
              </form>
            </div>
          </div>

          <div class="modal-footer trans-card">
            <a href="#!" class="modal-action modal-close waves-effect waves-blue btn-flat blue-text darken-2">Cerrar</a>
          </div>
        </div>

      <?php  endforeach ?>
      <div  class="col s12" >
        <div class="container" id="datos">
            <div class="row">
              <div class="col s12" >
                <div class="center">
                    <h2>L&B</h2>
                </div>
          
                    <div id="comprasU" class="col s12" >
                      <h4 class="center">Compras</h4>
                      <div class="row">
                      </div>
                    </div>
              </div>
            </div>
        </div>
      </div>
        

    <!--  script jquery  -->
    <script type="text/javascript" src="../asset/js/jquery-3.3.1.min.js"></script>
      <!-- Compiled and minified JavaScript -->


    <script type="text/javascript" src="../asset/js/materialize.min.js"></script>
      <script type="text/javascript" src="../asset/dist/sweetalert.min.js"></script>
    <!--  script funciones index -->
    <script  src="../asset/js/index.js"></script>
      <script type="text/javascript" src="../asset/js/registro.js"></script>


  </body>
  </html>
