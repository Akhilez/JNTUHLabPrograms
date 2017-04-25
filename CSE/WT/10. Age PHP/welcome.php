<?php session_start(); ?>
<html>
<body>

User Dashboard
<?php if ($_SESSION["uname"]) { ?>
welcome,
<?php echo $_SESSION["uname"]; ?> your Authorised to visit the site. Click here to <a href="logout.php" tite="Logout">Logout.
<?php } ?>

</body>
</html>