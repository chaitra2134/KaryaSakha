<?php
session_start();

include '../Tables_and_Connection/Connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['userId'])) {
    $creatorId = $_SESSION['userId'];
    $taskId = $_POST['taskId'];

    $sql = "DELETE FROM tasks WHERE taskId = ? AND creatorId = ?";
    $stmt = $conn->prepare($sql);
    $stmt -> bind_param("ii", $taskId, $creatorId );
    $stmt -> execute();

    
    if($stmt->affected_rows > 0)
    {
        echo "Task with id ", $taskId, " and creator Id ", $creatorId, " deleted successfully";
    }
    else
    {
        echo "Error in deleting card ", $conn->error;
    }
    
    $stmt->close();
     
}
$conn->close();

 

?>