<?php
session_start();

include '../Tables_and_Connection/Connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['userId'])) {
    $creatorId = $_SESSION['userId'];
    $taskId = $_POST['taskId'];
    $taskDescription = $_POST['taskDescription'];

    $sql = "UPDATE tasks SET taskDescription = ? WHERE taskId = ? AND creatorId = ?";
    $stmt = $conn->prepare($sql);
    $stmt -> bind_param("sii",$taskDescription, $taskId, $creatorId );
    $stmt -> execute();

    
    if($stmt->affected_rows > 0)
    {
        echo "task with id ", $taskId, " and creator Id ", $creatorId, " updated successfully";
    }
    else
    {
        echo "Error in updating card ", $conn->error;
    }
    
    $stmt->close();
     
}
$conn->close();

 

?>