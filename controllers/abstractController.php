<?php

/**
 * Created by PhpStorm.
 * User: mac
 * Date: 21.11.16
 * Time: 23:44
 */
abstract class abstractController
{

    protected $view; // шаблон(названия виев)
    public $id;


    // в конструкторе подключаем шаблоны
    function __construct($id = '') {
        $this->id = $id;
    }

}