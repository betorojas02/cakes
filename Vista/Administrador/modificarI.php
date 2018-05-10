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
<?php include '../Partials/menu.php'; ?>


      <main class="mdl-layout__content mdl-color--grey-100">


          <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">


              <form action="#">
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="sample3">
                    <label class="mdl-textfield__label" for="sample3">Text...</label>
                  </div>
              </form>

          </div>






      </main>
    </div>


<?php include '../Partials/footer.php'; ?>
