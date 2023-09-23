<?php
    include 'connection.php';
    session_start();

    $data = file_get_contents("php://input");
    $jdata = json_decode($data, true);

    $noteId = $jdata['noteId'];
    $userId = $_SESSION['userId'];

    if(!empty($noteId))
    {
        $sql = "DELETE FROM Notes WHERE noteId = $noteId && userId = $userId";
        if($conn->query($sql) === TRUE)
            echo "Note Deleted Successfully!";
        else 
            echo "Error Deleting Note!";
    }
    else 
        echo "No NoteId Found!";
    
?>