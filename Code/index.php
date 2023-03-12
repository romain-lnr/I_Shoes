<?php
session_start();
require "controllers/navigation.php";

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'home' :
            Home_page();
            break;
        case 'login' :
            Login();
            break;
        case 'register' :
            Register();
            break;
        case 'logged' :
            Check_login();
            break;
        case 'admin' :
            Admin_page();
            break;
        case 'TDC' :
            Create_article();
            break;
        case 'logout' :
            Logout();
            break;
        case 'insert_user' :
            Account();
            break;
        case 'create_article' :
            New_Article();
            break;
        case 'update_articles' :
            Update_articles();
            break;
        case 'basket' :
            Basket();
            break;
        default :
            // Faire une page lost() !
            Default_page();
    }
}
else {
    if (isset($_GET['error'])) {
        $error = $_GET['error'];

        switch ($error) {
            case 'ext_article':
                require "views/TDC_admin.php";
                break;
            case 'not_login':
                require "views/login.php";
                break;
            case 'user_not_correct':
                require "views/login.php";
                break;
            case 'password_not_correct':
                require "views/login.php";
                break;
            case 'user_not_unique':
                require "views/new_user.php";
                break;
        }
    }
    else if (isset($_GET['receive_home'])) {
        $id = $_GET['receive_home'];
        Show($id);
    }
    else if (isset($_GET['receive_Show_article'])) {
        $id = $_GET['receive_Show_article'];
        Add($id);
    } else {
        if ((isset($_SESSION['logged'])) && $_SESSION['logged']) Home_page();
        else Default_page();
    }
}
?>