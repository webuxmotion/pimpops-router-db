<?php

namespace Core\Worker\ContactBook;

class ContactBook {

  private $di;
  public $contactList;

  public function __construct($di) {
    $this->di = $di;
  }

  public function setList() {

    $db = $this->di->get('db');

    $list = $db->query('SELECT * FROM contact');

    $this->contactList = $list;

    return $this;
  }

  public function getList() {
    return $this->contactList; 
  }
}

?>
