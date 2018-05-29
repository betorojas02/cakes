
<?php
	 require_once '../../Controlador/ProductoControladoor.php';
include '../../Controlador/recetaControlador.php';

if(isset($_POST['producto']) and isset ($_POST['ingrediente'])){



$pro = $_POST['producto'];
$ing= $_POST['ingrediente'];
$cantidad = $_POST['cantidad'];
$medida = $_POST['medida'];



 $saveItem = recetaControlador::addRecetas($pro,$ing,$cantidad, $medida);
  if($saveItem){
    $return['valid'] = true;
    $return['msg'] = "Nuevo registro agregado con éxito!";

  }else{
    $return['valid'] = false;
    $return['msg'] = "El nombre de esta receta ya existe";
  }
  echo json_encode($saveItem);


}


 ?>
