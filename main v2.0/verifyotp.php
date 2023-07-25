

<?php
session_start();
$userName = $_SESSION['un'];
$email = $_SESSION['em'];
$pass = $_SESSION['pw'];
?>
<?php

if(isset($_POST['submit']))
{   
    $flag;
    
    if (isset($_SESSION['currentOtp'])) {
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
    
    else {
        header("Location: form.html");
        exit();
    }
}
else{
    if (isset($_SESSION['currentOtp'])) {
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
        header("Location: enterotp.php");
        
        exit();
    }
        else
        {
            echo "<script>confirm('Invalid OTP');</script>";
            header("Location: enterotp.html");
            exit();
        }
    } else {
        header("Location: form.html");
        exit();
    }

}
?>