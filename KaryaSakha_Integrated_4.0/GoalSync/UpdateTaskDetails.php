<?php
session_start();

include '../Tables_and_Connection/Connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['userId'])) {
    $creatorId = $_SESSION['userId'];
    $cardId = $_POST['cardId'];
    $taskNum = $_POST['taskNum'];
    $taskCom = $_POST['taskCom'];
    $progress = $_POST['progress'];

    $sql = "UPDATE goals SET numberOfTasks = ? , completedTasks = ? , progressBarPercentage = ? WHERE goalId = ? AND creatorId = ?";
    $stmt = $conn->prepare($sql);
    $stmt -> bind_param("iiiii",$taskNum, $taskCom, $progress, $cardId, $creatorId );
    $stmt -> execute();

    
    if($stmt->affected_rows > 0)
    {
        echo "Card with id ", $cardId, " and creator Id ", $creatorId, " updated successfully";
    }
    else
    {
        echo "Error in updating card ", $conn->error;
    }
    
    $stmt->close();
     
}
$conn->close();

 

?>