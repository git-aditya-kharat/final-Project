<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

function sendEmail($to,$subject,$body)
{
    $from       = "shruti.occedusoft@gmail.com";
    $mail       = new PHPMailer();
    $mail->IsSMTP(true);            // use SMTP
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    // $mail->SMTPDebug = 4;
    $mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth   = true;                // enable SMTP authentication
    $mail->Host       = "smtp.gmail.com"; // SMTP host
    $mail->Port       =  465;                    // set the SMTP port
    $mail->Username   = "shruti.occedusoft@gmail.com";  // SMTP  username
    $mail->Password   = "Icecream@29523";  // SMTP password
    $mail->SetFrom('shruti.occedusoft@gmail.com');
    $mail->AddReplyTo($from,'From Name');
    $mail->Subject    = $subject;
    $mail->Body = $body;
    $address = $to;
    $mail->AddAddress($to);
    $mail->SMTPOptions=array('ssl'=>array(
      'verify_peer'=>false,
      'verify_peer_name'=>false,
      'allow_self_signed'=>false
    ));
    if(!$mail->Send())
        echo "Mailer Error: " . $mail->ErrorInfo;
}    

?>