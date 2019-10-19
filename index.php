<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 1;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'michellecherop@gmail.com';                     // SMTP username
    $mail->Password   = 'Mitchell@1999';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption, 
    $mail->Port       = 587;  //465                                  // TCP port to connect to

    //Recipients
    $mail->setFrom('michellecherop@gmail.com', 'Mailer');
    $mail->addAddress('mitchell.tonui@strathmore.edu');     // Add a recipient
   


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'JAMII GARBAGE BIN STATUS';
    $mail->Body    = 'Garbage bin G55 is full';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}