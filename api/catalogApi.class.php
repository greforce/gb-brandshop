<?php
class catalogApi
{
    public function index()
    {
        $result = Product::catalog();
        echo json_encode($result);
    }
}
