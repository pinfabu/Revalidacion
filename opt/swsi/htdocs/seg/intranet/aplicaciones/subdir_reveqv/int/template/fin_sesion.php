<?php
session_start(); 
unset($_SESSION['userInfo']);
unset($_SESSION['userInfo2']);
session_destroy();
header("Location: ./index.php");
?>