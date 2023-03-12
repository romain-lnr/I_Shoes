<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../media/stylesheet/style.css" media="screen" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body id="snow">
<div id="content">
    <div class="row">
        <div class="col-sm-3">
            <div class="case">
                <div id="image_article_case"><img src="<?=$img_article?>" id="image_article"></div>
                <hr>
                <div class="body_case">
                    <div id="nom_article"><?="<em>".$name_article."</em>"?></div>
                    <div id="mark_article"><?="<em>".$mark_article."</em>"?></div>
                    <div id="price_article"><?="<em>".$price_article." CHF"."</em>"?></div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="case case_desc">
                <div><p><?=$desc_article?></p></div>
                <div id="container">
                    <input type="submit" name="insert" id="insert" value="Ajouter au panier" onclick="UseID(<?=$id?>)">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function UseID(id) {
        window.location="index.php?receive_Show_article=" + id;
    }
</script>
</body>
</html>