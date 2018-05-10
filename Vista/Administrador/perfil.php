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
             
              <th style="padding:20px;"> <a href="#!" ><button class="mdl-button mdl-button--raised mdl-button-accent mdl-color--pink-A100'"><i class="material-icons">add</i>Agregar perfil </button></a></th>
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
           echo "<td style='padding:20px;' > <a class='mdl-navigation__link mdl-color-text--brown-800' href=''> <button class='mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-color--pink-A100'>Editar</button></a> </td>";
           echo "<td style='padding:20px;' > <a class='mdl-navigation__link mdl-color-text--brown-800' href=''> <button class='mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-color--pink-A100'>Eliminar</button></a> </td>";
           echo "</tr>";
         }
         ?>

      </table>

      </div>
        </main>
      <br><br>



    <script src="../../Vista/Login/js/materialize.min.js"></script>
  <script src="../../Vista/Login/js/jquery.jquery-3.3.1.min.js"></script>
</body>
<?php include '../Partials/footer.php'; ?>
