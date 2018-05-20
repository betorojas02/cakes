<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
  <header class="demo-header mdl-layout__header mdl-color--pink-A700 ">
    <div class="mdl-layout__header-row">
      <span class="mdl-layout-title"><?php  echo $_SESSION["usuario"]["id_perfil"] == 1 ? 'Administrador': 'Usuario' ;?></span>
      <div class="mdl-layout-spacer"></div>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
        <label class="mdl-button mdl-js-button mdl-button--icon" for="search">
          <i class="material-icons">search</i>
        </label>
        <div class="mdl-textfield__expandable-holder">
          <input class="mdl-textfield__input" type="text" id="search">
          <label class="mdl-textfield__label" for="search">Enter your query...</label>
        </div>
      </div>

      <a class="mdl-navigation__link " href="../Login/cerrarSesion.php">Cerrar Sesión</a>

      <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
        <i class="material-icons">more_vert</i>
      </button>
      <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
        <li class="mdl-menu__item">About</li>
        <li class="mdl-menu__item">Contact</li>
        <li class="mdl-menu__item">Legal information</li>
      </ul>

    </div>
  </header>
  <div class="demo-drawer mdl-layout__drawer mdl-color--pink-A700 mdl-color-text--white">
    <header class="demo-drawer-header">
      <img src="../Diseños/img/usuario.jpg" class="demo-avatar">
      <div class="demo-avatar-dropdown">
        <span> <?php  echo $_SESSION["usuario"]["correo"];?></span>
        <div class="mdl-layout-spacer"></div>
        <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
          <i class="material-icons" role="presentation">arrow_drop_down</i>
          <span class="visuallyhidden">Accounts</span>
        </button>
        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
          <li class="mdl-menu__item"> <?php  echo $_SESSION["usuario"]["correo"];?> </h1></li>
          <li class="mdl-menu__item" ><i class="material-icons">add</i>Add another account...</li>
        </ul>
      </div>
    </header>
    <nav class="demo-navigation mdl-navigation mdl-color--white">
      <a class="mdl-navigation__link mdl-color-text--brown-800  " href="index.php"><i class="mdl-color-text--brown-800 material-icons" role="presentation">home</i>Home</a>
  <a class="mdl-navigation__link mdl-color-text--brown-800" href="productos.php"><i class="mdl-color-text--brown-800 material-icons" role="presentation">restaurant_menu</i>Productos</a>
 <a class="mdl-navigation__link mdl-color-text--brown-800" href="ingredientes.php"><i class="mdl-color-text--brown-800 material-icons" role="presentation">restaurant_menu</i>Ingredientes</a>
      <a class="mdl-navigation__link mdl-color-text--brown-800" href="categoriaa.php"><i class="mdl-color-text--brown-800 material-icons" role="presentation">restaurant_menu</i>Categorias</a>
      <a class="mdl-navigation__link mdl-color-text--brown-800" href="perfil.php"><i class="mdl-color-text--brown-800 material-icons" role="presentation">people</i>Perfiles</a>
      <a class="mdl-navigation__link mdl-color-text--brown-800" href="proveedor.php"><i class="mdl-color-text--brown-800 material-icons" role="presentation">contact_phone</i>Proveedores</a>
      <a class="mdl-navigation__link mdl-color-text--brown-800" href=""><i class="mdl-color-text--brown-800 material-icons" role="presentation">flag</i>Updates</a>
      <a class="mdl-navigation__link mdl-color-text--brown-800" href=""><i class="mdl-color-text--brown-800 material-icons" role="presentation">local_offer</i>Promos</a>
      <a class="mdl-navigation__link mdl-color-text--brown-800" href=""><i class="mdl-color-text--brown-800 material-icons" role="presentation">shopping_cart</i>Purchases</a>
      <a class="mdl-navigation__link mdl-color-text--brown-800" href=""><i class="mdl-color-text--brown-800 material-icons" role="presentation">people</i>Social</a>


      <div class="mdl-layout-spacer"></div>
      <a class="mdl-navigation__link" href=""><i class="mdl-color-text--brown-800 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>
    </nav>

    </div>
