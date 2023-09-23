<?php

    /* 
      Author: Chinmayee
      Date: 21/07/2023
      Time: 16:57

      Edited by Prizam on 31/07/2023 @18:00

      Verifying the user credentials during Log In
      
    */

  //session_save_path("./tmp");
  session_start();

    if(isset($_POST['submit_LogIn']))
    {

      // Assigning Values To PHP Variables
      $userNameorEmail = $_POST["userNameorEmail"];
      $pass = $_POST["pass"];
      
      // Striping HTML Tags And Trimming Extra Spaces
      $userNameorEmail = strip_tags($userNameorEmail);
      $pass = strip_tags($pass);
      $userNameorEmail = htmlspecialchars($userNameorEmail);
      $pass = htmlspecialchars($pass);
      $userNameorEmail = trim($userNameorEmail);
      $pass = trim($pass);

      // Including Connection File
      include "../../Tables_and_Connection/Connection.php";

      // Escaping Special Characters In SQL Query Statements
      $userNameorEmail = mysqli_real_escape_string($conn,$userNameorEmail);
      $pass = mysqli_real_escape_string($conn,$pass);

      // Hashing/Encrypting the password
      $pass= hash('sha512',(string)$pass);

      if(strpos($userNameorEmail, '@'))
      {
        $email = $userNameorEmail;
        $userName = false;
      }
      else
      {
        $userName = $userNameorEmail;
        $email = false;
      }
      
    if($userName)
    {
      // Fetching the record where the userName matches the entered userName
      $sql = "SELECT * FROM User WHERE userName = ? ";
      
      // Preparing the query for execution
      $stmt = $conn -> prepare($sql);

      // Binding the parameter $userName in the query ( ? will be replaced by $userName)
      $stmt -> bind_param("s", $userName);
      
      // Executing the query
      $stmt -> execute();

      // Fetching the result obtained after executing the query
      $result = $stmt -> get_result();

      // Checking if the query has returned any rows (it means that the userName has matched)
      if($result -> num_rows > 0)
      {
        // Creating a $row variable to store the contents retrieved from the database
        $row = $result -> fetch_assoc();

        // Checking if the password matches
        if($pass == $row['pass'])
        {
          $userId = $row['userId'];
          $_SESSION['un'] = $userName;
          $_SESSION['userId'] = $userId;

        // Password matched, access to the dashboard granted
        header("Location: ../../NavigationBar.php");
        }
        else
        {
          // Correct userName but wrong password
          echo "<script>alert('Incorrect password'); history.back();</script>";
          exit();
        }
      }
      // Incorrect userName
      else
      {
        echo "<script>alert('Invalid Username !'); history.back();</script>";
        exit();
      }
    }

    else
    {
      // Fetching the record where the email matches
      $sql = "SELECT * FROM User WHERE email = ? ";
      
      // Preparing the query for execution
      $stmt = $conn -> prepare($sql);

      // Binding the parameter $userName in the query ( ? will be replaced by $email)
      $stmt -> bind_param("s", $email);
      
      // Executing the query
      $stmt -> execute();

      // Fetching the result obtained after executing the query
      $result = $stmt -> get_result();

      // Checking if the query has returned any rows (it means that the email has matched)
      if($result -> num_rows > 0)
      {
        // Creating a $row variable to store the contents retrieved from the database
        $row = $result -> fetch_assoc();

        // Checking if the password matches
        if($pass == $row['pass'])
        {
          $userId = $row['userId'];
          $_SESSION['un'] = $row['userName'];
          $_SESSION['userId'] = $userId;

        // Password matched, access to the dashboard granted
        header("Location: ../../NavigationBar.php");
        
        }
        else
        {
          // Correct email but wrong password
          echo "<script>alert('Incorrect password'); history.back();</script>";
          exit();
        }
      }
      // Incorrect email
      else
      {
        echo "<script>alert('Invalid email !'); history.back();</script>";
        exit();
      }
    }
  }
