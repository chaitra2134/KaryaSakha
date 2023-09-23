<?php
    session_start();
    include 'connection.php';

    //$data = file_get_contents("php://input");
    //$jdata = json_decode($data, true);

    $userId = $_SESSION['id'];
    /*
        $userName = $jdata['userName'];
        $firstName = $jdata['firstName'];
        $lastName = $jdata['lastName'];
        $dob = $jdata['dob'];
        $gender = $jdata['gender'];
        $profession = $jdata['profession'];
    */
    $sql = "SELECT * FROM User WHERE userId = $userId ";
    $result = $conn->query($sql);
    if($result->num_rows > 0)
    {
      //echo "Hello";
      while($row = $result->fetch_assoc())
      {
        $userName = $row['userName'];
        $email = $row['email'];
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $dob = $row['dob'];
        $gender = $row['gender'];
        $profession = $row['profession'];
        $file_name = $row['file_name'];
      }
          
      //echo $file_name;
      $image_src = 'uploads/' . $file_name;
    }
    
    
    if(isset($_POST['saveChanges']))
    {
        $userName = $_POST['userName'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $profession = $_POST['profession'];
    

        $sql = "UPDATE User SET userName = '$userName', firstName = '$firstName', lastName = '$lastName', 
                dob = '$dob', gender = '$gender', profession = '$profession' WHERE userId = $userId";
        if($conn->query($sql) === TRUE)
        {
            $sql = "SELECT * FROM User WHERE userId = $userId ";
            $result = $conn->query($sql);
            if($result->num_rows > 0)
            {
            //echo "Hello";
            while($row = $result->fetch_assoc())
            {
                $userName = $row['userName'];
                $email = $row['email'];
                $firstName = $row['firstName'];
                $lastName = $row['lastName'];
                $dob = $row['dob'];
                $gender = $row['gender'];
                $profession = $row['profession'];
                $file_name = $row['file_name'];
            }
                
            //echo $file_name;
            $image_src = 'uploads/' . $file_name;
    }
            header("Location: profile2.php");
        }
            //echo "Profile Updated Successfully!";
        else 
            echo "Error Updating Profile!" . $conn->error;

            
    }
        
?>