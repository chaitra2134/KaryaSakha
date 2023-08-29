<?php

  /* 
      Author: Chinmayee
      Date: 19/07/2023
      Time: 16:07
      Creating User Table And Establishing Database Connection

      Edited By -
      Prizam (19/07/2023 @ 19:55)
      
  */

  // Including Connection File
  include "connection.php";

  // Creating User Table
  $sql = "CREATE TABLE User 
          (
              userId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              email VARCHAR(35) NOT NULL,
              userName VARCHAR(30) NOT NULL,
              pass VARCHAR(30) NOT NULL,
              dateCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP 
          )";
    
  if ($conn->query($sql) === TRUE) 
    echo "<br> Table 'User' Created Successfully";
  else 
    echo "<br> Error Creating Table User: " . $conn->error;
    

  $conn->close();

?> 