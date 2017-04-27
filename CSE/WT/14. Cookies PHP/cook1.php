<?php
	setcookie("name", "silpa", time()+3600, "/", "",  0);
	setcookie("rno", "660755069", time()+3600, "/","", 0);
	setcookie("branch","cse",time()+3600,"/","",0);

	if(isset($_COOKIE["rno"])) echo  $_COOKIE["rno"] . "<br />";
	if(isset($_COOKIE["name"]))	echo $_COOKIE["name"] . "<br>";
	if(isset($_COOKIE["branch"])) echo $_COOKIE["branch"] . "<br>";
?>
