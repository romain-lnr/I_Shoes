<?php
	session_start();
?>

<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8">
       <link rel="stylesheet" href="../media/css/style.css" media="screen" type="text/css" />
    </head>
    <body>
	<div class="topnav">
        <?php
        if (!isset($_SESSION['logged']) ||  !$_SESSION['logged']) { ?>
            <a href="login.php">login</a>
        <?php } else {
            if (isset($_GET['admin']) || $_SESSION['adminLogged']){
                echo "Admin OK";
              } else
            ?>
            <a href="../models/logout.php">logout</a>
            <a href="#about"><?php echo $_SESSION['id_user']?></a>
        <?php } ?>

	</div>
    </body>
</html>
