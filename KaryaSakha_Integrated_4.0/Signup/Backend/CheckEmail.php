<?php
  session_start();
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
  

    // if(isset($_POST['submit_SignUp']))
    // {
      
      
      $_SESSION['un'] = $_POST['userName'];
      $_SESSION['em'] = $_POST['email'];
      $_SESSION['pw'] = $_POST['pass'];

     
      // Assigning Values To PHP Variables
      $email = $_SESSION['em'];
      
      
      // Striping HTML Tags And Trimming Extra Spaces
      $email = strip_tags($email);
      
      $email = htmlspecialchars($email);
      
      $email = trim($email);
      

      // Including Connection File
      include "../../Tables_and_Connection/Connection.php";

      // Escaping Special Characters In SQL Query Statements
      $email = mysqli_real_escape_string($conn,$email);
      
      // Fetching Record 
      $sql = "SELECT email FROM user WHERE email = ?";

      // Preparing the query for execution
      $stmt = $conn -> prepare($sql);

      // Binding the parameters in the query (? will be replaced by $email)
      $stmt -> bind_param("s", $email);

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
        if($email == $row['email'])
        {
          // Displaying message and redirecting to the Log In page
          echo "<script>alert('Email already Registered, Please Log In');
          window.location = '../../LogIn/Frontend/LogIn.html';</script>";
    
          exit();
        }
      }
      else
      {
        include 'CheckUserName.php';
        exit();
      }
    //}
    
?>