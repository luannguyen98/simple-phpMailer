<?php
// require 'PHPMailer-master/src/Exception.php';
// require 'PHPMailer-master/src/PHPMailer.php';
// require 'PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';



//create instance of phpmailer
$mail = new PHPMailer();
//nguyennnthanhluan@gmail.com
try {
    //Server settings
   
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
    $mail->SMTPAuth   = "true";                                   //Enable SMTP authentication
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = '587';                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->Username   = 'simplephpMailer@gmail.com';                     //SMTP username
    $mail->Password   = 'simplephpMailer1@';                               //SMTP password
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'Test mail nha <b>mới</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('img/image.jpg');    //Optional name
    //Recipients
    $mail->setFrom('simplephpMailer@gmail.com');
    $mail->addAddress('simplephpMailer@gmail.com');     //Add a recipient 
    


    
    if($mail->send()){
        echo "Email send is successful";
    }
    else{
        echo "Error...";
    }
    $mail->smtpClose();
   
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
