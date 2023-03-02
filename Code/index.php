<?php
session_start();
require "controllers/navigation.php";

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'login' :
            Login();
            break;
        case 'logged' :
            Check_login();
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
        default :
            Home_page();
    }
}
else {
    Home_page();
}
?>