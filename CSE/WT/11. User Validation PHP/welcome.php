<?php session_start(); ?>
<html>
<body>
User Dashboard
<?php
    if ($_SESSION["uname"] && $_SESSION["pass"]){
?>
Welcome
<?php echo $_SESSION["c"] . $_SESSION["d"]; ?>. Click here to <a href="logout.php" tite="Logout">Logout.
    <?php } ?>

</body>
</html>