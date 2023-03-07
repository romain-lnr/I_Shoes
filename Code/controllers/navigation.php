<?php

function Home_page() {
    require "models/model.php";
    DisplayArticles();
    header("Location:views/home.php");
}
function Default_page() {
    header("Location:views/main.php");
}
function Login() {
    header("Location:views/login.php");
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
function Logout() {
    require "models/model.php";
    Login_out();
}
function Basket() {
    header("Location:views/basket.php");
}

