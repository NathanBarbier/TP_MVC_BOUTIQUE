<?php

class Autoload
{
    public static function load()
    {
        spl_autoload_register(function ($className) {
            if (file_exists('Controllers/' . $className . '.php')) {
                require_once 'Controllers/' . $className . '.php';
            } else if (file_exists('Controllers/Category/' . $className . '.php')) {
                require_once 'Controllers/Category/' . $className . '.php';
            } else if (file_exists('Controllers/Index/' . $className . '.php')) {
                require_once 'Controllers/Index/' . $className . '.php';
            } else if (file_exists('Controllers/Product/' . $className . '.php')) {
                require_once 'Controllers/Product/' . $className . '.php';
            } else if (file_exists('Controllers/User/' . $className . '.php')) {
                require_once 'Controllers/User/' . $className . '.php';
            } else if (file_exists('Entity/' . $className . '.php')) {
                require_once 'Entity/' . $className . '.php';
            } else if (file_exists('Enum/' . $className . '.php')) {
                require_once 'Enum/' . $className . '.php';
            } else if (file_exists('Enum/Category/' . $className . '.php')) {
                require_once 'Enum/Category/' . $className . '.php';
            } else if (file_exists('Enum/Index/' . $className . '.php')) {
                require_once 'Enum/Index/' . $className . '.php';
            } else if (file_exists('Enum/Product/' . $className . '.php')) {
                require_once 'Enum/Product/' . $className . '.php';
            } else if (file_exists('Enum/User/' . $className . '.php')) {
                require_once 'Enum/User/' . $className . '.php';
            } else if (file_exists('Repository/' . $className . '.php')) {
                require_once 'Repository/' . $className . '.php';
            } else if (file_exists('Repository/Category/' . $className . '.php')) {
                require_once 'Repository/Category/' . $className . '.php';
            } else if (file_exists('Repository/Index/' . $className . '.php')) {
                require_once 'Repository/Index/' . $className . '.php';
            } else if (file_exists('Repository/Product/' . $className . '.php')) {
                require_once 'Repository/Product/' . $className . '.php';
            } else if (file_exists('Repository/User/' . $className . '.php')) {
                require_once 'Repository/User/' . $className . '.php';
            } else if (file_exists('Routes/' . $className . '.php')) {
                require_once 'Routes/' . $className . '.php';
            } else if (file_exists('Services/' . $className . '.php')) {
                require_once 'Services/' . $className . '.php';
            } else if (file_exists('Templates/' . $className . '.php')) {
                require_once 'Templates/' . $className . '.php';
            } else if (file_exists('Templates/Category/' . $className . '.php')) {
                require_once 'Templates/Category/' . $className . '.php';
            } else if (file_exists('Templates/Index/' . $className . '.php')) {
                require_once 'Templates/Index/' . $className . '.php';
            } else if (file_exists('Templates/Product/' . $className . '.php')) {
                require_once 'Templates/Product/' . $className . '.php';
            } else if (file_exists('Templates/User/' . $className . '.php')) {
                require_once 'Templates/User/' . $className . '.php';
            } else if (file_exists('Validator/' . $className . '.php')) {
                require_once 'Validator/' . $className . '.php';
            } else if (file_exists('Validator/Category/' . $className . '.php')) {
                require_once 'Validator/Category/' . $className . '.php';
            } else if (file_exists('Validator/Index/' . $className . '.php')) {
                require_once 'Validator/Index/' . $className . '.php';
            } else if (file_exists('Validator/Product/' . $className . '.php')) {
                require_once 'Validator/Product/' . $className . '.php';
            } else if (file_exists('Validator/User/' . $className . '.php')) {
                require_once 'Validator/User/' . $className . '.php';
            }
        });
    }
}
