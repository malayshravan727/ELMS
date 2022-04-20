<?php session_start();?>

<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "login_sample_db";

$conn = mysqli_connect($host, $user, $password, $db);

error_reporting(0);
?>