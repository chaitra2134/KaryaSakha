<?php
session_start();
include '../Tables_and_Connection/Connection.php'; // Include your database connection code

if (!isset($_SESSION['userId'])) {
    header("Location: LogIn/LogIn.html");
    exit();
} else {
    $userId = $_SESSION['userId'];
    // Query to fetch tasks from the database
    $sql = "SELECT * FROM ToDoList WHERE creatorId = $userId AND taskQuadrant = 1"; // Modify this query as per your database structure

    $result = $conn->query($sql);

    $tasks = array();
    $recordLimit = 4;

    if ($result->num_rows > 0) {
        $count = 0;
        while ($row = $result->fetch_assoc()) {
            if ($count < $recordLimit) {
                $tasks[] = array(
                    'taskId' => $row['taskId'],
                    'taskContent' => $row['taskContent'],
                    'taskQuadrant' => $row['taskQuadrant'],
                    'isCompleted' => $row['isCompleted'],
                    'isStarred' => $row['isStarred']
                );
                $count++;
            } else {
                break;
            }
        }
    }

    $conn->close();

    header('Content-Type: application/json');
    echo json_encode($tasks);
}
