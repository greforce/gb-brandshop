<?php
class AjaxCommand implements ICommand
{
    public function onCommand($args)
    {
        if ($args !== 'ajax')
        {
            return false;
        }

        ob_start(); //Запускаем буферизауию вывода

        $PageAjax = $_POST['PageAjax']; //Получаем действие на AJAX
        $data = Ajax::$PageAjax();
        $view = Ajax::$views;

        $loader = new Twig_Loader_Filesystem(Config::get('path_templates'));
        $twig = new Twig_Environment($loader);
        $template = $twig->loadTemplate($view);

        echo $template->render($data);
        $str = ob_get_contents(); //Записываем в переменную то, что в буфере

        ob_end_clean(); //Очищаем буфер

        echo json_encode(['result' => $data['isAuth'], 'html' => $str]);
        return true;

    }
}
