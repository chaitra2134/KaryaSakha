<?php

/*

    Author : Prizam Sarkhi
    Date : 19/07/2023 @ 20:38

    Storing the user information in the table

    Edited By: Chinmayee 
    Date: 21/07/23 @ 14:16

*/
// Variables that will store data from the form


$userName = $_SESSION['un'];
$email = $_SESSION['em'];
$pass = $_SESSION['pw'];



// Including Connection File
include "../../Tables_and_Connection/Connection.php";

// Data Sanitization
foreach ($_POST as $value) {
    $value = strip_tags($value);
    $value = mysqli_real_escape_string($conn, $value);
    $value = trim($value);
}

// Encrypting Password (md5 is old and relatively weaker than sha512)
$pass = hash('sha512', (string)$pass);


// Inserting Values In The User Table
$sql = "INSERT INTO user(userName,email,pass)
                VALUES('$userName','$email','$pass')";
$conn->query($sql);


$sql2 = "SELECT userId from user WHERE email = ? ";
$stmt = $conn -> prepare($sql2);
$stmt -> bind_param("s", $email);
$stmt -> execute();
$result = $stmt -> get_result();

if($row = $result -> fetch_assoc())
{
    $userId = $row['userId'];
}

$_SESSION['userId'] = $userId;

?>
