<?php
$con = mysql_connect("localhost", "root", "") or die("Failed to connect to MySql.");
mysql_select_db("dummy_db", $con) or die("Failed to connect to database");
?>