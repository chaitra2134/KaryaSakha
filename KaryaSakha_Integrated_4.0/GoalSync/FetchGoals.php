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
// Query to fetch tasks from the database
$sql = "SELECT * FROM goals WHERE creatorId = $userId"; // Modify this query as per your database structure

$result = $conn->query($sql);

$goals = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $goals[] = array(
            'goalId' => $row['goalId'],
            'goalTitle' => $row['goalTitle'],
            'goalDescription' => $row['goalDescription'],
            'numberOfTasks' => $row['numberOfTasks'],
            'completedTasks' => $row['completedTasks'],
            'progressBarPercentage' => $row['progressBarPercentage']
        );
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($goals);

}
?>