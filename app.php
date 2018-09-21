<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
session_start();

require_once('autoload.php');

// var_dump($_GET);

try {
    date_default_timezone_set('Europe/Moscow'); // перенес из App.class.php

    // оставляем Singleton - но коннект делаем только один раз в начале работы
    // поэтому если какие-то вопросы по коннекту к db - то только здесь. единая точка.
    // кроме того - по факту класс db - это Адаптер между PDO и классами нашего приложения
    db::getInstance()->Connect(Config::get('db_user'), Config::get('db_password'), Config::get('db_base'), Config::get('db_host'));

    // а теперь app.php становится FrontController, и в нем инстанцируется Router (и запускается)
    // он уже проверяется $_POST и $_GET и вызывается нужный контроллер
    // $_POST -> api, а $_GET -> controller
    $router = new Router();
    $router->run();
} catch (PDOException $e) {
    echo "DB is not available";
    var_dump($e->getTrace());
} catch (Exception $e) {
    echo $e->getMessage();
}


?>
