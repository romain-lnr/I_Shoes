<?php
	session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../media/stylesheet/style.css" media="screen" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
    <?php
    if (!isset($_SESSION['logged']) ||  !$_SESSION['logged']) { ?>
	<div class="topnav">
            <a href="login.php"><img src="../media/img/login.png" height="25"><br>login</a>
            <a href="../index.php?action=login"><img src="../media/img/basket.png" height="25"><br>Basket</a>
            <img src="../media/img/logo.png" height="65">
            <input type="search" placeholder="search" id="search" name="search" required>
            <input type="submit" value="search">
    </div>
    <div id="content">
        <div class="row">
            <div class="col-sm-3">
                <div class="case">
                    Ici un article
                    a
                    a
                    a
                    a
                </div>
            </div>
            <div class="col-sm-3">
                <div class="case">
                    Ici un article
                    a
                    a
                    a
                    a
                </div>
            </div>
            <div class="col-sm-3">
                <div class="case">
                    Ici un article
                    a
                    a
                    a
                    a
                </div>
            </div>
            <div class="col-sm-3">
                <div class="case">
                    Ici un article
                    a
                    a
                    a
                    a
                </div>
            </div>
        </div>
    </div>
        <?php } else {
            ?>
    <div class="topnav">
        <a href="../index.php?action=logout">logout</a>
        <a href="#about" style="height: 10px"><?php echo $_SESSION['id_user']?></a>
        <a href="../index.php?action=login"><img src="../media/img/basket.png" height="25"><br>Basket</a>
        <img src="../media/img/logo.png" height="65">
        <input type="search" placeholder="search" id="search" name="search" required>
        <input type="submit" value="search">
    </div>
        <div id="content">
            <div class="row">
                <div class="col-sm-3">
                    <div class="case">
                        Ici un article
                        a
                        a
                        a
                        a
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="case">
                        Ici un article
                        a
                        a
                        a
                        a
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="case">
                        Ici un article
                        a
                        a
                        a
                        a
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="case">
                        Ici un article
                        a
                        a
                        a
                        a
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </body>
</html>
