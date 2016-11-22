<?php

/**
 * Created by PhpStorm.
 * User: mac
 * Date: 22.11.16
 * Time: 14:01
 */
class category extends abstractController
{
    public $content;
    public $view='categoryPage.phtml';//меняется для каждого контроллера имя виеев

    public function contentAction(){
        $model = new categoryModel();//меняется для каждого контроллера имя молели
        $this->content = $model ->getContent($this->id);

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