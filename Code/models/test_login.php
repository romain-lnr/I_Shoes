<?php
session_start();
require "../controllers/receive_login.php";
// Load the file
$JSONfile = '../data/data.json';
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
                header("Location:../views/main.php?admin");
            } else {
                $_SESSION['adminLogged'] = false;
                header("Location:../views/main.php");
            }
            return;
        } else header("Location:../views/login.php?erreur=2");
    } else header("Location:../views/login.php?erreur=1");
}
?>
