<?php

function Home_page() {
    $_GET['action'] = "home";
    header("Location:views/main.php");
}
function Login() {
    header("Location:views/login.php");
}
function Check_login() {
    require "models/model.php";
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

        if(is_array($_FILES)) {
            $file = $_FILES['img_article']['tmp_name'];
            $sourceProperties = getimagesize($file);
            $fileNewName = $id_article;
            $folderPath = "../media/img/";
            $ext = pathinfo($_FILES['img_article']['name'], PATHINFO_EXTENSION);
            $imageType = $sourceProperties[2];

            switch ($imageType) {

                case IMAGETYPE_PNG:
                    $imageResourceId = imagecreatefrompng($file);
//                $size = min($sourceProperties[0],$sourceProperties[1]);
//                $imageResourceId = imagecrop($imageResourceId, ['x' => (int) ($sourceProperties[0]-$size)/2, 'y' => (int) ($sourceProperties[1]-$size)/2, 'width' => $s>
//                $targetLayer = imageResize($imageResourceId,$size,$size);
                    $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                    imagepng($targetLayer,$folderPath.$fileNewName.".".$ext);
                    break;

                case IMAGETYPE_GIF:
                    $imageResourceId = imagecreatefromgif($file);
//                $size = min($sourceProperties[0],$sourceProperties[1]);
//                $imageResourceId = imagecrop($imageResourceId, ['x' => (int) ($sourceProperties[0]-$size)/2, 'y' => (int) ($sourceProperties[1]-$size)/2, 'width' => $s>
//                $targetLayer = imageResize($imageResourceId,$size,$size);
                    $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                    imagegif($targetLayer,$folderPath.$fileNewName.".".$ext);
                    break;

                case IMAGETYPE_JPEG:
                    $imageResourceId = imagecreatefromjpeg($file);
//		$size = min($sourceProperties[0],$sourceProperties[1]);
//		$imageResourceId = imagecrop($imageResourceId, ['x' => (int) ($sourceProperties[0]-$size)/2, 'y' => (int) ($sourceProperties[1]-$size)/2, 'width' => $size, 'height' => $size]);
//              $targetLayer = imageResize($imageResourceId,$size,$size);
                    $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                    imagejpeg($targetLayer,$folderPath.$fileNewName.".".$ext);
                    break;
                default:
                    echo "Invalid Image type.";
                    exit;
            }
        }
        $imagepath=$folderPath.$fileNewName.".".$ext;
    }
    Add_article($id_article, $mark, $desc, $price, $imagepath);
}
function imageResize($imageResourceId,$width,$height) {
    if ($width>$height) {
        $targetWidth =200;
        $targetHeight =200*$height/$width;
    }
    else {
        $targetWidth = 200*$width/$height;
        $targetHeight = 200;
    }

//        $targetWidth = 200;
//        $targetHeight = 200;


    $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
    imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);
    return $targetLayer;
}
function Logout() {
    require "models/model.php";
    Login_out();
}
function Basket() {
    header("Location:views/basket.php");
}

