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
        <a href="../index.php?action=home"><img src="../media/img/home.png" height="25"><br>Home</a>
        <img src="../media/img/logo.png" height="65">
    </div>
    <br>
    <form action="../index.php?action=update_articles" method="POST">
        <div id="content">
            <div class="row">
                <?php for ($i = 0; $i < $_SESSION['nb_articles']; $i++) { ?>
                    <?php $stock_number[$i] = "stock_number_".strval($i);
                    $button[$i] = "button_".strval($i);
                    $number[$i] = "number_".strval($i);?>
                <div class="col-sm-3">
                    <div class="case">
                        <div id="image_article_case"><img src="<?=$_SESSION['img_article'][$i]?>" id="image_article"></div>
                        <hr>
                        <div class="body_case">
                            <div id="nom_article"><?="<h2>".$_SESSION['nom_article'][$i]."</h2>"?></div>
                            <div id="mark_article"><?="<h4>".$_SESSION['mark_article'][$i]."</h4>"?></div>
                            <div id="desc_article"><?=$_SESSION['desc_article'][$i]?></div>
                            <div id="price_article"><?=$_SESSION['price_article'][$i]." CHF"?></div>
                            <div id="stock"><h3>Stock : </h3><input name="<?=$stock_number[$i]?>" type="text" value="<?=$_SESSION['stock_number'][$i]?>" style="background-color: #8F8F8F;" id="<?=$stock_number[$i]?>" readonly></div>
                            <div id="submit_case" style="float: left;"><input type="button" onclick="document.querySelector('#<?=$stock_number[$i]?>').value = document.querySelector('#<?=$number[$i]?>').value" id=<?=$button[$i]?> value="Submit"></div>
                            <input style="float: right;" type="number" id="<?=$number[$i]?>">
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