
<?php

/*
Author : Prizam Sarkhi
Date : 19/07/2023 @ 20:00

Send email automatically to the user who will sign up 
indicating that the signup process is successful
(PHPMailer is used)
*/

//Declarations for using PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';



    include 'InsertUserData.php'; //Control will go to signup.php file, check it out
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
    //Storing content of mail in a variable $emailContent
    $emailContent = "<font size='4px'> Hello {$userName}!! Your account has been
    created successfully. Welcome to KaryaSakha <br><b>:-)</b></font> <br><br><b>
    <font size='3px'>Set.Work.Achieve</b></font>";

    $mail->Subject = "Sign up Successfull!"; //Title
    $mail->Body = "$emailContent"; //Content

    $mail->send(); //Sending the mail
    header("Location: ../../NavigationBar.php");
    exit();

?>
