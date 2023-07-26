<?php

/* 
    Author: Prizam
    Date: 25/07/23

    OTP Verification sent on email using PHP

    Edited By: Chinmayee
    Date: 26/07/23 @ 10:49
*/

    session_start();

    $userName = $_SESSION['un'];
    $email = $_SESSION['em'];
    $pass = $_SESSION['pw'];

?>
<?php

if(isset($_POST['submit']))
{   
    $flag;
    
    if (isset($_SESSION['currentOtp'])) 
    {
        $otp = $_SESSION['currentOtp'];
        $enteredOtp = $_POST['otp'];
        if($enteredOtp == $otp)
        {
            unset($_SESSION['currentOTP']);
            include 'createfile.php';
            exit();
        }
        else if($enteredOtp=='')
        {
            echo "<script>alert('Enter OTP');</script>";
            header("Location: enterotp.html");
            exit();
        }
        else
        {
            echo "<script>confirm('Invalid OTP');</script>";
            header("Location: enterotp.html");
            exit();
        }
    } 
    
    else 
    {
        header("Location: login.html");
        exit();
    }
}

?>