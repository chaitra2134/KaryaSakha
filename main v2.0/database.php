<?php

  /* 
      Author: Chinmayee
      Date: 19/07/2023
      Time: 16:07
      Creating User Table And Establishing Database Connection
  */

  // Declaring Variables
  $servername = "localhost";
  $username = "root";
  $password = "";

  // Creating Connection
  $conn = new mysqli($servername, $username, $password);

  // Checking Connection
  if ($conn->connect_error) 
    die("Connection failed: " . $conn->connect_error);
  else
      echo "<br> \tConnected Established Successfully! <br><br>";

  // Creating Database
  $sql = "CREATE DATABASE KaryaSakha";
  if ($conn->query($sql) === TRUE) 
    echo "\tDatabase Created Successfully! <br>";
  else
    echo "\tError Creating Database: " . $conn->error;

  $conn->close();

?> 