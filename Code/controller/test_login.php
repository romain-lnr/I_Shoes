<?php
session_start();
// Pense-bête pour demain : faire pointer les erreurs avec les sessions
// $err
require "../model/receiveLogin.php";
//Load the file
$JSONfile = '../data/data.json';
$data = file_get_contents($JSONfile);
// décoder le flux JSON
$obj = json_decode($data);
// accéder à l'élément approprié
for ($i = 0; $i < count($obj); $i++) {
    if ($obj[$i]->username == $id_user) {
        if ($obj[$i]->password == $password) {
            $_SESSION['id_user'] = $obj[$i]->username;
            $_SESSION['logged'] = true;
            header("Location:../view/main.php");
            return;
        } else header("Location:../view/login.php?erreur=2");
    } else header("Location:../view/login.php?erreur=1");
}

?>
