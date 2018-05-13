<?php
 // include_once('../../Controlador/UsuarioControlador.php');
 ?>
<div class="navbar-fixed" >
  <ul id="dropdown1" class="dropdown-content">
      <li><a href="datosUsuario.php" class="waves-effect waves-light modal-trigger" >perfil</a></li>
        <li class="divider"></li>
<li><a href="../login/cerrarSesion.php" id="BotonSignUp">Cerrar Sesion</a></li>

</ul>
 <nav id="nav">
    <div class="nav-wrapper container">
      <?php
      if (isset($_SESSION["usuario"]))
      {



     ?>
      <a href="#!" class="brand-logo left">L&B</a>
      <!--  corregir error de vista celurar en googgle y firefox-->
      <!-- <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a> -->
      <ul class="hide-on-med-and-down ">
        <li class="link"><a href="index.php">Inicio</a></li>
        <li class="link"><a href="pasteles.php">Pasteles</a></li>
        <li class="link disable"><a href="#!" >Postres</a></li>
        <li class="link"><a href="#!">Dulces y Galletas</a></li>
        <li class="link"><a href="#!">Favoritos</a></li>
        <ul id="" class="hide-on-med-and-down right">
          <!-- <li><a href="carrito/index.php" id="BotonCarrito" title="Ver Carrito de Compras"><img height="50px" src="img/carrito.png"></a></li> -->
<li><a class="dropdown-trigger" href="#!" data-target="dropdown1" id="BotonLogin" ><?php  echo $_SESSION["usuario"]["correo"];?><i class="material-icons right" style="color:rgb(73, 243, 244)">arrow_drop_down</i></a></li>
<li><a href="#" id="BotonCarrito" title="Ver Carrito de Compras"><img height="55px" id="logocarro" src="../asset/img/carrito.png"></a></li>
        </ul>
      </ul>
      <!-- <ul class="side-nav" id="mobile-demo">
        <li><a href="index.html">perrito</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">Javascript</a></li>
        <li><a href="mobile.html">Mobile</a></li>
      </ul> -->
    </div>
  </nav>
</div>


<!-- Modal Structure -->
<div id="modal1" class="modal">
  <div class="modal-content">
    <h4>Modal Header</h4>
  <p>Nombre: <?php echo $_SESSION["usuario"]["nombre"]; ?></p>
  <a class="waves-effect waves-light modal-trigger" href="editarU.php">editar</a>
</div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
  </div>
</div>
<!-- modal editar usuario -->
<!-- <div id="editarU" class="modal">
  <div class="modal-content">
    <h4>adsaddsa</h4>
    	<form name="signup" method="post" id="form-item" action="" >
            <div class="input-field ">
              <input type="text" name="nombre" id="nombre" required>
              <label>Nombre </label>
            </div>
            <button class="btn waves-effect waves-light left" type="submit" id="submit-item" value="add">Enviar
              <i class="material-icons right">send</i>
            </button>
        </form>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
  </div>
</div> -->

<div id="editarU" class="modal fixed-footer trans-card z-depth-4">
     <div class="modal-content trans-card col s4">
       <div class="row" style="padding:5%;overflow:hidden;">
         <form>
           <img src="https://www.dropbox.com/s/cio7s6lj27klwuj/whyles_circle_152x152.png?dl=1" class="" style="margin-left:35%" />
           <div class="input-field">
             <i class="material-icons prefix">person_outline</i>
             <input id="icon_prefix" type="text" class="validate">
             <label for="icon_prefix">username</label>
           </div>

           <div class="input-field">
             <i class="material-icons prefix">lock_outline</i>
             <input id="icon_telephone" type="password">
             <label for="icon_telephone">password</label>
           </div>

         </form>
       </div>


       </div>
       </div>

<?php }else{ ?>
<a href="#!" class="brand-logo left">L&B</a>
<!--  corregir error de vista celurar en googgle y firefox-->
<!-- <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a> -->
<ul class="hide-on-med-and-down ">
  <li class="link"><a href="index.php">Inicio</a></li>
  <li class="link"><a href="pasteles.php">Pasteles</a></li>
  <li class="link disable"><a href="#!" >Postres</a></li>
  <li class="link"><a href="#!">Dulces y Galletas</a></li>
  <li class="link"><a href="#!">Favoritos</a></li>
  <ul id="" class="hide-on-med-and-down right">
    <!-- <li><a href="carrito/index.php" id="BotonCarrito" title="Ver Carrito de Compras"><img height="50px" src="img/carrito.png"></a></li> -->
    <li><a href="../Usuario/registrar.php" id="BotonSignUp">Registrate</a></li>
    <li><a href="../login/login.php" id="BotonLogin">Inicio de sesión</a></li>
  </ul>
</ul>
<!-- <ul class="side-nav" id="mobile-demo">
  <li><a href="index.html">perrito</a></li>
  <li><a href="badges.html">Components</a></li>
  <li><a href="collapsible.html">Javascript</a></li>
  <li><a href="mobile.html">Mobile</a></li>
</ul> -->
</div>
</nav>
</div>


<?php
}
?>
