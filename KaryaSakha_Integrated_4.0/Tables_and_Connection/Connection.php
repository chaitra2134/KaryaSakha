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
  $database = "KaryaSakha";

  // Creating Connection
  $conn = new mysqli($servername, $username, $password, $database);

  // Checking Connection
  if ($conn->connect_error)
  { 
    die("Connection failed: " . $conn->connect_error);
  }
?>