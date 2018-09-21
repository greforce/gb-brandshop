<?php

class productController extends Controller
{
    public $view = 'product';



  public function index()
  {
    $this->view .= "/" . __FUNCTION__ . '.php';

    echo $this->controller_view();

  }


  public function show($id)
  {
    $this->view .= "/" . __FUNCTION__ . '.php';

    echo $this->controller_view($id);
  }




}
