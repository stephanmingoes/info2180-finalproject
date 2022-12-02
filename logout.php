<?php
session_start();
session_destroy();
unset($_SESSION['userID']);
header('location:/info2180-finalproject/login.php');
exit();
?>