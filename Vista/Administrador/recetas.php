<!doctype html>
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
                  <th style="padding:20px;">ITEM</th>
                  <th style="padding:20px;">PRODUCTO</th>
                  <th style="padding:20px;">INGREDIENTE</th>
                  <th style="padding:20px;">CANTIDAD</th>
                  <th style="padding:20px;">U. MEDIDA</th>
                  <th style="padding:20px;">   <button id="new" class='mdl-button show-modal  mdl-js-button mdl-button--raised mdl-button--accent mdl-color--pink-A100'><i class="material-icons">add</i> Nueva receta</button>  <br><br> </th>
                  <th style="padding:20px;"></th>
                </tr>
              </thead>

              <?php
							 require_once '../../Controlador/ProductoControladoor.php';
              require_once '../../Controlador/recetaControlador.php';

                $resultado = recetaControlador::getDatos();

                while ($filas =  $resultado->fetch())
                {
                  echo "<tr>";
                  echo "<td style='padding:20px;'>";  echo "$filas[item]";  echo "</td>";
                  echo "<td style='padding:20px;'>";  echo "$filas[nombre]";  echo "</td>";
                  echo "<td style='padding:20px;'>";  echo "$filas[nombre_ingrediente]";  echo "</td>";
                  echo "<td style='padding:20px;'>";  echo "$filas[cantidad]";  echo "</td>";
                  echo "<td style='padding:20px;'>";  echo "$filas[descripcion]";  echo "</td>";

                }

              ?>
            </table>

          </div>



					<dialog class="mdl-dialog" id="Nuevo">
					          <div class="modal" id="nuevareceta" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
					            <div class="modal-dialog">
					                <div class="modal-content">
					                    <div class="modal-header">
					                        <button type="button" class="mdl-button mdl-js-button mdl-button--icon close mdl-color--pink-A100" data-dismiss="modal" aria-hidden="true">&times;</button>
					                        <h4>Nueva receta</h4>
					                    </div>
					                    <div class="modal-body">
					                       <form name="signup" method="post" id="form-item" action="">


					                       <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">

					                            <select class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height" id="producto" name="producto">
					                              <?php

					                                $resul = ProductoControlador::getProductos();
					                                while ($datos = $resul->fetch())
					                                {
					                                  echo "<option  value='".$datos['id_producto']."'>"; echo $datos["nombre"]; echo "</option>";
					                                }
					                              ?>
					                            </select>

					                         </div>

					                         <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">

					                            <select class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height" id="ingrediente" name="ingre">
					                              <?php
					                                include_once '../../Controlador/IngreControlador.php';
					                                $resul = IngreControlador::getDatos();
					                                while ($datos = $resul->fetch())
					                                {
					                                  echo "<option  value='".$datos['id_ingrediente']."'>"; echo $datos["nombre_ingrediente"]; echo "</option>";
					                                }
					                              ?>
					                            </select>

					                         </div>

					                         <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable ">
					                           <input class="mdl-textfield__input" type="text" id="cantidad" name="cantidad" type="text" placeholder="Cantidad" required>
					                           <label class="mdl-textfield__label" for="cantidad">Cantidad</label>
					                         </div>

					                         <br>
																	 	<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">

					                            <select class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height" id="medida" name="medida">
					                              <?php
					                                include_once  '../../Controlador/medidaControlador.php';
					                                $resul = medidaControlador::getMedidas();
					                                while ($datos = $resul->fetch())
					                                {
					                                  echo "<option  value='".$datos['id_medida']."'>"; echo $datos["descripcion"]; echo "</option>";
					                                }
					                              ?>
					                            </select>

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
<script type="text/javascript" src="../asset/js/receta.js"></script>

<?php include '../Partials/footer.php'; ?>
