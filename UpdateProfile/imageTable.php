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
  $sql = "CREATE TABLE Profile_Image
          (
              imageId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              userId INT,
              FOREIGN KEY (userId) REFERENCES User (userId),
              file_name VARCHAR(20),
              dateUploaded TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP 
          )";
    
  if ($conn->query($sql) === TRUE) 
    echo "<br> Table 'Profile_Image' Created Successfully";
  else 
    echo "<br> Error Creating Table Profile_Image: " . $conn->error;
    

  $conn->close();

?> 