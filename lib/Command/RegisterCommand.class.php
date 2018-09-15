<?php
class RegisterCommand implements ICommand
{
    public function onCommand($args)
    {
        if ($args !== 'register')
        {
            return false;
        }

        $result = Auth::registerUser();
        echo json_encode($result);

        return true;
    }
}
