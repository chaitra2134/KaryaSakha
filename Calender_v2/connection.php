<?php

  /* 
      Author: Chinmayee
      Date: 19/07/2023
      Establishing Database Connection
  */

  // Declaring Variables
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "Karyasakha";

  // Creating Connection
  $conn = new mysqli($servername, $username, $password, $database);

  // Checking Connection
  if ($conn->connect_error) 
    die("Connection failed: " . $conn->connect_error);
  //else
    //  echo "<br> \tConnected Established Successfully! <br>";

?>