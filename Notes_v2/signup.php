<?php

    session_start();
    /* 
        Author: Chinmayee
        Date: 19/07/2023
        Time: 16:07
        Verifying Sign Up
    */
      $_SESSION['un'] = $_POST['uname'];
      $_SESSION['em'] = $_POST['email'];
      $_SESSION['pw'] = $_POST['pass'];

    if(isset($_POST["submit"]))
    {
        // Fetching Form Values
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        // $phone = $_POST['phone'];
        $pass = $_POST['pass'];

        // Stripping Tags
        $uname = strip_tags($uname);
        $email = strip_tags($email);
        // $phone = strip_tags($phone);
        $pass = strip_tags($pass);
        
        // Including Connection File
        include("connection.php");

        // Data Sanitization
        $uname = mysqli_real_escape_string($conn,$uname);
        $email = mysqli_real_escape_string($conn,$email);
        // $phone = mysqli_real_escape_string($conn,$phone);
        $pass = mysqli_real_escape_string($conn,$pass);

        // Encrypting Password
        //$pass = md5($pass);
        
        // Inserting Record
        $stmt = $conn->prepare("INSERT INTO User (userName, email, pass) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $uname, $email, $pass);

        $stmt->execute();



        $stmt = $conn->prepare("SELECT userId, userName, pass FROM User WHERE userName = ?");
        $stmt -> bind_param("s", $uname);
      
      // Executing the query
      $stmt -> execute();

      // Fetching the result obtained after executing the query
      $result = $stmt -> get_result();

      $row = $result -> fetch_assoc();
      $_SESSION['id'] = $row['userId'];
      header("Location: notes(1).html");
      
        
    } 
    else 
        echo "<script>alert('You are not logged in!!');</script>";
    
?>