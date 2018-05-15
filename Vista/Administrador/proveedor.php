<!doctype html>
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
<body>
  <?php include '../Partials/menu.php'; ?>

    <main class="mdl-layout__content mdl-color--grey-100">

    <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">


          </tr>
 <br><br>
  <table  class="striped" style="text-align: left; width:100%; border-collapse:collapse;">
        <thead style="background-color: #FCE4EC; color:#4E342E; border-bottom:solid 5px #F50057; ">
          <tr>
              <th style="padding:20px;">No.</th>
              <th style="padding:20px;">Nombre empresa</th>
              <th style="padding:20px;">Nombre contacto</th>
              <th style="padding:20px;">Teléfono</th>
              <th style="padding:20px;">Dirección</th>
              <th style="padding:20px;">Ciudad</th>
              <th style="padding:20px;">Pais</th>
              <th style="padding:20px;">Sitio web</th>
             <th style="padding:20px;">  <button id="new" class='mdl-button show-modal  mdl-js-button mdl-button--raised mdl-button--accent mdl-color--pink-A100'><i class="material-icons">add</i>Nuevo Proveedor</button>  <br><br> </th>
              <th style="padding:20px;"></th>


            </tr>
        </thead>

      <?php
        include '../../Controlador/IngreControlador.php';
         include '../../Controlador/ProvControlador.php';
         $resultado = ProvControlador::getProveedores();
         while($filas = $resultado->fetch())
         {
           echo "<tr>";
           echo "<td style='padding:20px;'>"; echo "$filas[id_proveedor]"; echo "</td>";
           echo "<td style='padding:20px;'>"; echo "$filas[nombre_empresa]"; echo "</td>";
            echo "<td style='padding:20px;'>"; echo "$filas[nombre_contacto]"; echo "</td>";
             echo "<td style='padding:20px;'>"; echo "$filas[telefono_proveedor]"; echo "</td>";
              echo "<td style='padding:20px;'>"; echo "$filas[direccion_proveedor]"; echo "</td>";
               echo "<td style='padding:20px;'>"; echo "$filas[ciudad_proveedor]"; echo "</td>";
                echo "<td style='padding:20px;'>"; echo "$filas[pais_proveedor]"; echo "</td>";
                  echo "<td style='padding:20px;'>"; echo "$filas[sitio_web_proveedor]"; echo "</td>";
           echo "<td style='padding:20px;' > <a class='mdl-navigation__link mdl-color-text--brown-800' href=''> <button class='mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-color--pink-A100'>Editar</button></a> </td>";
           echo "<td style='padding:20px;' > <a class='mdl-navigation__link mdl-color-text--brown-800' href=''> <button class='mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-color--pink-A100'>Eliminar</button></a> </td>";
           echo "</tr>";
         }
         ?>
      </table>

      </div>
        </main>

        <dialog class="mdl-dialog" id="Nuevo">
        <div class="modal" id="nuevoIngre" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="mdl-button mdl-js-button mdl-button--icon close mdl-color--pink-A100" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4>Nuevo Proveedor</h4>
                  </div>
                  <div class="modal-body">
                     <form name="signup" method="post" id="form-item" action="">

                       <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                         <input class="mdl-textfield__input" type="text" id="nombre_empresa" name="nombre_empresa" type="text" placeholder="Nombre de la empresa" required>
                         <label class="mdl-textfield__label" for="nombre">Nombre de la empresa</label>
                       </div>
                       <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                         <input class="mdl-textfield__input" type="text" id="nombre_contacto" name="nombre_contacto" type="text" placeholder="Nombre del contacto" required>
                         <label class="mdl-textfield__label" for="nombre">Nombre del contacto</label>
                       </div>
                       <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                         <input class="mdl-textfield__input" type="text" id="telefono" name="telefono" type="text" placeholder="Teléfono" required>
                         <label class="mdl-textfield__label" for="nombre">Teléfono</label>
                       </div>
                       <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                         <input class="mdl-textfield__input" type="text" id="direccion" name="direccion" type="text" placeholder="Dirección" required>
                         <label class="mdl-textfield__label" for="nombre">Dirección</label>
                       </div>
                         <br>
                       <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable ">
                         <input class="mdl-textfield__input" type="text" id="ciudad" name="ciudad" type="text" placeholder="Ciudad" required>
                         <label class="mdl-textfield__label" for="precio">Ciudad</label>
                       </div>

                       <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable ">
                         <input class="mdl-textfield__input" type="text" id="pais" name="pais" type="text" placeholder="Pais" required>
                         <label class="mdl-textfield__label" for="cantidad">Pais</label>
                       </div>
                       <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable ">
                         <input class="mdl-textfield__input" type="text" id="region" name="region" type="text" placeholder="Región" required>
                         <label class="mdl-textfield__label" for="cantidad">Región</label>
                       </div>
                       <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable ">
                         <input class="mdl-textfield__input" type="text" id="sitio" name="sitio" type="text" placeholder="Sitio web" required>
                         <label class="mdl-textfield__label" for="cantidad">Sitio web</label>
                       </div>

                       <br>

                       <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">



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
      <script type="text/javascript" src="../asset/js/proveedor.js"></script>
</body>
<?php include '../Partials/footer.php'; ?>
