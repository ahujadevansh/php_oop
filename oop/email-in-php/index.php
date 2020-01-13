<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';

$mail = new PHPMailer();

// $mail->SMTPDebug = 4; //2 or 4
$mail->isSMTP();
$mail->Host = 'smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Username = '60dffa07abac4b';
$mail->Password = 'f6ae7815270de5';
$mail->Port = 2525;
$mail->SMTPSecure = 'tls';

$mail->setFrom('ahuja.devansh2@gmail.com', 'Devansh Ahuja');
$mail->addAddress('mifetag232@janmail.org', 'mifetag');
// $mail->addCC('someone@example.com', 'someone');
// $mail->addBCC('someone@example.com', 'someone');

$mail->Subject = 'Hello';
$mail->isHTML(true);

$mail->Body = "<h1>Hello World</h1>";
$mail->addAttachment('composer.json');

if($mail->send()) {
    echo "Message is sent";
}
else {
    echo "Message was not sent<br>";
    echo "Mail Error: ".$mail->ErrorInfo;
}


?>