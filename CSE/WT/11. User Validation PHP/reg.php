<?php
session_start();
echo "sorry your not a Registered user," . $_SESSION["uname"];
echo "<br>";
echo "please provide your details";
require('config.php');
if (isset($_POST['Submit'])) {
    $fname = ($_POST["fname"]);
    $lname = trim($_POST["lname"]);
    $uname = $_SESSION["uname"];
    $p = $_SESSION["pass"];
    $email = trim($_POST["email"]);
    $mno = trim($_POST["mobile"]);
    require('dbconfig.php');
    $sql = "INSERT INTO `dummy_db`.`reg` VALUES ('$fname', '$lname', '$uname', '$p','$email','$mno')";
    if (mysql_query($sql)) {
        echo "Inserted successfully";
        mysql_close($con);
    }
}
?>
<html>
<body>

Registartion page
<form method="post">
    First Name:<input type="text" name="fname">
    Last Name:<input type="text" name="lname">
    Email:<input type="text" name="email">
    Mobile No:<input type="text" name="mobile">
    <input type="submit" value="Register" name="Submit">
</form>

</body>
</html>