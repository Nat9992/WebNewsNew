<?php

/**
 * Created by PhpStorm.
 * User: mac
 * Date: 22.11.16
 * Time: 17:38
 */
class tag extends abstractController
{
    public $content;
    public $view='tagPage.phtml';//меняется для каждого контроллера имя виеев

    public function contentAction(){
        $model = new tagModel();//меняется для каждого контроллера имя молели
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