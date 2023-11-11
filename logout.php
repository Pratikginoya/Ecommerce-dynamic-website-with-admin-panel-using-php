<?php include_once 'admin/connection.php';

session_destroy();

header('location:login_home.php');

?>