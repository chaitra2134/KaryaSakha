<?php
    include 'connection.php';
    session_start();

    $data = file_get_contents("php://input");
    $jdata = json_decode($data, true);

    $noteId = $jdata['noteId'];
    $userId = $_SESSION['userId'];

    if(!empty($noteId))
    {
        $isHidden = true;  
        $sql = "UPDATE Notes SET isHidden = '$isHidden' WHERE userId = $userId AND noteId = $noteId";
        if($conn->query($sql) === TRUE)
            echo "Note Hidden Successfully!";
        else 
            echo "Error Hiding Note!";
    }
    else 
        echo "No NoteId Found!";
    
?>