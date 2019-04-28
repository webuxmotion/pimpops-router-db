<?php

namespace Core\Worker\Messenger;

class Messenger {
  
  public function sendMessage($contact) {
    return "Message has been sent to number: " . $contact; 
  }
}

?>
