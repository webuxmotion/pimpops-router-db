<?php

namespace Core;

class DI {
  
  private $container = [];

  public function set($key, $value) {
    $this->container[$key] = $value;
  }

  public function get($key) {
    return $this->has($key) ? $this->container[$key] : null;
  }

  public function has($key) {
    return isset($this->container[$key]);
  }
}

?>
