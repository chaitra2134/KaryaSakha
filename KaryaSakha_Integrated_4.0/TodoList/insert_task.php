<?php
session_start();

include '../Tables_and_Connection/Connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $creatorId = $_SESSION['userId'];
    $taskText = $_POST['taskText'];
    $taskQuadrant = $_POST['taskQuadrant'];
    $sql = "INSERT INTO ToDoList(creatorId,taskContent,taskQuadrant,isCompleted,isStarred)
    VALUES('$creatorId','$taskText','$taskQuadrant','false','false')";
    
    
     
     if($conn->query($sql) === TRUE) 
     {
       echo "<br> Task inserted successfully ";
     } 
     else 
     {
       echo "<br> Error in inserting tasks " . $conn->error;
     }
    
     
}
$conn->close();

 

?>