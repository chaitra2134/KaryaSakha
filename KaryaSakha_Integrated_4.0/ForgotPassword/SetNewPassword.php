<?php
 /*
    Author : Prizam Sarkhi
    Date : 31/07/2023 @ 20:52

    Updating the new password in the user table
 */
session_start();



// if(isset($_POST['submit_SetNewPassword']))
// {   
    // Extracting the email from the session variable
    $email = $_SESSION['forgotEmail'];
    
    // Extracting the new password from the form using post
    $pass = $_POST['pass'];

    // Sanitizing the data to prevent sql injection attacks
    $email = strip_tags($email);
    $pass = strip_tags($pass);
    $email = trim($email);
    $pass = trim($pass);
    $email = htmlspecialchars($email);
    $pass = htmlspecialchars($pass);

    include '../../Backend/Connection_Database_Table/Connection.php';

    // Escaping the special characters
    $email = mysqli_real_escape_string($conn,$email);
    $pass = mysqli_real_escape_string($conn,$pass);

    // Hashing the new password
    $pass = hash('sha512',(string)$pass);

    // SQL query to update the password in the row with the email which the user has entered
    $sql = "UPDATE user SET pass = ? WHERE email = ? ";
    
    // Preparing the query for execution
    $stmt = $conn -> prepare($sql);
    
    // Binding the parameters ("ss" means string, string) 
    //? ? will be replaced by $pass and $email respectively
    $stmt -> bind_param("ss", $pass,$email);
    
    //Executing the query
    if($stmt -> execute())
    {
        // Displaying success message and redirecting the user to Log In page
        echo "<script>alert('Password Resetted Successfully'); window.location = '../../Frontend/LogIn/LogIn.html';</script>";
        exit();
    }
    else
    {
        // If the query execution fails due to some reason
        echo "Error in updating password ", $conn->$error;
    }

//}

?>