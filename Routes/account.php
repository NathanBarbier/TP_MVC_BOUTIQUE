<?php

if (empty($_SESSION['id'])) {
    header("Location:?page=index&action=logIn");
}

require_once "Templates/navbar.php";

if(isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'show':
            $ctrl = new AccountShowController();
            echo $ctrl;
            break;

        case 'updateEmail':
            $ctrl = new AccountUpdateEmailController();
            echo $ctrl;
            break;

        case 'updatePassword':
            $ctrl = new AccountUpdatePasswordController();
            echo $ctrl;
            break;

        default:
            return;
    }
}