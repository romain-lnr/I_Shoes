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
                    $_SESSION['adminLogged'] = true;
                    header("Location:views/admin.php");
                } else {
                    $_SESSION['adminLogged'] = false;
                    header("Location:views/home.php");
                }
                return;
            } else header("Location:views/login.php?erreur=2");
        } else header("Location:views/login.php?erreur=1");
    }
}
function Insert_user($id_user, $prenom, $nom, $email, $password) {
    if(isset($_POST['insert'])){

        // Load the file
        $JSONfile = 'data/dataUsers.json';
        $contents = file_get_contents($JSONfile);

        // HASH Password
        $passhash = password_hash($password, PASSWORD_DEFAULT);

        // Decode the JSON data into a PHP array.
        $json = json_decode($contents, true);
        $user = array_search($id_user, array_column( $json, 'username' ) );
        if ($user !== False) header("Location:views/new_user.php?erreur=1");
        else {
            $json[] = array("username" => $id_user, "firstname" => $prenom, "name" => $nom, "Email" => $email, "password" => $passhash);
            header("Location:views/login.php");
        }

        // Encode the array back into a JSON string.
        $json = json_encode($json);

        // Save the file.
        file_put_contents('data/dataUsers.json', $json);
    }
}
function Add_article($id_article, $mark, $desc, $price, $imagepath) {
    if(isset($_POST['insert'])){

        // Load the file
        $JSONfile = 'data/dataArticles.json';
        $contents = file_get_contents($JSONfile);

        // Decode the JSON data into a PHP array.
        $json = json_decode($contents, true);
        $article = array_search($id_article, array_column( $json, 'article' ) );
        if ($article !== False) header("Location:views/TDC_admin.php?erreur=1");
        else {
            $json[] = array("article" => $id_article, "mark" => $mark, "description" => $desc, "price" => $price, "image" => $imagepath);
            header("Location:views/admin.php");
        }

        // Encode the array back into a JSON string.
        $json = json_encode($json);

        // Save the file.
        file_put_contents('data/dataArticles.json', $json);
    }
}
function DisplayArticles() {

    // Load the file
    $JSONfile = '../data/dataArticles.json';
    $data = file_get_contents($JSONfile);

    // décoder le flux JSON
    $obj = json_decode($data);
    $_SESSION['nb_articles'] = count($obj);

    // accéder à l'élément approprié
     for ($i = 0; $i < $_SESSION['nb_articles']; $i++) {
        $_SESSION['img_article'][$i] = $obj[$i]->image;
        $_SESSION['nom_article'][$i] = $obj[$i]->article;
        $_SESSION['mark_article'][$i] = $obj[$i]->mark;
        $_SESSION['desc_article'][$i] = $obj[$i]->description;
        $_SESSION['price_article'][$i] = $obj[$i]->price;
    }
}
function Login_out() {
    $_SESSION['logged'] = false;
    header("Location:index.php");
}
