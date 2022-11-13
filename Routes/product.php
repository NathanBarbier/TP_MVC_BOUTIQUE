<?php

require_once "Templates/navbar.php";

if(isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'list':
            $ctrl = new ProductListController();
            echo $ctrl;
            break;

        case 'create':
            $ctrl = new ProductCreateController();
            echo $ctrl;
            break;

        case 'update':
            $ctrl = new ProductUpdateController();
            echo $ctrl;
            break;

        case 'delete':
            $ctrl = new ProductDeleteController();
            echo $ctrl;
            break;
        default:
            return;
    }
}
