<?php

namespace Core;

use Core\Helper\Common;
use Core\Worker\Router\DispatchedRoute;

class Starter {

  private $di;
  public $router;

  public function __construct($di) {
    $this->di = $di;
    $this->router = $this->di->get('router');
  }

  public function run() {

    try {

      $this->router->add('home', '/', 'HomeController:index');
      $this->router->add('send-message', '/send_message/(number:any)', 'HomeController:sendMessage');
      $this->router->add('news', '/news', 'HomeController:news');
      $this->router->add('news-one', '/news/(id:int)', 'HomeController:oneNew');

      $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUrl());

      if ($routerDispatch == null) {
        $routerDispatch = new DispatchedRoute('ErrorController:page404');
      }
       
      list($class, $action) = explode(':', $routerDispatch->getController(), 2);

      $controller = '\\Site\\Controller\\' . $class;
      $parameters = $routerDispatch->getParameters();

      call_user_func_array(array(new $controller($this->di), $action), $parameters);

    } catch (\ErrorException $e) {
      echo $e->getMessage();
      exit;
    }
  }
}
?>
