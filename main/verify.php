<?php

    /* 
      Author: Chinmayee
      Date: 21/07/2023
      Time: 16:57
      Creating User Table And Establishing Database Connection
    */

  //session_save_path("./tmp");
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
      
      $pass=md5($pass);
      
      // Fetching Record
      $sql = "SELECT * FROM user WHERE userName = '$uname' AND pass = '$pass' ";
      $result = $conn->query($sql);
      if(!$result)
        die("Invalid Username Or Password!");
      else
      {
        echo "You Are A Valid User.";
        //$_SESSION["myname"] = $row["username"];
        // Further Processing
      }
      
    } 
    else 
      echo "You are not authorized to use this software!";
    
?>
