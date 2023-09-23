 <?php
    //session_start();
?>
<?php

    /*
    Author : Prizam Sarkhi
    Date : 21/07/2023 @ 21:21

    Send OTP automatically to the user who will enter the email id
    (PHPMailer is used)
    */

    function generateOtp()
    {
        $otpLength = 6;
        $randomNumber = random_int(100000,999999);

        $otp = hash('sha512',(string)$randomNumber);

        $otp = substr($otp,0,$otpLength);
        return $otp;
    }

?>


<?php

    //Declarations for using PHPMailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';


   
        $userName = $_SESSION['un'];
        $email = $_SESSION['em'];
        $pass = $_SESSION['pw'];
        
        $otp = generateOtp();

        //include 'insertdata.php'; //Control will go to insertdata.php file, check it out
        
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
        //Storing content of mail in a variable named $otpContent
        $otpContent = "<font size='4px'>Your OTP for email Verification is : <b>$otp</b></font> ";

        $mail->Subject = "OTP from KaryaSakha"; //Title
        $mail->Body = "$otpContent"; //Content

        $mail->send(); //Sending the mail
        
        $_SESSION['currentOtp'] = $otp;

        header("Location: ../../Otp/EnterOtp.php");

    
    
?>