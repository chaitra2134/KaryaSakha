<?php

/* 
    Author: Prizam
    Date: 25/07/23
    
    Verifying the OTP entered by the user

*/

    session_start();

    $userName = $_SESSION['un'];
    $email = $_SESSION['em'];
    $pass = $_SESSION['pw'];

?>
<?php

if(isset($_POST['submit_Otp']))
{   
     // The form has 6 input fields, we are extracting the value from each input
    // field and merging them into an array
    $otpParts = array($_POST['otp1'],$_POST['otp2'],
                $_POST['otp3'],$_POST['otp4'],$_POST['otp5'],
                $_POST['otp6']);
    
// checking if the session variable is set (it confirms that the otp is actually sent)
 if (isset($_SESSION['currentOtp'])) 
    {
        // Extracting the value of OTP that was set from 
        // the session variable to local variable $otp
        $otp = $_SESSION['currentOtp'];

        // Implode function will combine the entire array into a single string
        $enteredOtp = implode($otpParts);
        
        //Checking if the entered otp matches the otp that was sent
        if($enteredOtp==$otp)
        {
            // Unsetting the session variable because it's job is done
            unset($_SESSION['currentOtp']);

            // Transferring control to send email
            require_once 'SendEmail.php';
            exit();
        }
        else
        {
            // If the entered OTP does not match
            echo "<script>alert('Invalid OTP');history.back();</script>";
            exit();
        }
    }
}
    
    else 
    {
        header("Location: ../Frontend/SignUp.html");
        exit();
    }



?>
