<?php

session_start();

// Prevent caching
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

if (isset($_SESSION['un']) && isset($_SESSION['userId'])) {
    unset($_SESSION['un']);
    unset($_SESSION['userId']);


    if (isset($_SESSION['em']) && isset($_SESSION['pw'])) {
        unset($_SESSION['em']);
        unset($_SESSION['pw']);
    }

    header("Location: ../LogIn/Frontend/LogIn.html");
    exit();
} else {
    // header("Location: ../../Frontend/LogIn/LogIn.html");
    echo "<script>alert('Login/Signup first !');</script>";
    exit();
}

?>
