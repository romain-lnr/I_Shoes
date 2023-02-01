<?php
	session_start();
	if (!isset($_SESSION['logged']) ||  !$_SESSION['logged']){
		 header("Location: login.php");
	}
?>

<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8">
       <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    </head>
    <body>
	<div class="topnav">
		<a href="login.php">logout</a>
		<a href="#about"><?php echo $_SESSION['id_user']?></a>
	</div>
    </body>
</html>
