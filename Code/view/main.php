<?php
	session_start();
	/* if (!isset($_SESSION['logged']) ||  !$_SESSION['logged']){
		 header("Location: login.php");
	} */
?>

<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8">
       <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    </head>
    <body>
	<div class="topnav">
        <?php
        if (!isset($_SESSION['logged']) ||  !$_SESSION['logged']) { ?>
            <a href="login.php">login</a>
        <?php } else { ?>
            <a href="../model/logout.php">logout</a>
            <a href="#about"><?php echo $_SESSION['id_user']?></a>
        <?php } ?>

	</div>
    </body>
</html>
