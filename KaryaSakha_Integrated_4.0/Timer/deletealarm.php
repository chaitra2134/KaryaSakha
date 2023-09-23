<?php

session_start();
include '../../Backend/Connection_Database_Table/Connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
        $alarmHour = $_POST['alarmHour'];
        $alarmMinute = $_POST['alarmMinute'];
        

        // Update the isActive column in the database
        $query = "DELETE FROM Alarms WHERE creatorId = ? AND alarmHour = ? AND alarmMinute = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iii", $userId, $alarmHour, $alarmMinute);
        $updated = $stmt->execute();
        $stmt->close();

        if ($updated) {
            echo "delete successful";
        } else {
            echo "delete unsuccessful";
        }
    }
}
?>
