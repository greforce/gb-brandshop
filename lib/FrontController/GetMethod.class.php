<?php

class GetMethod implements IMethod
{
    public function getController($routes)
    {
        $controller = [
            'name' => '',
            'action' => '',
            'model' => [],
            'id' => '',
        ];

        if (php_sapi_name() !== 'cli' && isset($_SERVER) && isset($_GET)) { //Проверим, установленны ли переменные $_SERVER и $_GET
            $uri = explode("/", isset($_GET['path']) ? $_GET['path'] : '');

            if (array_key_exists($uri[0], $routes['GET'])) {
                $controller['name'] = $uri[0] . 'Controller';

                if (is_numeric($uri[1])) {
                    $uri[2] = $uri[1];
                    $uri[1] = $routes['GET'][$uri[1]];
                }
                $controller['action'] = (!empty($uri[1]) && in_array($uri[1], $routes['GET'][$uri[0]])) ? $uri[1] : $routes['GET'][$uri[0]][0];
                $controller['id'] = $uri[2];

                $controller['model'] = [
                    'name' => $uri[0] . 'Model',
                    'action' => $controller['action'],
                ];
            } else {
                $controller['name'] = 'IndexController';
                $controller['action'] = 'index';
                $controller['model'] = [
                    'name' => 'IndexModel',
                    'action' => $controller['action'],
                ];
            }
        }

        return $controller;
    }
}
