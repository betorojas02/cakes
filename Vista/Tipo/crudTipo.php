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

<head>
  <meta charset="UTF-8">
  <title>Tipo</title>
  <link rel="stylesheet" href="../../Vista/Login/css/materialize.min.css">
  <style type="text/css">
  	
  .btn:text{
  	background-color: #000;
  }
  .btn:hover
  {
  	background-color: #ba68c8;
  }
  </style>
</head>
<body>
  <?php include '../Partials/menu.php'; ?>
   <table  class="striped , centered" align="center"> 
        <thead>
          <tr>
              <th>ID</th>
              <th>Nombre tipo</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        include '../../Controlador/TipoControlador.php';
        $resultado = TipoControlador::getTipo();
        while($filas = $resultado->fetch())
        {
          echo "<tr>";
          echo "<td>"; echo "$filas[id_tipo]"; echo "</td>";
          echo "<td>"; echo "$filas[nombre_tipo]"; echo "</td>";
          echo "<td>"; echo  "<a href= #! class=btn><i class=material-icons>edit</i>Editar</a>";
          echo "<td>"; echo  "<a href= #! class=btn><i class=material-icons>delete_forever</i>Eliminar</a>";


        }

        ?>
		
  


        </tbody>
      </table>
      <br><br> 
         <a href="#!" class="btn pink lighten-3" align="center"><i class="material-icons">add</i> Agregar</a>


    <script src="../../Vista/Login/js/materialize.min.js"></script>
  <script src="../../Vista/Login/js/jquery.jquery-3.3.1.min.js"></script>
</body>
<?php include '../Partials/footer.php'; ?>
