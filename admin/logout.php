<?php

session_start();


// Remove all session data
$_SESSION = array();


// Destroy session
session_destroy();


// Redirect to login page
header("Location: ../index.php");

exit;

?>