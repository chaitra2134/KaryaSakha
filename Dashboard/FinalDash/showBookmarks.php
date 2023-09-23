<?php

    /*
        Author: Chinmayee
        Date: 21/09/23
    */

    include 'connection.php';
    session_start();

    $userId = $_SESSION['userId'];
    $sql = "SELECT * FROM Bookmarks WHERE userId = $userId";
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