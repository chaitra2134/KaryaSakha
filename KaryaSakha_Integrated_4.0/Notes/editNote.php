<?php

    include 'connection.php';
    session_start();

    $data = file_get_contents("php://input");
    $jdata = json_decode($data, true);

    $userId = $_SESSION['userId'];
    $noteId = $jdata['noteId'];
    $sql = "SELECT * FROM Notes WHERE userId = $userId AND noteId = $noteId";
    $result = $conn->query($sql);
    if($result->num_rows > 0)
    {
         $data = array();
         while($row = $result->fetch_assoc())
         {
            $_SESSION['noteId'] = $row['noteId'];
             $data[] = $row;
         }
     }

    
    echo json_encode($data);
  
?>