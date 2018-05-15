
  <link rel="stylesheet" type="text/css" href="../asset/dist/sweetalert.css">
<?php include '../Partials/head.php';?>
<?php
//<h1>Bienvenido  <?php  echo $_SESSION["usuario"]["nombre"]; </h1>
if (isset($_SESSION["usuario"]))
{
  if($_SESSION["usuario"]["id_perfil"]==2)
  {
    header("location:../Usuario/index.php");
  }
}
else
{
  header ("location:../Login/login.php");
}
?>
<?php include '../Partials/menu.php'; ?>


      <main class="mdl-layout__content mdl-color--grey-100">


          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">


            <table class="striped"  style="text-align: left; width:100%; border-collapse:collapse;">
              <thead style="background-color: #FCE4EC; color:#4E342E; border-bottom:solid 5px #F50057; ">
                <tr >
                <!--  <th style="padding:20px;">No.</th> -->
                  <th style="padding:20px;">TIPO</th>
                  <th style="padding:20px;">NOMBRE</th>
                  <th style="padding:20px;">DESCRIPCIÓN</th>
                  <th style="padding:20px;">PRECIO</th>
                  <th style="padding:20px;">ESTADO</th>
                  <th style="padding:20px;">CALIFICACIÓN</th>
                  <th style="padding:20px;">IMAGEN</th>
                  <th style="padding:20px;">VOTOS</th>
                  <th style="padding:20px;">  <button id="new" class='mdl-button show-modal  mdl-js-button mdl-button--raised mdl-button--accent mdl-color--pink-A100'><i class="material-icons">add</i> Nuevo Producto</button>  <br><br> </th>
                  <th style="padding:20px;"></th>
              </thead>
                </tr>

              <?php
                include '../../Controlador/ProductoControlador.php';

                $resultado = ProductosController::getProductosControllers();

              foreach ($resultado as $filas)
                {
                  echo "<tr>";
                //  echo "<td style='padding:20px;'>";  echo "$filas[id_producto]";  echo "</td>";
                  echo "<td style='padding:20px;'>";  echo "$filas[id_tipo]";  echo "</td>";
                  echo "<td style='padding:20px;'>";  echo "$filas[nombre]";  echo "</td>";
                  echo "<td style='padding:20px;'>";  echo "$filas[descripcion]";  echo "</td>";
                  echo "<td style='padding:20px;'>";  echo "$filas[precio]";  echo "</td>";
                  echo "<td style='padding:20px;'>";  echo "$filas[estado]";  echo "</td>";
                  echo "<td style='padding:20px;'>";  echo "$filas[calificacion]";  echo "</td>";
                  echo "<td style='padding:20px;'>";  echo "<img src='".$filas['imagen']."'  width='100px' heigth='200px'>";  echo "</td>";
                  echo "<td style='padding:20px;'>";  echo "$filas[votos]";  echo "</td>";

                  echo "<td style='padding:20px;' > <span class='glyphicon glyphicon-pencil'></span>  <button id='ed' class='mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-color--pink-A100'>Editar</button></a> </td>";
                  echo "<td style='padding:20px;' > <a class='btn btn-danger' href='eliminaP.php?i2=".$filas['id_producto']."'> <button class='mdl-button show-modal mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-color--pink-A100'>Eliminar</button></a> </td>";
                  echo "</tr>";
                }
              ?>
            </table>
          </div>

          <dialog class="mdl-dialog" id="Nuevo">
          <div class="modal" id="nuevoUsu" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="mdl-button mdl-js-button mdl-button--icon close mdl-color--pink-A100" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Nuevo Producto</h4>
                    </div>
                    <div class="modal-body" id="h">
                       <form name="form" method="post" id="form-item" action="" enctype="multipart/form-data">

                         <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                           <input class="mdl-textfield__input" type="text" id="nombre" name="nombre" type="text" placeholder="Nombre" required>
                           <label class="mdl-textfield__label" for="nombre">Nombre</label>
                         </div>
                         <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable ">
                           <input class="mdl-textfield__input" type="text" id="descripcion" name="descripcion" type="text" placeholder="Descripcion" required>
                           <label class="mdl-textfield__label" for="descripcion">Descripcion</label>
                         </div>
                          <br>
                          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable ">
                            <input class="mdl-textfield__input" type="text" id="precio" name="precio" type="text" placeholder="Precio" required>
                            <label class="mdl-textfield__label" for="precio">Precio</label>
                          </div>
                          <br>
                          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                            <p>Tipo</p>
                            <select class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height" id="tipo" name="tipo">
                              <?php
                                include '../../Controlador/TipoControlador.php';
                                $resul = TipoControlador::getTipo();
                                while ($datos = $resul->fetch())
                                {
                                  echo "<option  value='".$datos['id_tipo']."'>"; echo $datos["nombre_tipo"]; echo "</option>";
                                }
                              ?>
                            </select>

                          </div>

                        <br>
                         <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable ">
                            <p>Imagen</p>
                           <input class="mdl-textfield__input"  id="imagen" name="imagen" type="file">
                         </div>
                         <button type="submit" class="class='mdl-button show-modal  mdl-js-button mdl-button--raised mdl-button--accent mdl-color--pink-A100" id="submit-item" value="add">Crear</button>
                       </form>
                    </div>

                </div>
            </div>
        </div>
 </dialog>








           <script>
           var dialog = document.querySelector('#Nuevo');
           var showModalButton = document.querySelector('#new');
           if (! dialog.showModal) {
             dialogPolyfill.registerDialog(dialog);
           }
           showModalButton.addEventListener('click', function() {
             dialog.showModal();
           });
           dialog.querySelector('.close').addEventListener('click', function() {
             dialog.close();
           });



           </script>




      </main>
    </div>

    <!--  script jquery  -->
    <script type="text/javascript" src="../asset/js/jquery-3.3.1.min.js"></script>
    <!-- <script type="text/javascript" src="../asset/js/jquery-1.12.3.js"></script> -->
    <script type="text/javascript" src="../asset/js/materialize.min.js"></script>
    <script type="text/javascript" src="../asset/dist/sweetalert.min.js"></script>

 <!-- <script type="text/javascript" src="../asset/js/producto.js"></script> -->

<script type="text/javascript" src="../asset/js/productos.js"></script>

<?php include '../Partials/footer.php'; ?>
