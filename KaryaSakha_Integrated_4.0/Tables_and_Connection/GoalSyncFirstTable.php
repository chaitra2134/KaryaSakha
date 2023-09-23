<?php

include 'Connection.php';

$sql = "CREATE TABLE Goals
    (
      goalId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
      creatorId INT,
       goalTitle VARCHAR(100) NOT NULL,
       goalDescription VARCHAR(200),
      numberOfTasks INT NOT NULL,
      completedTasks INT NOT NULL,
      progressBarPercentage FLOAT,
      GoalDateCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
      GoalDateCompleted TIMESTAMP,

      FOREIGN KEY (creatorId) REFERENCES User(userId)
    )";

 // Executing the query and checking if it has executed successfully
 if($conn->query($sql) === TRUE) 
 {
   echo "<br> Table 'Goals' Created Successfully";
 } 
 else 
 {
   echo "<br> Error Creating Table Goals: " . $conn->error;
 }

 $conn->close();
 

?>