<?php

  /* 
      Author: Chinmayee
      Date: 19/07/2023
      Time: 16:07
      Creating Calender Table And Establishing Database Connection
      
  */

  // Including Connection File
  include "connection.php";

  // Creating User Table
  $sql = "CREATE TABLE Calender 
          (
              eventId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              userId INT,
              FOREIGN KEY (userId) REFERENCES User (userId),
              eventName VARCHAR(20) DEFAULT NULL,
              startTime TIME DEFAULT NULL,
              endTime TIME DEFAULT NULL         
          )";
    
  if ($conn->query($sql) === TRUE) 
    echo "<br> Table 'Calender' Created Successfully";
  else 
    echo "<br> Error Creating Table Calender: " . $conn->error;
    

  $conn->close();

?> 