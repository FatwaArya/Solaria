<?php
session_start();
unset($_SESSION["name"]);
unset($_SESSION["id"]);
unset($_SESSION["status_login"]);
header("Location: login.php");
?>