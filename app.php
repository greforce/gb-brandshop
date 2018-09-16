<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
session_start();

require_once('autoload.php');

// var_dump($_GET);

try{
  // оставляем Singleton - но коннект делаем только один раз в начале работы
  // поэтому если какие-то вопросы по коннекту к db - то только здесь. единая точка.
  // кроме того - по факту класс db - это Адаптер между PDO и классами нашего приложения
  db::getInstance()->Connect(Config::get('db_user'), Config::get('db_password'), Config::get('db_base'), Config::get('db_host'));

  // ЭТО ВСЕ ЖЕ ПАТТЕРН  Chain of Responsibiluty (не Команда)
  // в моей реализации если хотя бы один обработчик сработал - то прекращается обработка
  // но можно поменять и дать всем обрабатывать (в моем конкретном случае это НЕ надо делать)
  $router = new Command();

  $router->addCommand(new AjaxCommand());
  $router->addCommand(new BasketCommand());
  $router->addCommand(new CatalogCommand());
  $router->addCommand(new RegisterCommand());
  $router->addCommand(new AppCommand());

  $router->runCommand($_POST['metod']);

}
catch (PDOException $e){
    echo "DB is not available";
    var_dump($e->getTrace());
}
catch (Exception $e){
    echo $e->getMessage();
}


?>
