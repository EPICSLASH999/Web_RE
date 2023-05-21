<!-- bzubrvmhjolbsgrk -->
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$correo = $_POST['correo'];
$con = mysqli_connect('localhost','master','1234');

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
    return $random_string;
}
$finalcontra = generate_string($permitted_chars, 6);

if (!$con) {
    die('No se pudo conectar: ' . mysqli_error($con));                                        
}

mysqli_select_db($con,'re_db');

$sql="SELECT * FROM users WHERE email = '".$correo."'";
$sqa="UPDATE users SET password = '".$finalcontra."' WHERE users.email = '".$correo."'";

$resulta = mysqli_query($con,$sqa);
//$row2 = mysqli_fetch_array($resulta);

$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

//Llama autoloader de composer
require '../vendor/autoload.php';

//Crea un objeto PHPMailer;  `true` habilita excepciones
$mail = new PHPMailer(true);

try {

    $miCorreo ='reuniversefict@gmail.com';

    //Configuracion del Servidor SMTP
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    //Muestra salida de depuración detallada
    $mail->isSMTP();                                            //Envia usando SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Configurar el servidor SMTP para enviar a través de él
    $mail->SMTPAuth   = true;                                   //Ahilita Autenticacion SMTP
    $mail->Username   = $miCorreo;                              //nombre de usuario del servidor SMTPe
    $mail->Password   = 'bzubrvmhjolbsgrk';                     //password del servidor SMTP
    $mail->SMTPSecure = 'tls'; //PHPMailer::ENCRYPTION_SMTPS;   //Habilita TLS
    $mail->Port       = 587;                                    //Puerto TCP para conectarse; usar 587 si configuró `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Preparacion 
    $mail->setFrom($miCorreo, 'Resident Evil Universe Fiction');                  // Quien envia
    $mail->addAddress($correo, 'Umbrella Patroll');          //Añade a quien envia correo
   
    //Contenido
    $mail->isHTML(true);                                    //Especifica que se envia el docuento en formato HTML
    $mail->Subject = 'Has solicitado un cambio de contraseña';
    $mail->Body    = "Resident Evil Universe Fiction te hace entrega
                    de una nueva clave de acceso a su sitio web favorito.
                        <br> Usuario: <b> ". $row['username'] ."</b>
                        <br> Contraseña: <b> ". $finalcontra ."</b>";
    $mail->AltBody = 'Mi Mensaje dios mio, no acepto html';                          //Mensaje plano si no se acepta HTML

    $mail->send();                                          //Envia el correo
    echo 'Mensaje entregado, vamonos a casa';
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    $password_hash = password_hash($finalcontra, PASSWORD_DEFAULT, ['cost' => 10]);
    
    $sqe="UPDATE users SET password = '".$password_hash."' WHERE users.email = '".$correo."'";
    $resulta = mysqli_query($con,$sqe);

    mysqli_close($con);
?>