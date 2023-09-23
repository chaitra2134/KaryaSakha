<?php
/* 
      Author: Chinmayee
      Date: 19/07/2023
      Time: 16:07
      Creating User Table

      Edited By -
      Prizam (19/07/2023 @ 19:55)
      Edited again by Prizam @28/07/2023
*/

include 'Connection.php';
  
// Creating User Table
// userId,userName,email and pass fields will be filled after the user signs up
// remaining fields will not be required for sign up
// password field size is set to 200 because if is converted into a large string after encryption

  $sql = "CREATE TABLE User 
    (
      userId INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      userName VARCHAR(30) NOT NULL,
      email VARCHAR(35) NOT NULL,
      pass VARCHAR(200) NOT NULL,
      firstName TEXT(30),
      lastName TEXT(30),
      dob VARCHAR(15),
      gender TEXT(20),
      profession TEXT(30),
      dateCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP 
    )";

  // Executing the query and checking if it has executed successfully
  if($conn->query($sql) === TRUE) 
  {
    echo "<br> Table 'User' Created Successfully";
  } 
  else 
  {
    echo "<br> Error Creating Table User: " . $conn->error;
  }

  $conn->close();
  
?>
