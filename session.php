<?php
session_start();

if(!isset($_SESSION['userID']) || (trim($_SESSION['userID']) == '')){
	header('location:login.php');
	exit();
}

$session_id = $_SESSION['userID']; 
// $session_email = $_SESSION['userEmail']; 

?>