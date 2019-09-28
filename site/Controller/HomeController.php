<?php

namespace Site\Controller;

use Core\Worker\Auth\Auth;

class HomeController extends SiteController {

  public function __construct($di) {
    $this->auth = new Auth($di);
  }
 
  public function index() {

    if ($this->auth->auth($this->di)) {
      echo 'some secret info';
    }
  }

  public function sendMessage($number) {

    $contactBook = $this->di->get('contactBook');
    $list = $contactBook->setList()->getList();

    $messenger = $this->di->get('messenger');
    $numberExist = 0;

    foreach ($list as $item) {

      if ($item->number === $number) {
        $numberExist = 1;
        break; 
      } 
    }

    echo $numberExist ?
      'Message has been sent to number: ' . $number:
      'Number ' . $number . ' does not exist!';
  }
    
  public function news() {
    echo 'News page';
  }

  public function oneNew($id) {
    echo 'New id: ' . $id;
  }
}
