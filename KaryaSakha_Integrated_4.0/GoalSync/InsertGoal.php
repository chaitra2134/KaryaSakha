<?php
session_start();

include '../Tables_and_Connection/Connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['userId'])) {
    $creatorId = $_SESSION['userId'];
    $goalTitle = $_POST['goalTitle'];
    $goalDescription = $_POST['goalDescription'];
    $sql = "INSERT INTO goals(creatorId,goalTitle,goalDescription,numberOfTasks,completedTasks,progressBarPercentage)
    VALUES('$creatorId','$goalTitle','$goalDescription',0,0,0)";
    
    
     
    $conn->query($sql);
    
     $lastInsertedId = mysqli_insert_id($conn);
     echo $lastInsertedId;
     
}
$conn->close();

 

?>