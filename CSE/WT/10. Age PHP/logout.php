<?php
session_start();
unset($_SESSION["uname"]);
unset($_SESSION["age"]);
header("Location:input.php");
?>