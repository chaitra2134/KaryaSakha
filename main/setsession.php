<?php

/* 
    Author: Prizam
    Date: 25/07/23

    Starting a session for OTP verification
*/

session_start();

?>

<?php

$_SESSION['un'] = $_POST['userName'];
$_SESSION['em'] = $_POST['email'];
$_SESSION['pw'] = $_POST['pass'];


?>