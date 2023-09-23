<?php

    /* 
      Author: Prizam
      Date: 31/07/2023
      Time: 20:31
      Checking if the email provided by the user is already
      registered in the table
    */

  //session_save_path("./tmp");
  session_start();

    if(isset($_POST['submit_ForgotPassword']))
    {

      // Assigning Values To PHP Variables
      $email = $_POST["email"];
      
      
      // Striping HTML Tags And Trimming Extra Spaces
      $email = strip_tags($email);
      
      $email = htmlspecialchars($email);
      
      $email = trim($email);
      

      // Including Connection File
      include "../../Backend/Connection_Database_Table/Connection.php";

      // Escaping Special Characters In SQL Query Statements
      $email = mysqli_real_escape_string($conn,$email);
      
      // Checking if the given email already exists in the user table
      $sql = "SELECT email FROM user WHERE email = ?";
      
      // preparing the query for execution
      $stmt = $conn -> prepare($sql);
      
      // Binding the parameters into the query (? will be replaced by $email)
      $stmt -> bind_param("s", $email);
      
      // Executing the query
      $stmt -> execute();

      // Fetching the result obtained after executing the query
      $result = $stmt -> get_result();

      // Checking if any row has been returned after obtaining the result which means that email
      // has been found and matched 
      if($result -> num_rows > 0)
      {
        $row = $result -> fetch_assoc();

        // If the email is same
        if($email == $row['email'])
        {
          // Sending the OTP if the email matches
          $_SESSION['forgotEmail'] = $email;
          include '../../Backend/ForgotPassword_PHP/SendForgotOtp.php';
          exit();
        }
      }
      
      // If the entered email is not found in the table 
      else
      {
        echo "<script>alert('Email is not registered, please Sign Up !'); history.back();</script>";
        exit();
      }
    }
    
?>
