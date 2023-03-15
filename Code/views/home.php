<?php
/**
 * Created by Romain Lenoir.
 * Date: 12.03.2023
 * Desc: Home page for see all articles in the JSON file.
 */

$title="IShoes - home page";
?>
<?php
if (!isset($_SESSION['logged']) ||  !$_SESSION['logged']) {
    ob_start(); ?>
    <div class="topnav">
        <a href="index.php?action=login"><img src="../media/img/login.png" height="50"><br>login</a>
        <a href="index.php?action=login"><img src="../media/img/basket.png" height="50"><br>Basket</a>
        <img src="../media/img/logo.png" height="90">
    </div>
    <br>
    <?php $topnav = ob_get_clean();
} else {
    ob_start(); ?>
    <div class="topnav">
        <a href="index.php?action=logout">logout</a>
        <a href="#" style="height: 10px"><?php echo $_SESSION['id_user']?></a>
        <a href="index.php?action=basket"><img src="../media/img/basket.png" height="50"><br>Basket</a>
        <?php if (isset($_SESSION['admin_logged']) && $_SESSION['admin_logged']) { ?>
            <a href="index.php?action=admin"><img src="../media/img/admin.png" height="50"><br>Admin</a>
        <?php } ?>
        <img src="../media/img/logo.png" height="90">
    </div>
    <br>
    <?php $topnav = ob_get_clean();
}   ob_start();?>
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
        <?php if(isset($_GET['error'])) {
            $error = $_GET['error'];
            if ($error == "not_even_stock") echo "<br><p style='color:red'>Pas assez de stock</p>";
        }?>
    </div>
    <script>
        function UseArticle(id) {
            window.location="index.php?receive_home=" + id;
        }
    </script>
    <?php $content = ob_get_clean(); ?>
<br><br>
<?php ob_start(); ?>
<footer>
    <div id="contrainer">
        <div class="row">
            <div class="col-sm-3">
                <div id="footer_proj">
                    <h3>Notre projet</h3>
                    <p>Notre projet se base sur un site e-commerce de vente de chaussures. L'équipe est composé d'un web master, d'un responsable développeur et de quelqu'un servant à la création de maquettes et des élements ments basiques du projet.
                        Le projet a été publié le 6 avril 2023 et a commencé quelques mois auparavant.</p>
                </div>
            </div>
            <div class="col-sm-6">
                <div id="footer_desc">
                    <h3>Descriptif du projet</h3>
                    <p>Ce projet est, comme dit, un avant-goût d'un site e-commerce où le concept est la vente de chaussures. Vous trouverez ici nos articles les plus fameux ainsi que les derniers ajouts de nos services.
                        Comme par exemple le principe de pouvoir se logger en tant qu'utilisateur du site, de pouvoir y regarder ces différents articles et de pouvoir ajouter un article sur votre panier d'achat afin de le payer. Vous pouvez ainsi profiter des dernières actualités en cours.
                        Le projet a également l'éloge d'avoir un compte administrateur afin que vous pouviez quotidiennement avoir de nouveaux stocks sur vos articles préférés
                    </p>
                </div>
            </div>
            <div class="col-sm-3">
                <div id="footer_contact">
                    <h3>Contact du service</h3>
                    <h6>Téléphone :</h6>
                    <p>+41 67 827 65 24</p>
                    <h6>Email :</h6>
                    <p><a href="mailto:i_shoes.contact@gmail.com">i_shoes.contact@gmail.com</a></p>
                    <h6>Adresse :</h6>
                    <p>Rue de la Réunion 14<br>1450 Ste-Croix, Vaud Suisse</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php $footer = ob_get_clean();
require "layout.php";
