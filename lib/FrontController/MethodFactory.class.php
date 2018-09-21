<?php

class MethodFactory
{
    public function defineMethod()
    {
        if (isset($_POST['metod'])) {
            return new PostMethod();
        }

        return new GetMethod();
    }
}
