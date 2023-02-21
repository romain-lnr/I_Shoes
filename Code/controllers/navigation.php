<?php

function home_page() {
    $_GET['action'] = "home";
    header("Location:views/main.php");
}
function login() {
    header("Location:views/login.php");
}
function check_login() {
    require "models/model.php";
        if(isset($_POST['insert'])) {
        // récupérer les valeurs
        $id_user = $_POST['id_user'];
        $password = $_POST['password'];
        }
    test_login($id_user, $password);
}
function account() {
    require "models/model.php";

    if(isset($_POST['insert'])) {
        // récupérer les valeurs
        $id_user = $_POST['id_user'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    }
    insert_user($id_user, $prenom, $nom, $email, $password);
}
function logout() {
    require "models/model.php";
    login_out();
}
function basket() {
    header("Location:views/basket.php");
}

