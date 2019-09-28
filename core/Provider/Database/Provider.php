<?php

namespace Core\Provider\Database;

use Core\Provider\AbstractProvider;
use Core\Worker\Database\Connection;

class Provider extends AbstractProvider {
  
  public $workerName = 'db';

  public $config = [
      'host' => 'mysql',
      'db_name' => 'moe_db',
      'username' => 'moeuser',
      'password' => 'moepass',
      'charset' => 'utf8'
    ];

  public function init() {

    $db = new Connection($this->config);

    $this->di->set($this->workerName, $db);
  }
}

?>
