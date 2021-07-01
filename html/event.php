<?php
session_start();
if(isset($_SESSION['User']))
	{ ?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title>Welcome</title>
		<h1> Welcome </h1>
	</head>
	<body>
		<a href="../php/logout.php?logout">Logout</a>
		<a href="eventRegistration.php?eventid=123">Register</a>
	</body>
	</html>
	<?php }
else
{
	header("location:../html/index.html");
}
?>
