<?php include_once 'connection.php';

// session_destroy();

$_SESSION['login_id']=$_SESSION['logout'];

header('location:index.php');

?>