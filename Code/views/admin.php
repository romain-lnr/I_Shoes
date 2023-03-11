<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../media/stylesheet/style.css" media="screen" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body id="snow">
    <div class="topnav">
        <a href="index.php?action=logout">logout</a>
        <a href="#about" style="height: 10px"><?php echo $_SESSION['id_user']?></a>
        <a href="index.php?action=TDC"><img src="../media/img/TDC_admin.png" height="50"><br>TDC</a>
        <a href="index.php?action=home"><img src="../media/img/home.png" height="50"><br>Home</a>
        <img src="../media/img/logo.png" height="90">
    </div>
    <br>
    <form action="index.php?action=update_articles" method="POST">
        <div id="content">
            <div class="row">
                <?php for ($i = 0; $i < $nb_article; $i++) { ?>
                    <?php $stock_number[$i] = "stock_number_".strval($i);
                    $button[$i] = "button_".strval($i);
                    $number[$i] = "number_".strval($i);?>
                    <div class="col-sm-3">
                        <div class="case">
                            <div id="image_article_case"><img src="<?=$img_article[$i]?>" id="image_article"></div>
                            <hr>
                            <div class="body_case">
                                <div id="nom_article"><?="<em>".$name_article[$i]."</em>"?></div>
                                <div id="mark_article"><?="<em>".$mark_article[$i]."</em>"?></div>
                                <div id="price_article"><?="<em>".$price_article[$i]." CHF"."</em>"?></div><br><br>
                                <div id="stock"><h3>Stock : </h3><input name="<?=$stock_number[$i]?>" type="number" class="form-control" value="<?=$stock_article[$i]?>" style="background-color: #8F8F8F;" id="<?=$stock_number[$i]?>" readonly></div>
                                <input type="number" class="form-control" id="<?=$number[$i]?>">
                                <div id="submit_case"><input type="button" class="btn btn-info" onclick="document.querySelector('#<?=$stock_number[$i]?>').value = document.querySelector('#<?=$number[$i]?>').value" id=<?=$button[$i]?> value="Submit"></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <br>
        <div id="container">
            <input type="submit" name="insert" id="insert" value="Mettre à jour">
        </div>
    </form>
</body>
</html>