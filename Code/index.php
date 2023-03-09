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
        case 'admin_request' :
            Admin_page();
            break;
        case 'logout' :
            Logout();
            break;
        case 'insert_user' :
            Account();
            break;
        case 'basket' :
            Basket();
            break;
        case 'article' :
            New_Article();
            break;
        case 'update_articles' :
            Update_articles();
            break;
        default :
            // Faire une page lost() !
            Default_page();
    }
}
else {
    if ((isset($_SESSION['logged'])) && $_SESSION['logged']) Home_page();
    else Default_page();
}
if (isset($_GET['receive'])) {
    $receive = $_GET['receive'];
    $_SESSION['request_article'] = $receive;
    Show();
}

?>