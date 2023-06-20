<?php
//Carga de las clases necesarias
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Verificar si se ha enviado el formulario
if (isset($_POST['submit'])) {
    $email = $_POST['email'];

    //Crear una instancia. Con true permitimos excepciones
    $mail = new PHPMailer(true);

    try {
        //Valores dependientes del servidor que utilizamos

        $mail->isSMTP();                                           //Para usaar SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Nuestro servidor SMTMP smtp.gmail.com en caso de usar gmail
        $mail->SMTPAuth   = true;
        /* 
    * SMTP username y password Poned los vuestros. La contraseña es la que nos generó GMAIL
    */
        $mail->Username   = 'guessthecover@gmail.com';
        $mail->Password   = 'sneh opjh zuvh byoo';
        /*
    * Encriptación a usar ssl o tls, dependiendo cual usemos hay que utilizar uno u otro puerto
    */
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = "465";
        /**TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`                         
         * $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
         * $mail->Port       = 587;  
         */


        /*
    Receptores y remitente
    */

        // Configurar remitente y destinatario
        $mail->setFrom('guessthecover@gmail.com', 'Guess The Cover');
        $mail->addAddress($email); // Usar el email del usuario ingresado en el formulario


        //Copia
        //$mail->addCC('cc@example.com');
        //Copia Oculta
        //$mail->addBCC('bcc@example.com');

        //Archivos adjuntos
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Contenido
        //Si enviamos HTML
        $mail->isHTML(true);
        $mail->CharSet = "UTF8";
        // Generar número aleatorio de 5 dígitos
        $codigoGenerado = rand(10000, 99999);
        session_start();
        $_SESSION['codigoGenerado'] = $codigoGenerado;
        //Asunto
        $mail->Subject = 'Here is the subject';
        //Conteido HTML
        $mail->Body = 'Este es tu código de verificación: ' . $codigoGenerado;
        //Contenido alternativo en texto simple
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        //Enviar correo
        $mail->send();
        header('Location: ../formularioCambioContraseña.php?codigo=' . $codigoGenerado);

        exit();
    } catch (Exception $e) {
        echo "El mensaje no se ha enviado: {$mail->ErrorInfo}";
    }
}
