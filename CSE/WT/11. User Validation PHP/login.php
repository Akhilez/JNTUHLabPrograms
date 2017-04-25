<?php
session_start();
require('config.php');
if (isset($_POST['Submit'])) {
    $_SESSION["uname"] = trim($_POST["uname"]);
    $_SESSION["pass"] = trim($_POST["pwd"]);
    $u = $_SESSION["uname"];
    $p = $_SESSION["pass"];
    $sql = mysql_query("SELECT * FROM `reg` where `uname`='$u' ");
    while ($row = mysql_fetch_array($sql)) {
        $_SESSION["a"] = $row['uname'];
        $_SESSION["b"] = $row['password'];
        $_SESSION["c"] = $row['lname'];
        $_SESSION["d"] = $row['fname'];
    }
    if ($u != $_SESSION["a"] && $p != $_SESSION["b"]) {
        header("location:reg.php");
    } elseif ($_SESSION["pass"] != $_SESSION["b"]) {
        $error = "error : invalid password.";
        $code = "1";
    } else {
        header('location:welcome.php');
        mysql_close($con);
    }
}
?>
<body>
Login

<?php if (isset($error)) {
    echo "<p class='message'>" . $error . "</p>";
} ?>

<form name="info" id="info" method="post" action="">
    Username: <input name="uname" type="text" value="<?php if (isset($uname)) echo $uname; ?>"
        <?php if (isset($code) && $code == 1) echo "class=error"; ?>>
    Password: <input name="pwd" type="password" value="<?php if (isset($pass)) echo $pass; ?>"
        <?php if (isset($code) && $code == 1) echo "class=error"; ?>>
    <input type="submit" name="Submit" value="Submit"/>
</form>

</body>
</html>