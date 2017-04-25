<?php require('config.php');
if (isset($_POST['Submit'])) {
    $fname = ($_POST["fname"]);
    $lname = trim($_POST["lname"]);
    $uname = trim($_POST["uname"]);
    $p = trim($_POST["pwd"]);
    $email = trim($_POST["email"]);
    $mno = trim($_POST["mobile"]);
    if ($fname == "") {
        $error = "error : You did not enter a name.";
        $code = "1";
    } elseif ($uname == "") {
        $error = "error : You did not enter a username.";
        $code = "1";
    } elseif ($p == "") {
        $error = "error : You did not enter a password.";
        $code = "1";
    } elseif ($mno == "") {
        $error = "error : Please enter number.";
        $code = "2";
    } elseif (strlen($mno) < 10) {
        $error = "error : Number should be ten digits.";
        $code = "2";
    } //check if email field is empty
    elseif ($email == "") {
        $error = "error : You did not enter a email.";
        $code = "3";
    } //check for valid email
    elseif (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i",
        $email)
    ) {
        $error = 'error : You did not enter a valid email.';
        $code = "3";
    } else {
        require('dbconfig.php');
        $sql = "INSERT INTO `dummy_db`.`reg` (`fname`, `lname`, `uname`, `password`,`email`,
`mobile`) VALUES ('$fname', '$lname', '$uname', '$p','$email', '$mno')";
        if (mysql_query($sql))
            echo "Inserted successfully";
        mysql_close($con);
    }
}
?>
<html>
<body>
Registration
<?php if (isset($error)) {
    echo "<p class='message'>" . $error . "</p>";
} ?>
<form name="info" id="info" method="post" action="">
    FirstName:<input name="fname" type="text" value="<?php if (isset($fname)) echo $fname; ?>"
        <?php if (isset($code) && $code == 1) echo "class=error"; ?>>
    LastName:<input name="lname" type="text" value="<?php if (isset($lname)) echo $lname; ?>"
        <?php if (isset($code) && $code == 1) echo "class=error";  ?>>
    UserName:<input name="uname" type="text" value="<?php if (isset($uname)) echo $uname; ?>"
        <?php if (isset($code) && $code == 1) echo "class=error"; ?>>
    Password:<input name="pwd" type="password" value="<?php if (isset($p)) echo $p; ?>"
        <?php if (isset($code) && $code == 1) echo "class=error"; ?>>
    Email:<input name="email" type="text" id="email" value="<?php if (isset($email)) echo $email; ?>"
        <?php if (isset($code) && $code == 3) echo "class=error"; ?>>
    MobileNumber:<input name="mobile" type="text" id="number" value="<?php if (isset($mno)) echo $mno; ?>"
        <?php if (isset($code) && $code == 2) echo "class=error"; ?>>
    <input type="submit" name="Submit" value="Submit"/>
    <a href="login.php">Click here to login</a>
</form>
</body>

</html>