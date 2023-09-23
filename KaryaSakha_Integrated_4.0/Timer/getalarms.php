<?php
session_start();
include '../../Backend/Connection_Database_Table/Connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
    
    $query = "SELECT alarmHour, alarmMinute, isActive FROM ALARMS WHERE creatorId = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    
    $result = $stmt->get_result();
    
    $alarms = [];
    while ($row = $result->fetch_assoc()) {
        $alarms[] = $row;
    }
    
    $stmt->close();
    
    echo json_encode($alarms);
} else {
    // Handle unauthorized access or other errors
    http_response_code(403); // Forbidden
}
?>
