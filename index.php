<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 21.11.16
 * Time: 23:09
 */

error_reporting(E_ALL);
include ('config/config.php');
// стандартные пути для подкулючаемых автоматически файлов

set_include_path(SITE_PATH .
    PATH_SEPARATOR . 'controllers' .
    PATH_SEPARATOR . 'engine' .
    PATH_SEPARATOR . 'models' );

$load = function($className) {
// проверка на существование класса
    if (!class_exists($className))
    {
        $_className = str_replace(array('_'), array('/'), strtolower($className)) . '.php';
        include_once $_className;
    }
};

spl_autoload_register($load);


engine:: init();