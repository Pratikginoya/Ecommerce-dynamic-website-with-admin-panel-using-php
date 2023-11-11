<?php include_once 'site_connection.php';

// session_destroy();

$_SESSION['login']=$_SESSION['logout'];;

header('location:login_home.php');

?>