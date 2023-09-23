<?php
    session_start();
?>
<?php

    /*
    Author : Prizam Sarkhi
    Date : 31/07/2023 @ 20:34

    Sending OTP to enable the user to reset it's KaryaSakha account Password
    (PHPMailer is used)
    */

    function generateOtp()
    {
        // Setting otp lenght to '6'
        $otpLength = 6;

        // Generating a random 6 digit number
        $randomNumber = random_int(100000,999999);

        // Hashing/Encrypting the generated number (number will be converted to an alphanumeric string)
        $otp = hash('sha512',(string)$randomNumber);

        // Extracting the first 6 characters from the new alphanumeric string
        $otp = substr($otp,0,$otpLength);
        
        // Returning the final value
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

if(isset($_POST['submit_ForgotPassword']))
{

        // Extracting value of email using post from the form
        $email = $_POST['email'];
        
        // Calling the generateOtp function which will return a 6 character alphanumeric string
        $otp = generateOtp();
        
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
        
        // Storing the mail content in e variable 
        $otpContent = "<font size='4px'>OTP to reset your KaryaSakha account password is : <b>$otp</b></font> ";

        $mail->Subject = "OTP from KaryaSakha"; //Title
        
        $mail->Body = "$otpContent"; //Content

        //Sending the mail
        if($mail->send())
        {
            // Setting session variable for OTP which will be 
            // used for verification later
            $_SESSION['currentForgotOtp'] = $otp;

        } 
        else
        {
            echo "Error in sending OTP";
        }
        
        //Redirecting to the form in which the user will enter the OTP
        header("Location: ../../Frontend/ForgotPassword/EnterForgotOtp.html");

}
    
?>