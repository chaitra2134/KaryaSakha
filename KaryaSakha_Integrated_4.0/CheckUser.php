<?php
session_start();
$flag = false;
if(isset($_SESSION['userId']))
{
    $flag = true;
   
}
else
{
    $flag = false;
   
}
$response = array("status" => $flag);
echo json_encode($response);

?>
