<?php

class FrontController
{
    private $url = null;

    public function __construct()
    {
        if (php_sapi_name() !== 'cli' && isset($_SERVER) && isset($_GET)) { //Проверим, установленны ли переменные $_SERVER и $_GET
            $this->url = explode("/", isset($_GET['path']) ? $_GET['path'] : '');
        }
    }

    public function run()
    {
        if ($this->url !== null) {
          $this->prepare();
          if (isset($_GET['page'])) {
              $controllerName = $_GET['page'] . 'Controller';
              $methodName = isset($_GET['action']) ? $_GET['action'] : 'Index';
              $controller = new $controllerName();
              $controller->$methodName();
          }
        }
    }

    // не совсем понимаю, насколько хорошим было решение зачем-то готовить $_GET перед тем, как затем обрабатывать его
    // в команде run
    // не лучше ли было просто настроить routes и на основе того, что по факту есть в $_GET и запускать контроллер??
    // но пока оставил как было изначально, просто разбил на части чуть более структурно
    protected function prepare()
    {
        if (!empty($this->url[0])) { //Проверяем, установленна ли переменная
            $_GET['page'] = $this->url[0];
            if (!empty($url[1])) {
                if (is_numeric($this->url[1])) {
                    $_GET['id'] = $this->url[1];
                    $_GET['action'] = 'show';
                } else {
                    $_GET['action'] = $this->url[1];
                }
                if (isset($this->url[2])) {
                    $_GET['id'] = $this->url[2];
                }
            }
        } else {
            $_GET['page'] = 'Index';	//Иначе устанавливаем стартовую страницу
        }
    }
}
