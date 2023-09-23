<?php

include 'Connection.php';

$sql = "CREATE TABLE ToDoList 
    (
      taskId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
      creatorId INT,
       taskContent VARCHAR(200) NOT NULL,
    --   toDoDueDate VARCHAR(200) NOT NULL,
      taskQuadrant INT UNSIGNED NOT NULL,
      isCompleted TEXT(10) NOT NULL,
      isStarred TEXT(10) NOT NULL,
      taskDateCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
      taskDateCompleted TIMESTAMP,

      FOREIGN KEY (creatorId) REFERENCES User(userId)
    )";

 // Executing the query and checking if it has executed successfully
 if($conn->query($sql) === TRUE) 
 {
   echo "<br> Table 'ToDoList' Created Successfully";
 } 
 else 
 {
   echo "<br> Error Creating Table User: " . $conn->error;
 }

 $conn->close();
 

?>