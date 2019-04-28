<?php

namespace Site\Controller;

class HomeController extends SiteController {
 
  public function index() {

    $contactBook = $this->di->get('contactBook');
    $list = $contactBook->setList()->getList();

    foreach ($list as $item) {
      $link = ' <a href="/send_message/' . $item->number . '">Send message</a>';
      echo $item->name . ' : ' . $item->number . $link . '<br>';
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
