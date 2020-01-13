<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';

class MailConfigHelper {

    public static function getMailer():PHPMailer {
        $mail = new PHPMailer();

        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = '60dffa07abac4b';
        $mail->Password = 'f6ae7815270de5';
        $mail->Port = 2525;
        $mail->SMTPSecure = 'tls';
        $mail->setFrom('ahuja.devansh2@gmail.com', 'Devansh Ahuja');

        return $mail;

    }

}

?>