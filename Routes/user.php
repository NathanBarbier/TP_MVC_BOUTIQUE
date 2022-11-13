<?php

if (empty($_SESSION['id'])) {
    header("Location:?page=index&action=logIn");
}

require_once "Templates/navbar.php";

if(isset($_GET['action'])){
    switch ($_GET['action']) {
        case 'list':
            $ctrl = new UserListController();
            echo $ctrl;
            break;

        case 'create':
            $ctrl = new UserCreateController();
            echo $ctrl;
            break;

        case 'update':
            $ctrl = new UserUpdateController();
            echo $ctrl;
            break;

        case 'delete':
            $ctrl = new UserDeleteController();
            echo $ctrl;
            break;

        case 'notAllowed':
            $ctrl = new UserNotAllowedController();
            echo $ctrl;
            break;

        default:
            return;
    }
}
