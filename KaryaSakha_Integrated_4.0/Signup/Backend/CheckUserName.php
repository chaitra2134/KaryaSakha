<?php
  //session_start();
?>
<?php

    /* 
      Author: Prizam
      Date: 31/07/2023
      Time: 20:31
      Checking if the email provided by the user is already
      registered in the table
    */

  //session_save_path("./tmp");
  

       // Assigning value to local variable
       $userName = $_SESSION['un'];

      // Striping HTML Tags And Trimming Extra Spaces
      $userName = strip_tags($userName);
      
      $userName = htmlspecialchars($userName);
      
      $userName = trim($userName);
      

      // Including Connection File
      include "../../Tables_and_Connection/Connection.php";

      // Escaping Special Characters In SQL Query Statements
      $userName = mysqli_real_escape_string($conn,$userName);
      
      // Fetching Record 
      $sql = "SELECT userName FROM user WHERE userName = ?";

      // Preparing the query for execution
      $stmt = $conn -> prepare($sql);

      // Binding the parameters in the query (? will be replaced by $email)
      $stmt -> bind_param("s", $userName);

      // Executing the query
      $stmt -> execute();

      // Fetching the result obtained by executing the query
      $result = $stmt -> get_result();

      // Checking if any rows have been returned
      if($result -> num_rows > 0)
      {
        // Extracting the contents of the row in a $row variable
        $row = $result -> fetch_assoc();

        // If the email matches 
        if($userName == $row['userName'])
        {
          // Displaying message and redirecting to the Log In page
          echo "<script>alert('This Username is already taken');
          history.back();</script>";
    
          exit();
        }
      }
      else
      {
        // If the username does not exist already, the further process will be executed
        include 'SendOtp.php';
        exit();
      }
    
    
?>