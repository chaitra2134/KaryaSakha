<?php

include '../Tables_and_Connection/Connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isCompleted = $_POST['isCompleted'];
    $taskText = $_POST['taskText'];
    $taskQuadrant = $_POST['taskQuadrant'];
    $sql = "UPDATE ToDoList SET isCompleted = '$isCompleted' WHERE
    taskContent = '$taskText' AND taskQuadrant = '$taskQuadrant' ";
    
    
     
     if($conn->query($sql) === TRUE) 
     {
       echo "<br> Task Status Updated successfully ";
     } 
     else 
     {
       echo "<br> Error in updating task status " . $conn->error;
     }
    
     
}
$conn->close();

 

?>