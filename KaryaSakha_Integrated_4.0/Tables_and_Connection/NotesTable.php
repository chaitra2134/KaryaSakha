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
  include "Connection.php";

  // Creating User Table
  $sql = "CREATE TABLE Notes 
          (
              noteId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              userId INT,
              FOREIGN KEY (userId) REFERENCES User (userId),
              title VARCHAR(20),
              content VARCHAR(500),
              isHidden BOOLEAN DEFAULT 0,
              isFavourite BOOLEAN DEFAULT 0,
              dateCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP 
          )";
    
  if ($conn->query($sql) === TRUE) 
    echo "<br> Table 'Notes' Created Successfully";
  else 
    echo "<br> Error Creating Table Notes: " . $conn->error;
    

  $conn->close();

?> 