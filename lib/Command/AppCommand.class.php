<?php
class AppCommand implements ICommand
{
    public function onCommand($args)
    {
        App::init();  //Запускаем статический метод init класса App. В соответствии с внутренними правилами имен находится в файле app.class.php
        return true;
    }
}
