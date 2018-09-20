<?php
class AppCommand implements ICommand
{
    public function onCommand($args)
    {
        $getRouter = new FrontController();
        $getRouter->run();
        return true;
    }
}
