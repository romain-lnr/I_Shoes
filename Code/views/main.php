<?php
	session_start();
?>

<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8">
       <link rel="stylesheet" href="../media/stylesheet/style.css" media="screen" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
	<div class="topnav">
        <?php
        if (!isset($_SESSION['logged']) ||  !$_SESSION['logged']) { ?>
            <a href="login.php"><img src="../media/img/login.png" height="25"><br>login</a>
            <a href="../index.php?action=login"><img src="../media/img/basket.png" height="25"><br>Basket</a>
            <img src="../media/img/logo.png" height="65">
            <input type="search" placeholder="search" id="search" name="search" required>
            <input type="submit" value="search">
        <?php } else {
            if (isset($_GET['admin']) || $_SESSION['adminLogged']){
                echo "Admin OK";
              } else
            ?>
            <a href="../index.php?action=logout">logout</a>
            <a href="#about" style="height: 10px"><?php echo $_SESSION['id_user']?></a>
            <a href="../index.php?action=basket"><img src="../media/img/basket.png" height="25"><br>Basket</a>
            <img src="../media/img/logo.png" height="70">
            <input type="search" placeholder="search" id="search" name="search" required>
            <input type="submit" value="search">
        <?php } ?>

	</div>
    </body>
</html>
