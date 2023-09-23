<?php
    include 'connection.php';
    session_start();

    $data = file_get_contents("php://input");
    $jdata = json_decode($data, true);

    $title = $jdata['title'];
    $content = $jdata['content'];
    $userId = $_SESSION['userId'];
    if(isset($_SESSION['noteId']))
    {
        $noteId = $_SESSION['noteId'];
        if(!empty($title) && !empty($content) && $noteId != null)
        {
            $sql = "UPDATE Notes SET title = '$title', content = '$content' WHERE userId = $userId AND noteId = $noteId";
            
            if($conn->query($sql) === TRUE)
            {
                echo "Note Updated Successfully!";
                unset($_SESSION['noteId']);
            }
            else 
            {
                echo "Error Updating Note!" . $conn->error;
                unset($_SESSION['noteId']);
            }
        }
    }

    
    // if(!empty($title) && !empty($content) && $noteId == null)
    else if(!empty($title) && !empty($content) )
    {
        $sql = "INSERT INTO Notes (userId, title, content) VALUES ('$userId', '$title', '$content')";
        if($conn->query($sql) === TRUE)
            echo "Note Added Successfully!";
        else 
            echo "Error Adding Note!" . $conn->error;
    }
    // else if(!empty($title) && !empty($content) && $noteId != null)
    
    else 
        echo "Please Add Title Or Content";
    
?>