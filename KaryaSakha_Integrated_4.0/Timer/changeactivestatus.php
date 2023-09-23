<?php

session_start();
include '../../Backend/Connection_Database_Table/Connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
        $alarmHour = $_POST['alarmHour'];
        $alarmMinute = $_POST['alarmMinute'];
        $isActive = $_POST['isActive'];

        // Update the isActive column in the database
        $query = "UPDATE ALARMS SET isActive = ? WHERE creatorId = ? AND alarmHour = ? AND alarmMinute = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("siii", $isActive, $userId, $alarmHour, $alarmMinute);
        $updated = $stmt->execute();
        $stmt->close();

        if ($updated) {
            echo "status change successful";
        } else {
            echo "status change unsuccessful";
        }
    }
}
?>
