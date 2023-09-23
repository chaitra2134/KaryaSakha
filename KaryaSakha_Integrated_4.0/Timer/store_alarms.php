<?php
include '../../Backend/Connection_Database_Table/Connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['userId'])) {
        $data = json_decode(file_get_contents("php://input"), true);

        $userId = $_SESSION['userId'];
        $alarmHour = $_POST['alarmHour'];
        $alarmMinute = $_POST['alarmMinute'];
        $isActive = $_POST['isActive'];

        // Insert alarm data into the database
        $query = "INSERT INTO Alarms (creatorId, alarmHour, alarmMinute, isActive) 
        VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iiis", $userId, $alarmHour, $alarmMinute, $isActive);
        $inserted = $stmt->execute();
        $stmt->close();

        if ($inserted) {
        echo "Alarm inserted successfully";
        }
        else
        {
            echo "Alarm insertion failed";
        }
    }
}

?>

