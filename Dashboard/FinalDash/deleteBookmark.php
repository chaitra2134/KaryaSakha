<?php

    /*
        Author: Chinmayee
        Date: 21/09/23
    */

    include 'connection.php';
    session_start();

    $data = file_get_contents("php://input");
    $jdata = json_decode($data, true);

    $bookmarkId = $jdata['bookmarkId'];
    $userId = $_SESSION['userId'];

    if(!empty($bookmarkId))
    {
        $sql = "DELETE FROM Bookmarks WHERE bookmarkId = $bookmarkId && userId = $userId";
        if($conn->query($sql) === TRUE)
            echo "Bookmark Deleted Successfully!";
        else 
            echo "Error Deleting Bookmark!";
    }
    else 
        echo "No BookmarkId Found!";
    
?>