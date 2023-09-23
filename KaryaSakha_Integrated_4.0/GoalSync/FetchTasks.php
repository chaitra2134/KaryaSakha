<?php
session_start();
include '../Tables_and_Connection/Connection.php'; // Include your database connection code

if(!isset($_SESSION['userId']))
{
    header("Location: ../Frontend/LogIn/LogIn.html");
    exit();
}
else{
$userId = $_SESSION['userId'];
$cardId = $_POST['cardId'];
// Query to fetch tasks from the database
$sql = "SELECT * FROM tasks WHERE parentGoalId = $cardId AND creatorId = $userId"; // Modify this query as per your database structure

$result = $conn->query($sql);

$tasks = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tasks[] = array(
            'taskId' => $row['taskId'],
            'parentGoalId' => $row['parentGoalId'],
            'taskName' => $row['taskName'],
            'taskDescription' => $row['taskDescription'],
            'isCompleted' => $row['isCompleted']
        );
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($tasks);

}
?>