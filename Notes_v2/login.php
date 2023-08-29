<?php

    /* 
      Author: Chinmayee
      Date: 19/07/2023
      Time: 16:07
      Creating User Table And Establishing Database Connection
    */

  session_start();

    if(isset($_POST['submit']))
    {

      // Assigning Values To PHP Variables
      $uname = $_POST["uname"];
      $pass = $_POST["pass"];
      
      // Striping HTML Tags And Trimming Extra Spaces
      $uname = strip_tags($uname);
      $pass = strip_tags($pass);
      $uname = htmlspecialchars($uname);
      $pass = htmlspecialchars($pass);
      $uname = trim($uname);
      $pass = trim($pass);

      // Including Connection File
      include "connection.php";

      // Escaping Special Characters In SQL Query Statements
      $uname = mysqli_real_escape_string($conn,$uname);
      $pass = mysqli_real_escape_string($conn,$pass);
      
      //$pass=md5($pass);


      $sql = "SELECT userId, userName, pass FROM User WHERE userName = ?";
      
      // Preparing the query for execution
      $stmt = $conn -> prepare($sql);

      // Binding the parameter $userName in the query ( ? will be replaced by $userName)
      $stmt -> bind_param("s", $uname);
      
      // Executing the query
      $stmt -> execute();

      // Fetching the result obtained after executing the query
      $result = $stmt -> get_result();

      $row = $result -> fetch_assoc();
      if($pass == $row['pass'])
        {
          // Password matched, access to the dashboard granted
            $_SESSION['id'] = $row['userId'];
            header("Location: notes(1).html");
        }
      
    } 

    
?>