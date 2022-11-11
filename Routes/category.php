<?php

//require_once "Templates/navbar.php";

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

        default:
            return;
    }
}
?>
