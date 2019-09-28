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

      $this->router->add('user-register', '/api/users/register', 'UserController:register', 'POST');
      $this->router->add('user-login', '/api/users/login', 'UserController:login', 'POST');
      $this->router->add('user-auth', '/api/users/auth', 'UserController:auth');
      $this->router->add('index', '/', 'HomeController:index');
      

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
