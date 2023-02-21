<?php
session_start();
require "controllers/navigation.php";

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'login' :
            login();
            break;
        case 'logged' :
            check_login();
            break;
        case 'logout' :
            logout();
            break;
        case 'basket' :
            basket();
            break;
        case 'insert_user' :
            account();
            break;
        default :
            home_page();
    }
}
else {
    home_page();
}
?>