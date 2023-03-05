<?php
session_start()
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
        <a href="../index.php?action=logout">logout</a>
        <a href="#about" style="height: 10px"><?php echo $_SESSION['id_user']?></a>
        <a href="TDC_admin.php"><img src="../media/img/TDC_admin.png" height="25"><br>TDC</a>
        <img src="../media/img/logo.png" height="65">
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
</body>
</html>