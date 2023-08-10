<?php
    include 'connection.php';
    session_start();

    $data = file_get_contents("php://input");
    $jdata = json_decode($data, true);

    $title = $jdata['title'];
    $content = $jdata['description'];
    $id = $_SESSION['id'];

    if(isset($title) && isset($content))
    {
        $sql = "INSERT INTO Notes (userId, title, content) VALUES ('$id', '$title', '$content')";
        if($conn->query($sql) === TRUE)
            echo "Note Added Successfully!";
        else 
            echo "Error Adding Note!" . $conn->error;
    }
    else 
        echo "Please Add Title Or Content";
    
?>