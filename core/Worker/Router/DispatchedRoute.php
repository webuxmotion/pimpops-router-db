<?php

namespace Core\Worker\Router;

class DispatchedRoute {

  private $controller;
  private $parameters;

  public function __construct($controller, $parameters = []) {
    $this->controller = $controller;
    $this->parameters = $parameters;
  }

  public function getController() {
    return $this->controller;
  }

  public function getParameters() {
    return $this->parameters;
  }
}
