<?php
require_once('../../Controlador/UsuarioControlador.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
require 'vendor/autoload.php';
if(isset($_POST['correo']) ){


$correo = $_POST['correo'];

$emailr = UsuarioControlador::usuarioRepetidoC($correo);
if($emailr > 0){

  $mail = new PHPMailer;                              // Passing `true` enables exceptions
  try {

    $id = UsuarioControlador::recuperarC($correo);
      //Server settings
      // $mail->SMTPDebug = 1;                                 // Enable verbose debug output
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'lbcakes1234@gmail.com';                 // SMTP username
      $mail->Password = 'l&bcakes1234';                           // SMTP password
      $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 465;
      $mail->SMTPOptions = array(
          'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
          )
          );                                    // TCP port to connect to

      //Recipients
      $mail->setFrom('lbcakes1234@gmail.com', 'L&B CAKES');
      $mail->addAddress($correo, 'beto');     // Add a recipient
      $url = 'http://'.$_SERVER["SERVER_NAME"].'/cakes/vista/login/recuperar.php?user_id='.$id;

      $click = $url;


      //Attachments
      // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

      //Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Recuperar clave ';
      $mail->Body .="<h1 style='color:#3498db;'Bienvenido!</h1>";
      $mail->Body .= '<b> correo para envia para recupear clave </b>'.$correo;

      $mail->Body .= 'entrar a esta  url para recuperar tu clave url= <a href="'.$url.'">Click Aqui</a>';

      $mail->Body .= "<p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      // echo 'Message has been sent';
  } catch (Exception $e) {
      // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
  }
echo json_encode(array('error' => false ));
}else{
echo json_encode(array('error' => true ));
}
}

  ?>
