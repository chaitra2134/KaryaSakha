<?php
    include 'connection.php';
    session_start();

    $data = file_get_contents("php://input");
    $jdata = json_decode($data, true);

    $noteId = $jdata['noteId'];
    $userId = $_SESSION['userId'];

    if(!empty($noteId))
    {
        $isFavourite = true;  
        $sql = "UPDATE Notes SET isFavourite = '$isFavourite' WHERE userId = $userId AND noteId = $noteId";
        if($conn->query($sql) === TRUE)
            echo "Note Added To Favorites Successfully!";
        else 
            echo "Error Adding Note To Favorites!";
    }
    else 
        echo "No NoteId Found!";
    
?>