<?php                
    include 'connection.php';
    //session_start();
    //$data = file_get_contents("php://input");
    //$jdata = json_decode($data, true);
    //$data = $_POST['jdata'];
    //$jdata = json_decode($data, true);

    //var_dump($data);
    //var_dump($jdata);
    //$eventDay = $_GET['activeDay'];
    //$eventMonth = $_GET['month'];
    //$eventYear = $_GET['year'];
    
    $id = 13;
    //$eventDay = $jdata['day'];
    //var_dump($id);
    //$eventDay = $jdata['showEventDate']['day'];
    //$eventMonth = $jdata['showEventDate']['month'];
    //$eventYear = $jdata['showEventDate']['year'];
    //$eventDate = date("y-m-d", strtotime($eventYear. '-' .$eventMonth. '-' .$eventDay));
    
    $eventDay = '05';
    $eventMonth = '08';
    $eventYear = '2023';
    //$eventDate = $eventYear . '-' . $eventMonth . '-' . $eventDay;
    
    $eventDate = date("Y-m-d", strtotime($eventYear. '-' .$eventMonth. '-' .$eventDay));
    echo $eventDate;
    //$sql = "SELECT * FROM Calender WHERE userId = $id";
    $sql = "SELECT * FROM Calender WHERE userId = $id AND eventDate = '$eventDate' ";
    $result = $conn->query($sql);
    if($result->num_rows > 0)
    {
         $data = array();
         //$i = 1;
         while($row = $result->fetch_assoc())
         {
            $data['eventName'] = $row['eventName'];
            $data['startTime'] = $row['startTime'];
            $data['endTime'] = $row['endTime'];
            echo $data;
            var_dump($data);
            echo "<div class='no-event'>
        <h3>Goodbye</h3>
        </div>";
            //$data[] = $row;
            //$data[] = $eventDay;
             //$i++;
         }
    }
    else
    {
        echo "<div class='no-event'>
        <h3>Hello</h3>
        </div>";
        $data = "Goodbye Goodbye";
        var_dump($data);
    }

    
    //echo json_encode($data);
  
?>