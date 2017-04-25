<?php
session_start();
unset($_SESSION["a"]);
unset($_SESSION["b"]);
header("Location:login.php");
?>