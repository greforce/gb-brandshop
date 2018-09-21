<?php

class PostMethod implements IMethod
{
    public function getController($routes)
    {
        $controller = [
            'name' => '',
            'action' => '',
            'model' => [],
        ];

        if (in_array($_POST['metod'], $routes['POST'])) {
            $controller['name'] = $_POST['metod'] . 'Api';
            $controller['action'] = 'index';
            $controller['model'] = [];
        }

        return $controller;
    }
}
