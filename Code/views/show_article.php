<?php
/**
 * Created by Romain Lenoir.
 * Date: 12.03.2023
 * Desc: show_article page for displays the user request article.
 */

// tampon de flux stocké en mémoire
$title="IShoes - show_article page";
ob_start();
?>
    <?php if (!isset($_SESSION['logged']) ||  !$_SESSION['logged']) {
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
        <a href="#user" style="height: 10px"><?php echo $_SESSION['id_user']?></a>
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
        <form action="index.php?receive_show_article=<?=strval($id)?>" method="POST">
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
                    <p><?=$desc_article?></p>
                    <div id="container">
                        <input type="submit" class="form-control" name="insert" id="insert" value="Ajouter au panier">
                        <input type="number" name="value" class="form-control" placeholder="value">
                    </div>
                </div>
            </div>
        </div>
      </form>
    </div>
    <?php $content = ob_get_clean();
    ob_start(); ?>
    <br>
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
