<?php
function Test_login($id_user, $password) {

    // Load the file
    $JSONfile = 'data/dataUsers.json';
    $data = file_get_contents($JSONfile);

    // décoder le flux JSON
    $obj = json_decode($data);

    // accéder à l'élément approprié
    for ($i = 0; $i < count($obj); $i++) {
        if ($obj[$i]->username == $id_user) {
            if (password_verify($password, $obj[$i]->password)) {
                $_SESSION['id_user'] = $obj[$i]->username;
                $_SESSION['logged'] = true;
                if ($id_user == "admin" && $password == "admin") {
                    $_SESSION['admin_logged'] = true;
                    header("Location:index.php?action=admin");
                } else {
                    $_SESSION['admin_logged'] = false;
                    header("Location:index.php?action=home");
                }
                return;
            } else header("Location:views/login.php?erreur=2");
        } else header("Location:views/login.php?erreur=1");
    }
}
function Insert_user($id_user, $prenom, $nom, $email, $password) {

    // Load the file
    $JSONfile = 'data/dataUsers.json';
    $contents = file_get_contents($JSONfile);

    // HASH Password
    $passhash = password_hash($password, PASSWORD_DEFAULT);

    // Decode the JSON data into a PHP array.
    $json = json_decode($contents, true);
    $user = array_search($id_user, array_column( $json, 'username' ) );
    if ($user !== False) {
        header("Location:views/new_user.php?erreur=1");
        return;
    }
    else {
        $json[] = array("username" => $id_user, "firstname" => $prenom, "name" => $nom, "Email" => $email, "password" => $passhash);
        header("Location:index.php?action=login");
    }

    // Encode the array back into a JSON string.
    $json = json_encode($json);

    // Save the file.
    file_put_contents('data/dataUsers.json', $json);
}
function Add_article($id_article, $mark, $desc, $price, $stock_number, $imagepath) {

    // Load the file
    $JSONfile = 'data/dataArticles.json';
    $contents = file_get_contents($JSONfile);

    // Decode the JSON data into a PHP array.
    $json = json_decode($contents, true);
    $article = array_search($id_article, array_column( $json, 'article' ) );
    if ($article !== False) {
        $json[$article] = array("article" => $id_article, "mark" => $mark, "description" => $desc, "price" => $price, "stock" => $stock_number, "image" => $imagepath);
    }
    else {
        $json[] = array("article" => $id_article, "mark" => $mark, "description" => $desc, "price" => $price, "stock" => $stock_number, "image" => $imagepath);
    }

    // Encode the array back into a JSON string.
    $json = json_encode($json);

    // Save the file.
    file_put_contents('data/dataArticles.json', $json);
}
function DisplayArticles() {

    // Load the file
    $JSONfile = 'data/dataArticles.json';
    $data = file_get_contents($JSONfile);

    // décoder le flux JSON
    $obj = json_decode($data);
    $nb_article = count($obj);

    // accéder à l'élément approprié
     for ($i = 0; $i < $nb_article; $i++) {
        $img_article[$i] = $obj[$i]->image;
        $name_article[$i] = $obj[$i]->article;
        $mark_article[$i] = $obj[$i]->mark;
        $desc_article[$i] = $obj[$i]->description;
        $price_article[$i] = $obj[$i]->price;
        $stock_article[$i] = $obj[$i]->stock;
    }
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        switch ($action) {
            case 'home':
                require "views/home.php";
                break;
            case 'admin':
                require "views/admin.php";
                break;
            case 'create_article':
                require "views/admin.php";
                break;
            case 'update_articles':
                for ($i = 0; $i < $nb_article; $i++) {
                    $stock[$i] = $_POST["stock_number_".strval($i)];
                    Add_article($name_article[$i], $mark_article[$i], $desc_article[$i], $price_article[$i], $stock[$i], $img_article[$i]);
                }
                header("Location:index.php?action=admin");
                break;
        }
    }
}
function Show_article($id) {

    // Load the file
    $JSONfile = 'data/dataArticles.json';
    $data = file_get_contents($JSONfile);

    // décoder le flux JSON
    $obj = json_decode($data);

    // accéder à l'élément approprié
    $img_article = $obj[$id]->image;
    $name_article = $obj[$id]->article;
    $mark_article = $obj[$id]->mark;
    $desc_article = $obj[$id]->description;
    $price_article = $obj[$id]->price;
    $stock_article = $obj[$id]->stock;

    require "views/show_article.php";
}
function AddBasket($id_user, $id) {
    // Load the file
    $JSONfile = 'data/dataBasket.json';
    $contents = file_get_contents($JSONfile);

    // Decode the JSON data into a PHP array.
    $json = json_decode($contents, true);

    // Write in JSON
    $json[] = array("username" => $id_user, "id_article" => $id);

    // Encode the array back into a JSON string.
    $json = json_encode($json);

    // Save the file.
    file_put_contents('data/dataBasket.json', $json);

}