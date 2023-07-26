<?php

/*

    Author : Prizam Sarkhi
    Date : 19/07/2023 @ 20:38

    Main backend process which will store user information in the table, send email to the user
    and make a copy of the template file

    Edited By: Chinmayee 
    Date: 21/07/23 @ 14:16

*/

    if(isset($_POST['submit']))
    {
        // Variables that will store data from the form
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $userName = $_POST['userName'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $profession = $_POST['profession'];
        $SESSION['verifyUserName'] = $userName;
        
        
        // Including Connection File
        include "connection.php";

        // Data Sanitization
        foreach($_POST as $value)
        {
            $value = strip_tags($value);
            $value = mysqli_real_escape_string($conn,$value);
        }

        // Encrypting Password
        $pass = md5($pass);

        // Inserting Values In The User Table
        $sql = "INSERT INTO user(userName,firstName,lastName,pass, email,dob,gender,profession)
                VALUES('$userName','$firstName','$lastName','$pass','$email','$dob','$gender','$profession')";

        // Checking If User Signed In Successfully
        if($conn->query($sql)===TRUE)
            echo "<br> Sign Up Successful! <br> Welcome $userName! Let's Get You Started...";
        else
            echo "Failed ", $conn->error;
        $conn->close();
        
    }
    else
        echo "Sorry! We couldn't sign you up! Please try again!";
?>