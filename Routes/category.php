<?php

if (empty($_SESSION['id'])) {
    header("Location:?page=index&action=logIn");
}

require_once "Templates/navbar.php";

if(isset($_GET['action'])){
    switch ($_GET['action']) {
        case 'list':
            $ctrl = new CategoryListController();
            echo $ctrl;
            break;

        case 'create':
            $ctrl = new CategoryCreateController();
            echo $ctrl;
            break;

        case 'update':
            $ctrl = new CategoryUpdateController();
            echo $ctrl;
            break;

        case 'delete':
            $ctrl = new CategoryDeleteController();
            echo $ctrl;
            break;

        default:
            return;
    }
}
