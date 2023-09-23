<?php

    /*
        Author: Chinmayee
        Date: 21/09/23
    */

    include 'connection.php';
    session_start();

    $data = file_get_contents("php://input");
    $jdata = json_decode($data, true);

    $link = $jdata['link'];
    $title = $jdata['title'];
    $content = $jdata['content'];
    $userId = $_SESSION['userId'];


    if(!empty($link))
    {
        $sql = "INSERT INTO Bookmarks (userId, link, title, content) VALUES ('$userId', '$link', '$title', '$content')";
        if($conn->query($sql) === TRUE)
            echo "Bookmark Added Successfully!";
        else 
            echo "Error Adding Bookmark!" . $conn->error;
    }
    else 
        echo "Please Add a Link!";
    
?>