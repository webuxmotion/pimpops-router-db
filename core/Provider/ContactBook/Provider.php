<?php

namespace Core\Provider\ContactBook;

use Core\Provider\AbstractProvider;
use Core\Worker\ContactBook\ContactBook;

class Provider extends AbstractProvider {
  
  public $workerName = 'contactBook';

  public function init() {
    $contactBook = new ContactBook($this->di);

    $this->di->set($this->workerName, $contactBook);
  }
}

?>
