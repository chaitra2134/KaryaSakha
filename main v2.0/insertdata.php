


<?php

/*
Author : Prizam Sarkhi
Date : 19/07/2023 @ 20:38

Main backend process which will store user information in the table, send email to the user
and make a copy of the template file
*/

if(isset($_POST['submit']))
{
    $userName = $_SESSION['un'];
    $email = $_SESSION['em'];
    $pass = $_SESSION['pw'];
   
    //Variables that will store data from the form
    
    
    
//Variables that store the information requird to establish connection with the database
$servername = "localhost";
$userNameServer = "root";
$password = "";
$dbname = "KaryaSakha";

$conn = new mysqli($servername,$userNameServer,$password,$dbname);


    if($conn->connect_error)
    {
        die("Connection failed ". $conn->connect_error);
    }
    else
    {
        $sql = "INSERT INTO user(userName,email,pass)
        Values('$userName','$email','$pass')";

        if($conn->query($sql)===TRUE)
        {
            echo "Values inserted successfully";
            
        }
        else
        {
            echo "Failed ", $conn->error;
        }
    }
  $conn->close();

        
        
}
?>