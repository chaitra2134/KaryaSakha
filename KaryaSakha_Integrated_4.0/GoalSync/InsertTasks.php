<?php
session_start();

include '../Tables_and_Connection/Connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['userId'])) {
    $creatorId = $_SESSION['userId'];
    $cardId = $_POST['cardId'];
    $taskName = $_POST['taskName'];
    $taskDescription = $_POST['taskDescription'];
    $isCompleted = $_POST['isCompleted'];
    $sql = "INSERT INTO tasks(parentGoalId,creatorId,taskName,taskDescription,isCompleted)
    VALUES('$cardId','$creatorId','$taskName','$taskDescription','$isCompleted')";
    
    
     
    $conn->query($sql);
    
     $lastInsertedId = mysqli_insert_id($conn);
     echo $lastInsertedId;
     
}
$conn->close();

 

?>