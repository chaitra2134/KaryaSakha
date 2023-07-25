<?php
session_start();

?>

<?php
$_SESSION['un'] = $_POST['userName'];
$_SESSION['em'] = $_POST['email'];
$_SESSION['pw'] = $_POST['pass'];


?>