<?php

namespace Core\Provider\ErrorHandler;

use Core\Provider\AbstractProvider;
use Core\Worker\ErrorHandler\ErrorHandler;

class Provider extends AbstractProvider {
  
  public $workerName = 'errorHandler';

  public function init() {
    $w = new ErrorHandler();

    $this->di->set($this->workerName, $w);
  }
}

?>
