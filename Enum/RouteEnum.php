<?php

enum RouteEnum: string
{
    case INDEX_LOGIN = 'Templates/Index/logIn.php';
    case INDEX_SIGNUP = 'Templates/Index/signUp.php';
    case CATEGORY_LIST = 'Templates/Category/list.php';
    case PRODUCT_LIST = 'Templates/Product/list.php';
    case USER_LIST = 'Templates/User/list.php';
    case USER_NOT_ALLOWED = 'Templates/User/notAllowed.php';
}
