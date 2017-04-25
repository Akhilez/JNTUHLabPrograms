<?php require('config.php');
if (isset($_POST['Submit'])) {
    $uname = trim($_POST["uname"]);
    $pass = trim($_POST["pwd"]);
    $sql = mysql_query("SELECT * FROM reg where uname=’$uname’ and password=’$pass’");
    while ($row = mysql_fetch_array($sql)) {
        $a = $row['uname'];
        $b = $row['password'];
    }
    if ($uname != $a) {
        $error = "error : invalid username.";
        $code = "1";
    } elseif ($pass != $b) {
        $error = "error : invalid password.";
        $code = "1";
    } else {
        header('location:req.php');
        mysql_close($con);
    }
}
?>
<html>
<body>
    Login
    <?php if (isset($error)) {
        echo "<p class='message'>" . $error . "</p>";
    } ?>
    <form name="info" id="info" method="post" action="">
        Username:<input name="uname" type="text" value="<?php if (isset($uname)) echo $uname; ?>"
            <?php if (isset($code) && $code == 1) echo "class=error"; ?>>
        Password:<input name="pwd" type="password" value="<?php if (isset($pass)) echo $pass; ?>"
            <?php if (isset($code) && $code == 1) echo "class=error"; ?>>
        <input type="submit" name="Submit" value="Submit"/>
    </form>
</body>
</html>