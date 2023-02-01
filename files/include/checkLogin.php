<?php
session_start();
include_once("connection.php");

echo $encodeImageData;

// If the user is not logged in redirect to the login page...
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../index.php');
    exit;
}

?>