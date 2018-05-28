<?php 
 if(!empty($_SESSION['cart'])){

   ?>



            <div class="row">
              <?php 
          $key ="4Vj8eK4rloUd272L48hsrarnUA";
          $merchantId=508029;
           $accountId=512321;
           $referenceCode=date("d-m-Y h:i:s");
           $amount=$cart->get_total_payment();
           $currency="COP";
           $correo =  $_SESSION["usuario"]["correo"];        
           $ding = md5($key."~".$merchantId."~".$referenceCode."~".$amount."~".$currency);
           $url = 'http://'.$_SERVER["SERVER_NAME"].'/cakes/vista/usuario/compraRespuesta.php';
           ?>
              <form method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu">
                <input name="merchantId" type="hidden" value="<?php echo $merchantId?>">
                <input name="accountId" type="hidden" value="<?php  echo $accountId?>">
                <input name="description" type="hidden" value="VENTASCAKES">
                <input name="referenceCode" type="hidden" value="<?php echo $referenceCode?>">
                <input name="amount" type="hidden" value="<?php echo $amount?>">
                <input name="tax" type="hidden" value="" <input name="taxReturnBase" type="hidden" value="2">
                <input name="currency" type="hidden" value="<?php echo $currency?>">
                <input name="signature" type="hidden" value="<?php  echo $ding ?>">
                <input name="test" type="hidden" value="1">
                <input name="buyerEmail" type="hidden" value="<?php echo $correo?>">
                <input name="responseUrl" type="hidden" value="<?php echo $url ?>">
                <!-- <input name="confirmationUrl"    type="hidden"  value="http://www.test.com/confirmation" >  -->
                <button class="btn waves-effect waves-light pink pulse" name="Submit" type="submit" value="Realizar Compra"> Realizar Compra</button>
              </form>
              <?php
  }
  ?>