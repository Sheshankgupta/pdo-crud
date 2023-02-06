<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
require('connection1.php');
$sql='delete from posts where id='. $_GET['id'];
$prepare=$conn->prepare($sql);
$execute=$prepare->execute();
header('location:read.php');
?>