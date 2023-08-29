<?php   

    /*
        Author: Chinmayee
        Date: 24/08/2023
    */

    include 'connection.php';
    session_start();         

    $data = file_get_contents("php://input");
    $jdata = json_decode($data, true);

    $userId = $_SESSION['userId'];
    $eventName = $jdata['newEvent']['eventName']; 
    $startTime = $jdata['newEvent']['startTime'];
    $endTime = $jdata['newEvent']['endTime'];
    $eventDay = $jdata['eventDate']['addDay'];
    $eventMonth = $jdata['eventDate']['addMonth'];
    $eventYear = $jdata['eventDate']['addYear'];
    $eventDate = date("Y-m-d", strtotime($eventYear. '-' .$eventMonth. '-' .$eventDay));


    if(!empty($eventDate) && !empty($eventName) && !empty($startTime) && !empty($endTime))
    {
        $sql = "INSERT INTO Calender (userId, eventDate, eventName, startTime, endTime) VALUES ('$userId', '$eventDate', '$eventName', '$startTime', '$endTime')";
        if($conn->query($sql) === TRUE)
            echo "Event Added Successfully!";
        else 
            echo "Error Adding Event!" . $conn->error;
    }
    else 
        echo "Please Add Required Fields!";
			
?>
