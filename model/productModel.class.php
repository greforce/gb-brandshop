<?php

class productModel extends Model
{
    public $view = 'product';
    public $title;

    function __construct()
    {
      parent::__Construct();
      $this->title .= "Products";

    }



    public function index($data = NULL, $deep = 0)
    {


    }


    public function show($id)
    {
        // $this->view .= "/" . __FUNCTION__ . '.php';
        // db::getInstance()->Query('UPDATE `goods` SET `view` = `view` + 1 where id_good = "'. $id .'"');
        $result['single_item'] = Product::singleItemLoad($id);
        $result['maylike_product'] = Product::maylikeProduct();



        return $result;

    }



}
