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
                  <th style="padding:20px;">ID_IGREDIENTE</th>
                  <th style="padding:20px;">NOMBRE</th>
                  <th style="padding:20px;">PRECIO</th>
                  <th style="padding:20px;">CANTIDAD</th>
                  <th style="padding:20px;">PROVEEDOR</th>
                  <th style="padding:20px;">   <button id="new" class='mdl-button show-modal  mdl-js-button mdl-button--raised mdl-button--accent mdl-color--pink-A100'><i class="material-icons">add</i> Nuevo Ingrediente</button>  <br><br> </th>
                  <th style="padding:20px;"></th>
                </tr>
              </thead>

              <?php
                include '../../Controlador/IngreControlador.php';

                $resultado = IngreControlador::getDatos();

                While ($filas =  $resultado->fetch())
                {
                  echo "<tr>";
                  echo "<td style='padding:20px;'>";  echo "$filas[id_ingrediente]";  echo "</td>";
                  echo "<td style='padding:20px;'>";  echo "$filas[nombre_ingrediente]";  echo "</td>";
                  echo "<td style='padding:20px;'>";  echo "$filas[precio]";  echo "</td>";
                  echo "<td style='padding:20px;'>";  echo "$filas[cantidad]";  echo "</td>";
                  echo "<td style='padding:20px;'>";  echo "$filas[nombre_empresa]";  echo "</td>";
                  echo "<td style='padding:20px;' > <a class='btn btn-danger' class='editacion' id='editI'  href='#dialogo'>  <button class='mdl-button show-modal mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-color--pink-A100'>  Editar </button> </a> </td>";
                  echo "<td style='padding:20px;' > <a class='btn btn-danger' href='eliminaI.php?i2=".$filas['id_ingrediente']."'> <button class='mdl-button show-modal mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-color--pink-A100'>Eliminar</button></a> </td>";
                  echo "</tr>";
                }

              ?>
            </table>

          </div>

          <dialog class="mdl-dialog" id="Nuevo">
          <div class="modal" id="nuevoIngre" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="mdl-button mdl-js-button mdl-button--icon close mdl-color--pink-A100" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Nuevo Ingrediente</h4>
                    </div>
                    <div class="modal-body">
                       <form name="signup" method="post" id="form-item" action="">

                         <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                           <input class="mdl-textfield__input" type="text" id="nombre" name="nombre" type="text" placeholder="Nombre" required>
                           <label class="mdl-textfield__label" for="nombre">Nombre</label>
                         </div>
                         <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable ">
                           <input class="mdl-textfield__input" type="text" id="precio" name="precio" type="text" placeholder="Precio" required>
                           <label class="mdl-textfield__label" for="precio">Precio</label>
                         </div>
                          <br>

                         <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable ">
                           <input class="mdl-textfield__input" type="text" id="cantidad" name="cantidad" type="text" placeholder="Cantidad" required>
                           <label class="mdl-textfield__label" for="cantidad">Cantidad</label>
                         </div>

                         <br>

                         <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">

                            <select class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height" id="proveedor" name="proveedor">
                              <?php
                                include '../../Controlador/ProvControlador.php';
                                $resul = ProvControlador::getProveedores();
                                while ($datos = $resul->fetch())
                                {
                                  echo "<option  value='".$datos['id_proveedor']."'>"; echo $datos["nombre_empresa"]; echo "</option>";
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


						//  	(function() {
						//
            //    var dialogButton = document.querySelector('.editacion');
            //    var dialog = document.querySelector('#dialog');
            //    if (! dialog.showModal) {
            //      dialogPolyfill.registerDialog(dialog);
            //    }
            //    document.querySelector('.editacion').addEventListener('click', function() {
            //      dialog.showModal();
    			 	// 	 });
    				// 	dialog.querySelector('button:not([disabled])')
    				// 	.addEventListener('click', function() {
      			// 	dialog.close();
    				// 	});
						//
  					// }());

           </script>




      </main>
    </div>
    <!--  script jquery  -->
  	<script type="text/javascript" src="../asset/js/jquery-3.3.1.min.js"></script>
  	<!-- <script type="text/javascript" src="../asset/js/jquery-1.12.3.js"></script> -->
    <script type="text/javascript" src="../asset/js/materialize.min.js"></script>
    <script type="text/javascript" src="../asset/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="../asset/js/ingrediente.js"></script>

<?php include '../Partials/footer.php'; ?>

<div id="dialogo" class="modal fixed-footer trans-card z-depth-4">

 <div class="modal-dialog">
 <div class="modal-content">
 	 <div class="modal-header">
 			 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
 			 <h4>Editar Ingrediente</h4>
 	 </div>
 	 <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
 			<form action="actualiza.php" method="POST">

 						<input  id="id" name="id" type="hidden" ></input>
 						 <div class="form-group">
 							 <label for="nombre">Nombre:</label>
 							 <input class="form-control" id="nombre" name="nombre" type="text" ></input>
 						 </div>
 						 <div class="form-group">
 							 <label for="precio">Precio:</label>
 							 <input class="form-control" id="cantidad" name="precio" type="text" ></input>
 						 </div>
 						 <div class="form-group">
 							 <label for="cantidad">Cantidad:</label>
 							 <input class="form-control" id="cantidad" name="cantidad" type="text" ></input>
 						 </div>
						 <div class="form-group">
								<label for="proveedor">Proveedor:</label>
								<input class="form-control" id="proveedor" name="proveedor" type="text" ></input>
							</div>

  <input type="submit" class="mdl-button mdl-js-button  btn-success">
 			</form>
 	 </div>
 	 <div class="modal-footer">
 			 <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
 	 </div>
 </div>
 </div>


</div>
