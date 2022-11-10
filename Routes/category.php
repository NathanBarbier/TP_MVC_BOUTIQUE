<?php

require_once "Templates/navbar.php";

if(isset($_GET['action'])){
    switch ($_GET['action']) {
        case 'list':
            $ctrl = new CategoryListController();
            echo $ctrl;

        default:
            return;
    }
}
