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
 <br><br>
  <table  class="striped" style="text-align: left; width:100%; border-collapse:collapse;">
        <thead style="background-color: #FCE4EC; color:#4E342E; border-bottom:solid 5px #F50057; ">
          <tr>
              <th style="padding:20px;">No.</th>
              <th style="padding:20px;">Nombre perfil</th>
              <th style="padding:20px;"></th>

              <th style="padding:20px;">  <button id="new" class='mdl-button show-modal  mdl-js-button mdl-button--raised mdl-button--accent mdl-color--pink-A100'><i class="material-icons">add</i> Nuevo Perfil</button>  <br><br> </th>
              <th style="padding:20px;"></th>
          </tr>
        </thead>

      <?php
         include '../../Controlador/PerfilControlador.php';
         $resultado = PerfilControlador::getPerfil();
         while($filas = $resultado->fetch())
         {
           echo "<tr>";
           echo "<td style='padding:20px;'>"; echo "$filas[id_perfil]"; echo "</td>";
           echo "<td style='padding:20px;'>"; echo "$filas[nombre_perfil]"; echo "</td>";
        //   echo "<td style='padding:20px;' > <a class='mdl-navigation__link mdl-color-text--brown-800' href=''> <button class='mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-color--pink-A100'>Editar</button></a> </td>";
           echo "<td style='padding:20px;' > <a class='mdl-navigation__link mdl-color-text--brown-800' href=''> <button class='mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-color--pink-A100'>Eliminar</button></a> </td>";
           echo "</tr>";
         }
         ?>

      </table>

      </div>
        </main>



        <dialog class="mdl-dialog" id="Nuevo">
        <div class="modal" id="nuevoPefil" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="mdl-button mdl-js-button mdl-button--icon close mdl-color--pink-A100" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4>Nuevo Perfil</h4>
                  </div>
                  <div class="modal-body">
                     <form name="signup" method="post" id="form-item" action="">

                       <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                         <input class="mdl-textfield__input" type="text" id="nombre" name="nombre" type="text" placeholder="Nombre" required>
                         <label class="mdl-textfield__label" for="nombre">Nombre</label>
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


    <script src="../../Vista/Login/js/materialize.min.js"></script>
  <script src="../../Vista/Login/js/jquery.jquery-3.3.1.min.js"></script>
</body>
<?php include '../Partials/footer.php'; ?>
