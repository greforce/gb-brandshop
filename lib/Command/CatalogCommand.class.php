<?php
class CatalogCommand implements ICommand
{
    public function onCommand($args)
    {
        if ($args !== 'catalog')
        {
            return false;
        }

        $result = Product::catalog();
        echo json_encode($result);

        return true;
    }
}
