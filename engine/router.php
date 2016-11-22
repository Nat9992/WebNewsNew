<?php

/**
 * Created by PhpStorm.
 * User: mac
 * Date: 21.11.16
 * Time: 23:29
 */
class router
{

    static private $instance;

    private $defaultController = 'indexController';
    private $defaultAction = 'view';

    private $errorController = 'error';
    private $errorAction = 'error';

    private $controller;
    private $action;
    private $link;

    public $path;

    private function __construct()
    {
        $this->parseRequest();
    }

    static public function instance()
    {
        if(is_null(self::$instance))
            self::$instance = new self();

        return self::$instance;
    }

    private function parseRequest()
    {
        $this->link = $this->getUri();

        $this->controller = @$this->link[0];

        if($this->controller)
        {
            $this->action = @$this->link[1];
            $this->path = @$this->link[2];
        }
    }


    public function correctionParse()
    {
// проверка существования контроллера. если контроллер не задан или нет доступа либо не существует указывается действие.
        if($this->controller)
        {
            $filename = 'controllers/' . $this->getControllerName() . '.php';

            if(!file_exists($filename))
            {
                $this->controller = $this->errorController;
                $this->action = $this->defaultAction;
            }
        }
        else
        {
            $this->controller = $this->defaultController;
            $this->action = $this->defaultAction;
        }

        if(!$this->action)
        {
            $this->action = $this->defaultAction;
        }

// создание контроллера
        $class = $this->getControllerName();

        $obj = new $class($this->path);

// проверка существует ли действие
        if(!method_exists($obj, $this->getActionName()))
        {
            $this->action = $this->errorAction;
        }

        return $obj;
    }

    private function getUri()
    {
        $uri = $_SERVER['REQUEST_URI'];


        return explode('/', substr($uri, strlen(SITE_PATH)));
    }

    public function getActionName()
    {
        return $this->action;
    }

    private function getControllerName( )
    {
        return $this->controller ;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function getPath()
    {
        return $this->path;
    }





}