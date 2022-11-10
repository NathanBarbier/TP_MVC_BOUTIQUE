<?php

if(isset($_GET['action'])){
    switch ($_GET['action']) {
        case 'logIn':
            $ctrl = new LogInController();
            echo $ctrl;

        case 'signUp':
            $ctrl = new SignUpController();
            echo $ctrl;

        default:
            return;
    }
}
