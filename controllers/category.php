<?php


class category extends abstractController
{
    public $content;
    public $view='categoryPage.phtml';

    public function contentAction(){
        $model = new categoryModel();
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