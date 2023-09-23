<?php

/* 
    Author: Prizam
    Date: 31/07/2023 @20:42

    Verifying the OTP for resetting the user's KaryaSakha account password
*/

    session_start();

?>
<?php

if(isset($_POST['submit_ForgotOtp']))
{   
    // The form has 6 input fields, we are extracting the value from each input
    // field and merging them into an array
    $otpParts = array($_POST['otp1'],$_POST['otp2'],
                $_POST['otp3'],$_POST['otp4'],$_POST['otp5'],
                $_POST['otp6']);
    
    // checking if the session variable is set (it confirms that the otp is actually sent)
    if (isset($_SESSION['currentForgotOtp'])) 
    
    {
        // Extracting the value of OTP that was set from 
        // the session variable to local variable $otp
        $otp = $_SESSION['currentForgotOtp'];
        
        // Implode function will combine the entire array into a single string
        $enteredOtp = implode($otpParts);
        
        //Checking if the entered otp matches the otp that was sent
        if($enteredOtp==$otp)
        {
            // Unsetting the session variable because it's job is done
            unset($_SESSION['currentForgotOtp']);

            // Redirecting to a form where the user can reset the password
            header("Location: ../../Frontend/ForgotPassword/NewPassword.html");
            exit();
        }
        else
        {
            // If the entered OTP does not match the OTP which was sent
            echo "<script>alert('Incorrect OTP'); history.back();</script>";
            exit();
        }
    }
}   
    // If the OTP is not sent
    else 
    {
        header("Location: ../../Frontend/ForgotPassword/ForgotPassword.html");
        exit();
    }



?>
