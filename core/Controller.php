<?php

namespace Core;

use Core\DI;

abstract class Controller {

  protected $di;
  protected $db;

  public function __construct(DI $di) {
    $this->di = $di; 
    $this->db = $this->di->get('db');
  }
}
