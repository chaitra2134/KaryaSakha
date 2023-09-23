<?php
session_start();

include '../Tables_and_Connection/Connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['userId'])) {
    $creatorId = $_SESSION['userId'];
    $cardId = $_POST['cardId'];

    $sql = "DELETE FROM goals WHERE goalId = ? AND creatorId = ?";
    

    $stmt = $conn->prepare($sql);
    $stmt -> bind_param("ii", $cardId, $creatorId );
    $stmt -> execute();

    $sql_2 = "DELETE FROM tasks WHERE parentGoalId = ? AND creatorId = ?";

    $stmt2 = $conn->prepare($sql_2);
    $stmt2 -> bind_param("ii", $cardId, $creatorId );
    $stmt2 -> execute();
    
    if($stmt->affected_rows > 0)
    {
        echo "Card with id ", $cardId, " and creator Id ", $creatorId, " deleted successfully";
    }
    else
    {
        echo "Error in deleting card ", $conn->error;
    }
    
    $stmt->close();
     
}
$conn->close();

 

?>