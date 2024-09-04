<?php
session_start();
?>
<html>
<head>
<title>User Login</title>
</head>
<body>

<?php
if($_SESSION["name"])
 {
?>
Welcome <?php echo $_SESSION["name"]; ?>. 

<a href="next.php">Click Me</a>
<?php
}else echo "<h1>Please <a href='login.php'>login</a> first .</h1>";
?>
</body>
</html>