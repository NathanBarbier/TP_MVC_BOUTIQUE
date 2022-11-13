<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
    <link rel="stylesheet" href="../style.css">
    <title></title>
</head>
<body>

<?php

session_start();

require_once 'Autoload.php';
Autoload::load(); // Appel automatiquement tous les fichiers nécessaires

if(isset($_GET['page'])){
    switch ($_GET['page']) {
        case 'index':
            require_once "Routes/index.php";
            break;

        case 'category':
            require_once "Routes/category.php";
            break;

        case 'product':
            require_once "Routes/product.php";
            break;

        case 'user':
            require_once "Routes/user.php";
            break;

        default:
            return;
    }
} else {
    header("Location:?page=index&action=logIn");
}

if(isset($_SESSION['errors'])) {
    unset($_SESSION['errors']);
}
if(isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
if(isset($_SESSION['errorsModal'])) {
    unset($_SESSION['errorsModal']);
}
if(isset($_SESSION['cache'])) {
    unset($_SESSION['cache']);
}

?>
</body>

<script src="script.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
<script src="https://unpkg.com/flowbite@1.5.3/dist/datepicker.js"></script>


