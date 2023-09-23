<?php

include 'Connection.php';

$sql = "CREATE TABLE Tasks
    (
      taskId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
      parentGoalId INT,
      creatorId INT,
       taskName VARCHAR(100) NOT NULL,
       taskDescription VARCHAR(200) NOT NULL,
        isCompleted TEXT(10) NOT NULL,
      taskDateCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
      taskDateCompleted TIMESTAMP,

      FOREIGN KEY (parentGoalId) REFERENCES Goals(goalId),
      FOREIGN KEY (creatorId) REFERENCES User(userId)
    )";

 // Executing the query and checking if it has executed successfully
 if($conn->query($sql) === TRUE) 
 {
   echo "<br> Table 'Tasks' Created Successfully";
 } 
 else 
 {
   echo "<br> Error Creating Table Tasks: " . $conn->error;
 }

 $conn->close();
 

?>