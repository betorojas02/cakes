<?php
 require_once ('../../Controlador/DetallePedidoControlador.php');

 $id =  $_SESSION["usuario"]["id_usuario"];
 // $usu = new UsuarioControlador();
 $productos = DetallePedidoControlador::detallePedidoC($id);
 
 ?>

 <?php 
 if($productos > 0){
  foreach ($productos as $pro):
   # code...
 ?>
 <table id="example" class="striped" cellspacing="0" width="100%" >
            <thead>
              <tr>
                  <th>Producto</th>
                  <th>precio</th>
                  <th>cantidad</th>
                  <th>precio total</th>
                  <th>descuento </th>
                  
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $pro['nombre']; ?></td>
                <td><?php echo $pro['precio_unidad']; ?></td>
                <td><?php echo $pro['cantidad']; ?></td>
                <td><?php echo $pro['precio_total']; ?></td>
             
                <td>$0.87</td>
                
              </tr>
            
           
            </tbody>
          </table>

 <?php endforeach ?>
  <?php }else{?>

          <br>
          <br>
          <br>
  <div class="container">
    <div class="row">
                <div class="center">
                  <div class="card-panel  pink darken-1" id="np">
                  No Hay Compras Disponibles
                  </div>
                </div>  
              </div>
    </div>
  <?php }?>