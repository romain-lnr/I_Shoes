<?php

function Home_page() {
    require "models/model.php";
    DisplayArticles();
    require("views/home.php");
}
function Admin_page() {
    require("views/admin.php");
}
function Default_page() {
    require("views/main.php");
}
function Login() {
    require("views/login.php");
}
function Register() {
    require("views/new_user.php");
}
function Check_login() {
    require "models/model.php";
    DisplayArticles();
        if(isset($_POST['insert'])) {
        // récupérer les valeurs
        $id_user = $_POST['id_user'];
        $password = $_POST['password'];
        }
    Test_login($id_user, $password);
}
function Account() {
    require "models/model.php";

    if(isset($_POST['insert'])) {
        $id_user = $_POST['id_user'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    }
    Insert_user($id_user, $prenom, $nom, $email, $password);
}
function New_Article() {
    require "models/model.php";

    if(isset($_POST['insert'])) {
        $id_article = $_POST['id_article'];
        $mark = $_POST['mark'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];
        $stock_number = 0;

        if(is_array($_FILES)) {
            $file = $_FILES['img_article']['tmp_name'];
            $sourceProperties = getimagesize($file);
            $fileNewName = $id_article;
            $folderPath = "../media/img/articles/";
            $ext = pathinfo($_FILES['img_article']['name'], PATHINFO_EXTENSION);
            $imageType = $sourceProperties[2];
        }
        switch ($imageType) {
            case IMAGETYPE_PNG:
                // It's OK
                break;
            case IMAGETYPE_GIF:
                // It's OK
                break;
            case IMAGETYPE_JPEG:
                // It's OK
                break;
            default:
                require("views/TDC_admin.php?erreur=2");
                return;
        }
        $imagepath=$folderPath.$fileNewName.".".$ext;
        $fileName = $fileNewName.".".$ext;
        move_uploaded_file($file, './media/img/articles/'. $fileName);
    }
    Add_article($id_article, $mark, $desc, $price, $stock_number, $imagepath);
}
function Update_articles() {
    require "models/model.php";

    if(isset($_POST['insert'])) {
        for ($i = 0; $i < $_SESSION['nb_articles']; $i++) {
            $stock[$i] = $_POST["stock_number_".strval($i)];
            $_SESSION['stock_number'][$i] = $stock[$i];
            Add_article($_SESSION['nom_article'][$i], $_SESSION['mark_article'][$i], $_SESSION['desc_article'][$i], $_SESSION['price_article'][$i], $_SESSION['stock_number'][$i], $_SESSION['img_article'][$i]);
        }
    }
}
function Show() {
    require("views/show_article.php");
}
function Logout() {
    $_SESSION['logged'] = false;
    require("index.php");
}
function Basket() {
    require("views/basket.php");
}

