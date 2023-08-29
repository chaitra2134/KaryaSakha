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
    $eventId = $jdata['eventId'];


    if(!empty($eventId))
    {
        $sql = "DELETE FROM Calender WHERE eventId = $eventId && userId = $userId";
        if($conn->query($sql) === TRUE)
            echo "Event Deleted Successfully!";
        else 
            echo "Error Deleting Event!";
    }
    else 
        echo "No Such Event Found!";

?>