<?php
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
require_once 'vendor/autoload.php';
 
$mail = new PHPMailer(true);


$mail->isSMTP();
$mail->Host = 'smtp.googlemail.com';  //gmail SMTP server
$mail->SMTPAuth = true;
$mail->Username = 'GMAIL_USERNAME';   //username
$mail->Password = 'GMAIL_PASSWORD';   //password
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;                    //SMTP port



$mail->setFrom('FROM_EMAIL_ADDRESS', 'FROM_NAME');
$mail->addAddress('RECEPIENT_EMAIL_ADDRESS', 'RECEPIENT_NAME');
 
$mail->isHTML(true);
 
$mail->Subject = 'Email subject';
$mail->Body    = '<b>Email Body</b>';
 
$mail->send();
echo 'Message has been sent';



$mail->addAttachment(__DIR__ . '/attachment1.png');
$mail->addAttachment(__DIR__ . '/attachment2.jpg');



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
require_once "vendor/autoload.php";
require_once "constants.php";
 
$mail = new PHPMailer(true);
 
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.googlemail.com';  //gmail SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = GMAIL_USERNAME;   //username
    $mail->Password = GMAIL_PASSWORD;   //password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;                    //smtp port
  
    $mail->setFrom('FROM_EMAIL_ADDRESS', 'FROM_NAME');
    $mail->addAddress('RECEPIENT_EMAIL_ADDRESS', 'RECEPIENT_NAME');
 
    $mail->addAttachment(__DIR__ . '/attachment1.png');
    $mail->addAttachment(__DIR__ . '/attachment2.png');
 
    $mail->isHTML(true);
    $mail->Subject = 'Email Subject';
    $mail->Body    = '<b>Email Body</b>';
 
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
}
?>