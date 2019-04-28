<?php

namespace Core;

use Core\DI;

abstract class Controller {

  protected $di;

  public function __construct(DI $di) {
    $this->di = $di; 
  }
}
