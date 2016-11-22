<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 21.11.16
 * Time: 23:14
 */
define ('DS', DIRECTORY_SEPARATOR);
// разделитель "/" для путей к файлам
// DIRECTORY_SEPARATOR - предопределенная конст php

$sitePath = '/PHP/WebNewsNew/'; // путь к корневой папке сайта

define ('SITE_PATH', $sitePath); // путь к корневой папке сайта

// для подключения к бд
define('HOST', 'localhost');
define('LOGIN', 'root');
define('PASSWORD', '');
define('DATABASE', 'web_news');