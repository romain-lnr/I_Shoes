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
<div id="content">
    <div class="row">
        <div class="col-sm-3">
            <div class="case">
                <div id="image_article_case"><img src="<?=$_SESSION['img_article'][$_SESSION['request_article']]?>" id="image_article"></div>
                <hr>
                <div class="body_case">
                    <div id="nom_article"><?="<em>".$_SESSION['nom_article'][$_SESSION['request_article']]."</em>"?></div>
                    <div id="mark_article"><?="<em>".$_SESSION['mark_article'][$_SESSION['request_article']]."</em>"?></div>
                    <div id="price_article"><?="<em>".$_SESSION['price_article'][$_SESSION['request_article']]." CHF"."</em>"?></div>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <p><div id="desc_article"><?=$_SESSION['desc_article'][$_SESSION['request_article']]?></div></p>
        </div>
    </div>
</div>
</body>
</html>