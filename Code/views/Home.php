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
        <img src="../media/img/logo.png" height="65">
        <input type="search" placeholder="search" id="search" name="search" required>
        <input type="submit" value="search">
    </div>
    <br>
    <?php require "gabarit.php";
            } else { ?>
    <div class="topnav">
        <a href="../index.php?action=logout">logout</a>
        <a href="#about" style="height: 10px"><?php echo $_SESSION['id_user']?></a>
        <a href="../index.php?action=login"><img src="../media/img/basket.png" height="25"><br>Basket</a>
        <img src="../media/img/logo.png" height="65">
        <input type="search" placeholder="search" id="search" name="search" required>
        <input type="submit" value="search">
    </div>
        <br>
        <?php require "gabarit.php";
         } ?>
    <br><br>
    <footer>
        <div id="contrainer">
            <div class="row">
                <div class="col-sm-4">
                    <div id="footer_proj">
                        <h3>Notre projet</h3>
                        <p>Notre projet se base sur un site e-commerce de vente de chaussures. L'équipe est composé d'un web master, d'un responsable développeur et d'un garçon faisant des dessins.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div id="footer_desc">
                        <h3>Descriptif du projet</h3>
                        <p>Ce projet est, comme dit, un avant-goût d'un site e-commerce où le concept est la vente de chaussures. Vous trouverez ici nos articles les plus fameux ainsi que les derniers ajouts de nos services.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div id="footer_contact">
                        <h3>Contact du service</h3>
                        <h6>Téléphone :</h6>
                        <p>+41 67 827 65 24</p>
                        <h6>Email :</h6>
                        <p><a href="#">i_shoes.contact@gmail.com</a></p>
                        <h6>Adresse :</h6>
                        <p>14 Rue de la Réunion<br>1450 Ste-Croix, Vaud Suisse</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </body>
</html>
