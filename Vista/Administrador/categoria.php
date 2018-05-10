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
  <style type="text/css">

  .btn:text{
  	background-color: #000;
  }
  .btn:hover
  {
  	background-color: #ba68c8;
  }
  </style>
<body>
  <?php include '../Partials/menu.php'; ?>

    <main class="mdl-layout__content mdl-color--grey-100">

    <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
  <table  class="striped" style="text-align: left; width:100%; border-collapse:collapse;">
        <thead style="background-color: #FCE4EC; color:#4E342E; border-bottom:solid 5px #F50057; ">
          <tr>
              <th style="padding:20px;">ID</th>
              <th style="padding:20px;">Nombre tipo</th>
              <th style="padding:20px;"></th>
              <th style="padding:20px;"></th>
          </tr>
        </thead>

      <?php
          include '../../Controlador/IngreControlador.php';
         include '../../Controlador/TipoControlador.php';
         $resultado = TipoControlador::getTipo();
         while($filas = $resultado->fetch())
         {
           echo "<tr>";
           echo "<td style='padding:20px;'>"; echo "$filas[id_tipo]"; echo "</td>";
           echo "<td style='padding:20px;'>"; echo "$filas[nombre_tipo]"; echo "</td>";
           echo "<td style='padding:20px;' > <a class='mdl-navigation__link mdl-color-text--brown-800' href=''> <button class='mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-color--pink-A100'>Editar</button></a> </td>";
           echo "<td style='padding:20px;' > <a class='mdl-navigation__link mdl-color-text--brown-800' href=''> <button class='mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-color--pink-A100'>Eliminar</button></a> </td>";
           echo "</tr>";
         }
         ?>

      </table>

      </div>
             <a href="#!" class="btn pink lighten-3" align="center"><i class="material-icons">add</i> Agregar</a>
        </main>
      <br><br>



    <script src="../../Vista/Login/js/materialize.min.js"></script>
  <script src="../../Vista/Login/js/jquery.jquery-3.3.1.min.js"></script>
</body>
<?php include '../Partials/footer.php'; ?>
