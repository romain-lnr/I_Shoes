<?php
function test_login($id_user, $password) {

    // Load the file
    $JSONfile = 'data/data.json';
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
                    header("Location:views/main.php");
                }
                return;
            } else header("Location:views/login.php?erreur=2");
        } else header("Location:views/login.php?erreur=1");
    }
}

function insert_user($id_user, $prenom, $nom, $email, $password) {
    if(isset($_POST['insert'])){

        // Load the file
        $JSONfile = 'data/data.json';
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
        file_put_contents('data/data.json', $json);
    }
}

function login_out() {
    $_SESSION['logged'] = false;
    header("Location:index.php");
}
