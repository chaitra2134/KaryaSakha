
<?php
/*
Author : Prizam Sarkhi
Date : 19/07/2023 @ 20:50

code for copying an existing template file and creating a new file which will be displayed
after the user signs up successfully (file name will be same as user name)
*/


if(isset($_POST['submit'])){
  
  include 'sendemail.php'; //Control will go to sendemail.php file, check it out
    
  
  $existingfile = 'template.html';
    $newfile = "$userName.html"; //new file's name will be same as the value inside the variable $userName

    $contents = file_get_contents($existingfile); //getting content from template file

    $file = fopen($newfile, 'w'); //Opening the new file in write mode
    fwrite($file,$contents); //Copying contents to new file
    fclose($file);

    
    header("Location: $userName.html"); //Opening the newly created file
}

?>