<?php

  /* 
      Author: Chinmayee
      Date: 19/07/2023
      Time: 16:07
      Creating User Table And Establishing Database Connection

      Edited By -
      Prizam (19/07/2023 @ 19:55)
  
  */
  

  // Declaring Variables
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "KaryaSakha";

  // Creating Connection
  $conn = new mysqli($servername, $username, $password, $database);

  // Checking Connection
  if ($conn->connect_error) 
    die("Connection failed: " . $conn->connect_error);
  else
      echo "<br> \tConnected Established Successfully! <br>";

  // Creating User Table
  $sql = "CREATE TABLE User 
          (
              userId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              userName VARCHAR(30) NOT NULL,
              firstName TEXT(30) NOT NULL,
              lastName TEXT(30) NOT NULL,
              pass VARCHAR(30) NOT NULL,
              email VARCHAR(35) NOT NULL,
              dob VARCHAR(15) NOT NULL,
              gender TEXT(20),
              profession TEXT(30),
              dateCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP 
          )";
    
  if ($conn->query($sql) === TRUE) 
    echo "<br> Table 'User' Created Successfully";
  else 
    echo "<br> Error Creating Table User: " . $conn->error;
    

  $conn->close();

?> 