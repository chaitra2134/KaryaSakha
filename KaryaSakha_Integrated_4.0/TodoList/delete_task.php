<?php

include '../Tables_and_Connection/Connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isCompleted = $_POST['isCompleted'];
    $taskText = $_POST['taskText'];
    $taskQuadrant = $_POST['taskQuadrant'];
    $sql = "DELETE FROM ToDoList WHERE
    taskContent = '$taskText' AND taskQuadrant = '$taskQuadrant' ";
    
    
     
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