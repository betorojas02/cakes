<?php
require_once('../../Controlador/UsuarioControlador.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
if(isset($_POST['nombre']) ){


$nombre = $_POST['nombre'];
$apellido= $_POST['apellido'];
 $correo = $_POST['correo'];
$clave = $_POST['clave'];
$ciudad = $_POST['ciudad'];
$telefono= $_POST['telefono'];
$sexo = $_POST['sexo'];
$tipoP = $_POST['2'];
$direccion = $_POST['direccion'];
$barrio= $_POST['barrio'];
$cedula= $_POST['cedula'];
$fecha = $_POST['fecha'];
 $estado = $_POST['A'];

$emailr = UsuarioControlador::usuarioRepetidoC($correo);


if($emailr > 0){
  echo json_encode(array('error' => true ));
}else {

    $saveItem = UsuarioControlador::addUsuarioC($nombre,$apellido,$correo,$clave,$ciudad,$telefono,$sexo,$cedula,$tipoP,$direccion,$fecha,$barrio,$estado);
    $mail = new PHPMailer;                              // Passing `true` enables exceptions
    try {
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


        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Se ha registrado con exito en la pasteleria ';
        $mail->Body .="<h1 style='color:#3498db;'Bienvenido!</h1>";
        $mail->Body .= '<b> Bienvenido se registro con el correo </b>'.$correo;
        $mail->Body .= "<p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        // echo 'Message has been sent';
    } catch (Exception $e) {
        // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }

              echo json_encode(array('error' => false ));

// }else{
//   $saveItem = UsuarioControlador::addUsuarioC($nombre,$apellido,$correo,$clave,$ciudad,$telefono,$sexo,$cedula,$tipoP,$direccion,$fecha,$barrio,$estado);
//   if($saveItem){
//       $return['valid'] = true;
//       $return['msg'] = "Nuevo registro agregado con éxito!";
//     }else{
//       $return['valid'] = false;
//     }
//     echo json_encode($saveItem);
// }


}
}
