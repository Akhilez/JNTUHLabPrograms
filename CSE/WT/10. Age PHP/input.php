<?php
session_start();
if (isset($_POST["submit"])) {
    $_SESSION["uname"] = $_POST["uname"];
    $age = $_POST["age"];
    if ($age >= 18) {
        header("location:welcome.php");
    } else {
        header("location:error.php");
    }
}
?>
<html>
<body>
<form name="frmUser" method="post" action="">
    Enter Login Details
    Username: <input type="text" name="uname">
    Age: <input type="text" name="age">
    <input type="submit" name="submit" value="Submit">
</form>
</body>

</html>