<?php
class AppCommand implements ICommand
{
    public function onCommand($args)
    {
        $testRouter = new Router();
        $testRouter->run();

        // $getRouter = new FrontController();
        // $getRouter->run();
        return true;
    }
}
