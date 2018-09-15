<?php
class BasketCommand implements ICommand
{
    public function onCommand($args)
    {
        if ($args !== 'basket')
        {
            return false;
        }

        $isAuth = Auth::logIn();
        if (!$isAuth) {
          $userId = null;
        } else {
          $userId = $isAuth[0]['id_user'];
        }

        $basketOperation = $_POST['req'];
        if ($basketOperation == 'deleteorder') { // пока что здесь разместил метод работы с deleteorder
          $result = Basket::$basketOperation($isAuth[0]);
          if ($result) {
            ob_start(); //Запускаем буферизауию вывода

            $loader = new Twig_Loader_Filesystem(Config::get('path_templates'));
            $twig = new Twig_Environment($loader);
            $template = $twig->loadTemplate('profile-main-orders.tmpl');
            $content['orders'] = Model::getOrders($isAuth);
            $data['isAuth'] = $isAuth;
            $data['content_data'] = $content;

            echo $template->render($data);
            $str = ob_get_contents(); //Записываем в переменную то, что в буфере

            ob_end_clean(); //Очищаем буфер

            echo json_encode(['result' => true, 'html' => $str]);
          } else {
            echo json_encode(['result' => false, 'html' => null]);
          }
        } else {
          $result = Basket::$basketOperation($userId);
          echo json_encode($result);
        }

        return true;
    }
}
