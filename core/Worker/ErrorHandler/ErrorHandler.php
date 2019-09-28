<?php

namespace Core\Worker\ErrorHandler;

class ErrorHandler {

  public function __construct() {
    if (DEBUG) {
      error_reporting(-1);
    } else {
      error_reporting(0);
    }
    set_exception_handler([$this, 'exceptionHandler']);
  }

  public function exceptionHandler($e) {


    $this->displayError(
      'Exception',
      $e->getMessage(),
      $e->getFile(),
      $e->getLine(),
      $e->getCode()
    );
  }

  protected function logErrors($message = '', $file = '', $line = '') {
    error_log("[" . date('Y-m-d H:i:s') . "] Error text: {$message} | File: {$file} | Line: {$line}\n===============\n", 3, ROOT . '/tmp/errors.log');
  }

  protected function displayError($errno, $errstr, $errfile, $errline, $responce = 404) {
    http_response_code($responce);
    if ($responce == 404 && !DEBUG) {
      echo 'test';
      die;
    }
    if(DEBUG) {
      $err = [
        "success" => false,
        "err" => [
          "name" => $errno,
          "errstr" => $errstr,
          "file" => $errfile,
          "line" => $errline,
          "responce" => $responce
        ]
      ];
      echo json_encode($err, JSON_PRETTY_PRINT);
    } else {
      echo 'test';
    }
    die;
  }
}
?>