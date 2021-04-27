<?php
require_once "includes/config.includes.php";

if(isset($_POST['logout']))
session_start();
unset($_SESSION["id"]);
unset($_SESSION["name"]);
header("Location:login.php");


?>
