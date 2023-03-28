<?php
function Default_page() {
    require "views/main.php";
}
function Home_page() {
    require "models/model.php";
    DisplayArticles('home');
}
function Purchase() {
    require "models/model.php";
    DisplayPurchase();
}
function Admin_page() {
    require "models/model.php";
    DisplayArticles('admin');
}
function Historic() {
    require "models/model.php";
    HistoricModel();
}
function AddPurchase() {
    require "models/model.php";
    AddPurchaseToJSON();
}
function Login() {
    require "views/login.php";
}
function Register() {
    require "views/new_user.php";
}
function Check_login() {
    require "models/model.php";
        if(isset($_POST['insert'])) {

        // Retrieves values
        $id_user = $_POST['id_user'];
        $password = $_POST['password'];
        }
    Test_login($id_user, $password);
}
function Account() {
    require "models/model.php";

    if(isset($_POST['insert'])) {

        // Retrieves values
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

        // Retrieves values
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
                header("Location:index.php?error=ext_article");
                return;
        }
        $imagepath=$folderPath.$fileNewName.".".$ext;
        $fileName = $fileNewName.".".$ext;
        move_uploaded_file($file, './media/img/articles/'. $fileName);
    }
    Add_article($id_article, $mark, $desc, $price, $stock_number, $imagepath);
    header("Location:index.php?action=admin");
}
function Create_article() {
    require "views/TDC_admin.php";
}
function Update_articles() {
    if(isset($_POST['insert'])) {
        require "models/model.php";
        DisplayArticles('update_articles');
    }
}
function Show($id) {
    require "models/model.php";
    Show_article($id);
}
function Basket() {
    require "models/model.php";
    DisplayBasket();
}
function Add($id, $value) {
    if (isset($_SESSION['id_user']) && $_SESSION['id_user']) {
        $id_user = $_SESSION['id_user'];
    }
    else {
        header("Location:index.php?error=not_login");
        return;
    }
    require "models/model.php";
    AddBasket($id_user, $id, $value);
}
function Remove_basket($id) {
    require "models/model.php";
    RemoveArrayInJSON($id, 'data/dataBasket.json');
    header("Location:index.php?action=home");
}
function Remove_article($id) {
    require "models/model.php";
    RemoveArrayInJSON($id, 'data/dataArticles.json');
    RemoveImgInJSON($id);
    header("Location:index.php?action=admin");
}
function Flag() {
    require "models/model.php";
    FlagPurchase();
    header("Location:index.php?action=home");
}
function Logout() {
    $_SESSION['logged'] = false;
    header("Location:index.php");
}

