<?php
session_start();
if(empty($_POST["name"]))
{
	header("location: index.php");
	exit;
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcom</title>
</head>
<body align="center">
<h1>Hi <?php echo htmlspecialchars($_SERVER["name"]) ?></h1>
<h2><a href="Signout.php" > Sign Out</a></h2>
</body>
</html>