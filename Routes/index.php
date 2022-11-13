<?php

if(isset($_GET['action'])){
    switch ($_GET['action']) {
        case 'logIn':
            $ctrl = new LogInController();
            echo $ctrl;
            break;

        case 'signUp':
            $ctrl = new SignUpController();
            echo $ctrl;
            break;

        case 'disconnect':
            $ctrl = new DisconnectController();
            echo $ctrl;
            break;

        default:
            return;
    }
}
