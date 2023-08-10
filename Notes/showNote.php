<?php

    include 'connection.php';
    session_start();

    $id = $_SESSION['id'];
    $sql = "SELECT * FROM Notes WHERE userId = $id AND isHidden = '0' ORDER BY dateCreated DESC";
    $result = $conn->query($sql);
    if($result->num_rows > 0)
    {
         $data = array();
         while($row = $result->fetch_assoc())
         {
             $data[] = $row;
         }
     }

    
    echo json_encode($data);
  
?>