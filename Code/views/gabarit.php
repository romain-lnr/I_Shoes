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
        <?php for ($i = 0; $i < $_SESSION['nb_articles']; $i++) { ?>
            <div class="col-sm-3">
                <div class="case">
                    <div id="image_article_case"><img src="<?=$_SESSION['img_article'][$i]?>" id="image_article"></div>
                    <hr>
                    <div class="body_case">
                        <div id="nom_article"><?="<h2>".$_SESSION['nom_article'][$i]."</h2>"?></div>
                        <div id="mark_article"><?="<h4>".$_SESSION['mark_article'][$i]."</h4>"?></div>
                        <div id="desc_article"><?=$_SESSION['desc_article'][$i]?></div>
                        <div id="price_article"><?=$_SESSION['price_article'][$i]." CHF"?></div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<script src="../media/scripts/slider.js">
</script>
</body>
</html>