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
            <?php
            for ($i = 0; $i < $nb_article; $i++) { ?>
                <div class="col-sm-3">
                    <div class="case" onclick="UseArticle(<?=strval($i)?>)">
                        <div id="image_article_case"><img src="<?=$img_article[$i]?>" id="image_article"></div>
                        <hr>
                        <div class="body_case">
                            <div id="nom_article"><?="<em>".$name_article[$i]."</em>"?></div>
                            <div id="mark_article"><?="<em>".$mark_article[$i]."</em>"?></div>
                            <div id="price_article"><?="<em>".$price_article[$i]." CHF"."</em>"?></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<script>
    function UseArticle(id) {
     window.location="index.php?receive_gabarit=" + id;
    }
</script>
</body>
</html>