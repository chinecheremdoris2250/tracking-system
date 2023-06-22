<?php

session_start();

if (!isset($_SESSION['email'])) {
    header("location:index.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:index.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "tracking-system";

$data = mysqli_connect($host, $user, $password, $db);
?>