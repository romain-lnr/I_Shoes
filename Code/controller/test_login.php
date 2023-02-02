<?php
session_start();
require "../model/receiveLogin.php";
//Load the file
$JSONfile = '../data/data.json';
$data = file_get_contents($JSONfile);
// décoder le flux JSON
$obj = json_decode($data);
// accéder à l'élément approprié
if ($obj == NULL) {
    for ($i = 0; $i < count($obj); $i++) {
        if ($obj[$i]->username == $id_user) {
            if (password_verify($password, $obj[$i]->password)) {
                $_SESSION['id_user'] = $obj[$i]->username;
                $_SESSION['logged'] = true;
                if ($id_user == "admin" && $password == "admin") {
                    header("Location:../view/main.php?admin");
                } else header("Location:../view/main.php");
                return;
            } else header("Location:../view/login.php?erreur=2");
        } else header("Location:../view/login.php?erreur=1");
    }
} else header("Location:../view/login.php?erreur=3");

?>
