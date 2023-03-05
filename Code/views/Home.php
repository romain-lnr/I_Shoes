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
    </head>
    <body>
    <?php
    if (!isset($_SESSION['logged']) ||  !$_SESSION['logged']) { ?>
	<div class="topnav">
            <a href="login.php"><img src="../media/img/login.png" height="25"><br>login</a>
            <a href="../index.php?action=login"><img src="../media/img/basket.png" height="25"><br>Basket</a>
            <img src="../media/img/logo.png" id=logo height="65">
            <form action="/Code/index.php?action=logged" method="POST">
                <input type="search" placeholder="search" id="search" name="search" required>
                <input type="submit" value="search">
            </form>
            <?php // A mettre sur la searchbar sur la page home
            require "../models/model.php";
            DisplayArticles();?>
    </div>
        <div id="content">
            <div class="row">
                <?php for ($i = 0; $i < $_SESSION['nb_articles']; $i++) { ?>
                <div class="col-sm-6">
                    <div class="case">
                        <div id="image_article"><img src="<?=$_SESSION['img_article'][$i]?>" height="80" width="250"></div>
                        <hr>
                        <div id="nom_article"><?=$_SESSION['nom_article'][$i]?></div>
                        <div id="mark_article"><?=$_SESSION['mark_article'][$i]?></div>
                        <div id="desc_article"><?=$_SESSION['desc_article'][$i]?></div>
                        <div id="price_article"><?=$_SESSION['price_article'][$i]?></div>
                    </div>
                </div>
                        <?php } ?>
            </div>
        </div>
        <?php } else { ?>
    <div class="topnav">
        <a href="../index.php?action=logout">logout</a>
        <a href="#about" style="height: 10px"><?php echo $_SESSION['id_user']?></a>
        <a href="../index.php?action=login"><img src="../media/img/basket.png" height="25"><br>Basket</a>
        <img src="../media/img/logo.png" height="65">
        <form action="/Code/index.php?action=logged" method="POST">
            <input type="search" placeholder="search" id="search" name="search" required>
            <input type="submit" value="search">
        </form>
    </div>
        <?php
        require "../models/model.php";
        DisplayArticles(); ?>
    <div id="content">
        <div class="row">
            <?php for ($i = 0; $i < $_SESSION['nb_articles']; $i++) { ?>
                <div class="col-sm-6">
                    <div class="case">
                        <div id="image_article"><img src="<?=$_SESSION['img_article'][$i]?>" height="80" width="250"></div>
                        <hr>
                        <div id="nom_article"><?=$_SESSION['nom_article'][$i]?></div>
                        <div id="mark_article"><?=$_SESSION['mark_article'][$i]?></div>
                        <div id="desc_article"><?=$_SESSION['desc_article'][$i]?></div>
                        <div id="price_article"><?=$_SESSION['price_article'][$i]?></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
   <?php } ?>
    </body>
</html>
