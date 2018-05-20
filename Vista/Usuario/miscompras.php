<?php
 require_once ('../../Controlador/DetallePedidoControlador.php');
 require_once ('../../Controlador/cartControlador.php');


 $id =  $_SESSION["usuario"]["id_usuario"];
 // $usu = new UsuarioControlador();
 $productos = DetallePedidoControlador::detallePedidoC($id);
 
 ?>

 <?php 
 if($productos > 0){

   # code...
 ?>
 <table id="example" class="striped" cellspacing="0" width="100%" >
            <thead>
              <tr>
                  <th>Producto</th>
                  <th>precio</th>
                  <th>cantidad</th>
                  <th>precio total</th>
                 
                  
              </tr>
            </thead>
            <tbody>
            <?php    foreach ($productos as $pro):?>
              <tr>
                <td><?php echo $pro['nombre']; ?></td>
                <td><?php echo $pro['precio_unidad']; ?></td>
                <td><?php echo $pro['cantidad']; ?></td>
                <td><?php echo $pro['precio_total']; ?></td>
             
            
                
              </tr>
              <?php endforeach ?>
           
            </tbody>
          </table>

 
  <?php }else{?>

          <br>
          <br>
          <br>
  <div class="container">
    <div class="row">
                <div class="center">
                  <div class="card-panel  pink darken-1" id="np">
<?php    
if(isset($_SESSION['cart'])){

$item = $_SESSION['cart'];
foreach($item as $i){
$datos =$i['code'];




echo $datos;
}
}else{
  echo "no esta";
}
// $hola= "asd";
// $peso = 124;
// $clave =md5($hola.$peso);
// echo $peso; 




?>

                  No Hay Compras Disponibles
                  </div>
                </div>  
              </div>
    </div>
  <?php }?>