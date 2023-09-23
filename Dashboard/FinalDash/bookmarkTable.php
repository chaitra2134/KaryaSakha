<?php

  /*
    Author: Chinmayee
    Date: 21/09/23
  */

  // Including Connection File
  include "connection.php";

  // Creating User Table
  $sql = "CREATE TABLE Bookmarks 
          (
              bookmarkId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              userId INT,
              FOREIGN KEY (userId) REFERENCES User (userId),
              link VARCHAR(1000),
              title VARCHAR(200),
              content VARCHAR(500)
          )";
    
  if ($conn->query($sql) === TRUE) 
    echo "<br> Table 'Bookmarks' Created Successfully";
  else 
    echo "<br> Error Creating Table Bookmarks: " . $conn->error;
    

  $conn->close();

?> 