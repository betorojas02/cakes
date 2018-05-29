<?php
require_once '../../Controlador/UsuarioControlador.php';
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
if (isset($_POST['nombre'])) {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];
    $ciudad = $_POST['ciudad'];
    $telefono = $_POST['telefono'];
    $sexo = $_POST['sexo'];
    $tipoP = $_POST['2'];
    $direccion = $_POST['direccion'];
    $barrio = $_POST['barrio'];
    $cedula = $_POST['cedula'];
    $fecha = $_POST['fecha'];
    $estado = $_POST['A'];

    $emailr = UsuarioControlador::usuarioRepetidoC($correo);

    if ($emailr > 0) {
        echo json_encode(array('error' => true));
    } else {

        $saveItem = UsuarioControlador::addUsuarioC($nombre, $apellido, $correo, $clave, $ciudad, $telefono, $sexo, $cedula, $tipoP, $direccion, $fecha, $barrio, $estado);
        $mail = new PHPMailer; // Passing `true` enables exceptions
        try {
            //Server settings
            // $mail->SMTPDebug = 1;                                 // Enable verbose debug output
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'lbcakes1234@gmail.com'; // SMTP username
            $mail->Password = 'l&bcakes1234'; // SMTP password
            $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ),
            ); // TCP port to connect to
            $url = 'http://' . $_SERVER["SERVER_NAME"] . '/cakes/vista/usuario';
            //Recipients
            $mail->setFrom('lbcakes1234@gmail.com', 'L&B CAKES');
            $mail->addAddress($correo, 'beto'); // Add a recipient

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Se ha registrado con exito en la pasteleria ';

            $mail->Body = "
                    <table style='max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;'>
                            <h1 style='color:#d81b60;  text-align: center'>Bienvendio L&B CAKES</h1>

                <tr>
                            <td style='padding: 0'>
                                <img style='padding: 0; display: block' src='https://www.wishacupcake.com/wp-content/uploads/2016/12/chocolate-truffle-cake-dark-chocolate-cake-chocolate-sponge-cake.jpg' width='100%'>
                            </td>
                        </tr>

                <tr>
                            <td style='background-color: #c2b1b7'>
                                <div style='color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif'>
                                    <h2 style='color: #d81b60; margin: 0 0 7px'>Bienvenido a la pagina L&B CAKES</h2>
                                    <p style='margin: 2px; font-size: 15px'>
                                       Bienvendio a la pasteleria , se ha registrado con los siguientes datos</p>
                                    <ul style='font-size: 15px;  margin: 10px 0'>
                                        <li>Nombre : " . $nombre . "</li>
                                        <li>Apellido : " . $apellido . "</li>
                                        <li>Correo : " . $correo . "</li>
                                        <li>barrio : " . $barrio . "</li>
                                        <li>direccion : " . $direccion . "</li>
                                    </ul>
                                    <div style='width: 100%;margin:20px 0; display: inline-block;text-align: center'>
                                        <img style='padding: 0; width: 200px; margin: 5px' src='http://sevilla.abc.es/gurme//wp-content/uploads/2015/07/mousse-de-queso-con-cerezas.jpg'>
                                        <img style='padding: 0; width: 200px; margin: 5px' src='http://cdn2.cocinadelirante.com/sites/default/files/styles/gallerie/public/images/2018/01/postrelight.jpg'>
                                    </div>
                                    <div style='width: 100%; text-align: center'>
                                        <a style='text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #d81b60' href='" . $url . "'>Ir a la página</a>
                                    </div>
                                    <p style='color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0'>Poketrainers Trujillo 2016</p>
                                </div>
                            </td>
                        </tr>
                    </table>


 ";
//         $mail->Body .="<h1 style='color:#3498db;'Bienvenido!</h1>";
            //         $mail->Body .= '<b> Bienvenido se registro con el correo </b>'.$correo;
            //         $mail->Body .= "<p>Fecha y Hora: ".date("d-m-Y")."</p>";
            //         $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }

        echo json_encode(array('error' => false));

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
