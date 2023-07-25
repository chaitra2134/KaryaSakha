<?php

/*
Author : Prizam Sarkhi
Date : 19/07/2023 @ 20:00

Send email automatically to the user who will sign up 
(PHPMailer is used)
*/

//Declarations for using PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST['submit']))
{

    include 'insertdata.php'; //Control will go to insertdata.php file, check it out
    $mail = new PHPMailer(true); //This line creates a new instance 
    //of the PHPMailer class and assigns it to the variable $mail

    //More Syntax for sending mail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'karyasakha008@gmail.com';
    $mail->Password = 'mmuvyhhexzylhbpr';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('karyasakha008@gmail.com');
    
    $mail->addAddress($email);

    $mail->isHTML(true); //specifies that content of the mail would be in html format
    //Storing content of mail in a variable used variable 'firstName to address the user
    $name1 = "Hello {$userName}!! Your account has been
    created successfully. Welcome to KaryaSakha <br><b>:-)</b> <br><br><b>Set.Work.Achieve</b>";

    $mail->Subject = "Sign up Successfull!"; //Title
    $mail->Body = "$name1"; //Content

    $mail->send(); //Sending the mail
}
?>