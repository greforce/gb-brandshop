<?php

class Router
{
    private $routes = [];

    public function __construct()
    {
        $routesPath = Config::get('path_root') . '/routes.php';
        $this->routes = include($routesPath);
    }

    public function run()
    {
        // попробовал применить ФАБРИКУ для определения обработчика POST и GET
        $factory = new MethodFactory();
        $controllerDetails = $factory->defineMethod()->getController($this->routes);

        if (class_exists($controllerDetails['name'])) {
            $controller = new $controllerDetails['name']($controllerDetails['model']);
            $action = $controllerDetails['action'];
            $controller->$action($controllerDetails['id']);
        }
    }
}
