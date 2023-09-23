<?php

include 'Connection.php';

$sql = "CREATE TABLE Alarms
    (
        alarmId INT AUTO_INCREMENT PRIMARY KEY,
        creatorId INT,
  alarmHour INT,
  alarmMinute INT,
  isActive TEXT(10),
  alarmDateCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,

      FOREIGN KEY (creatorId) REFERENCES User(userId)
    )";

 // Executing the query and checking if it has executed successfully
 if($conn->query($sql) === TRUE) 
 {
   echo "<br> Table 'Alarms' Created Successfully";
 } 
 else 
 {
   echo "<br> Error Creating Table Alarms : " . $conn->error;
 }

 $conn->close();
 

?>