<?php

class Controller
{
    public $view = 'index';
    protected $data;
    protected $template;
    protected $modelDetails;


    function __construct($modelDetails)
    {
    		$this->data = [
      			'domain' => Config::get('domain'),
      			// 'BreadCrumbs' => Bread::BreadCrumbs(explode("/", $_SERVER['REQUEST_URI'])),
      			'isAuth' => Auth::logIn(),
      			// 'microtime' => microtime(true),
      			// 'domain' => Config::get('domain')
    		];
        $this->modelDetails = $modelDetails;
    }

    public function controller_view($id = 0)
    {
      	$modelName = $this->modelDetails['name'];
      	$methodName = $this->modelDetails['action'];

      	if (class_exists($modelName))
      	{
      		$model = new $modelName();
      		$content_data = $model->$methodName($id);
      	}

      	$this->data['title'] = $model->title;
      	$this->data['content_data'] = $content_data;


      	$loader = new Twig_Loader_Filesystem(Config::get('path_templates'));
      	$twig = new Twig_Environment($loader);
      	$template = $twig->loadTemplate($this->view);

      	return $template->render($this->data);
    }


    public function __call($name, $id)
    {
      	// var_dump($name);
      	// var_dump($name);
      	// throw new Exception('Нет метода: ' . $name . $$param);
      	header("Location: /page404/");
    }

}
