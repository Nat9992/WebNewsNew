<?php

/**
 * Created by PhpStorm.
 * User: mac
 * Date: 21.11.16
 * Time: 23:46
 */
class indexController extends abstractController
{
public $content;
public $view='mainPage.phtml';

    public function contentAction(){
        $model = new indexModel();
        $this->content = $model ->getContent();

    }

    public function view(){
        $this->contentAction();
        // отрисовка модуля
        ob_start();
        // подсоединение файла
        require "views/$this->view";
        // отрисовка html кода файла
        $html = ob_get_contents();
        ob_end_clean();
        // возврат отрисованного кода
        return $html;

    }
}