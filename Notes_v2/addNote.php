<?php
    include 'connection.php';
    session_start();

    $data = file_get_contents("php://input");
    $jdata = json_decode($data, true);

    $title = $jdata['title'];
    $content = $jdata['content'];
    $userId = $_SESSION['userId'];

    if(!empty($title) && !empty($content))
    {
        $sql = "INSERT INTO Notes (userId, title, content) VALUES ('$userId', '$title', '$content')";
        if($conn->query($sql) === TRUE)
            echo "Note Added Successfully!";
        else 
            echo "Error Adding Note!" . $conn->error;
    }
    else 
        echo "Please Add Title Or Content";
    
?>