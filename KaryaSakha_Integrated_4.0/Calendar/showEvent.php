<?php          

    /*
        Author: Chinmayee
        Date: 24/08/2023
    */
    
    include '../Tables_and_Connection/Connection.php';
    session_start();
    $data = file_get_contents("php://input");
    $jdata = json_decode($data, true);

    
    $userId = $_SESSION['userId'];
    
    $eventDay = $jdata['day'];
    $eventMonth = $jdata['month'];
    $eventYear = $jdata['year'];
    $eventDate = date("y-m-d", strtotime($eventYear. '-' .$eventMonth. '-' .$eventDay));
    //$eventDate = $eventYear . '-' . $eventMonth . '-' . $eventDay;
    
    //$sql = "SELECT * FROM Calender WHERE userId = $id";
    $sql = "SELECT * FROM Calender WHERE userId = $userId AND eventDate = '$eventDate' ";
    $result = $conn->query($sql);
    if($result->num_rows > 0)
    {
         $data = array();
         //$i = 1;
         while($row = $result->fetch_assoc())
         {
            //$data['eventName'] = $row['eventName'];
            //$data['startTime'] = $row['startTime'];
            //$data['endTime'] = $row['endTime'];
            $data[] = $row;
            //$data[] = $eventDay;
             //$i++;
         }
    }
    else
    {
        echo "<div class='no-event'>
        <h3> No Events </h3>
        </div>";
    }

    
    echo json_encode($data);
  
?>