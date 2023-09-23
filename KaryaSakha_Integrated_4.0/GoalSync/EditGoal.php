<?php
session_start();

include '../Tables_and_Connection/Connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['userId'])) {
    $creatorId = $_SESSION['userId'];
    $cardId = $_POST['cardId'];
    $newTitle = $_POST['newTitle'];
    $newDescription = $_POST['newDescription'];

    $sql = "UPDATE goals SET goalTitle = ? , goalDescription = ? WHERE goalId = ? AND creatorId = ?";
    $stmt = $conn->prepare($sql);
    $stmt -> bind_param("ssii",$newTitle, $newDescription, $cardId, $creatorId );
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