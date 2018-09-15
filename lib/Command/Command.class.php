<?php
interface ICommand
{
    function onCommand($args);
}

class Command
{
    private $_commands = [];

    public function addCommand($cmd)
    {
        $this->_commands[] = $cmd;
    }

    public function runCommand($args)
    {
        foreach ($this->_commands as $cmd)
        {
            if ($cmd->onCommand($args))
            {
                return;
            }
        }
    }
}
