<?php

namespace Core\Worker\Auth;

use Core\Helper\Cookie;
use \Firebase\JWT\JWT;
use Core\DI;

class Auth {

  protected $authorized = false;
  protected $hash_user;

  public function __construct(DI $di) {
    $this->di = $di; 
    $this->db = $this->di->get('db');
  }

  public function authorized() {
    return $this->authorized;
  }
  public function hashUser() {
    return Cookie::get('auth_user');
  }
  public function authorize($token) {
    Cookie::set('w_auth', $token);
  }
  public function unAuthorize() {
    Cookie::delete('w_auth');
  }
  public static function salt() {
    return (string) rand(1000000, 9999999);
  }
  public static function encryptPassword($password, $salt = '') {
    return hash('sha256', $password . $salt);
  }

  public function auth() {
    $jwt = Cookie::get('w_auth');

    if (!$jwt) {
      echo json_encode([
          "isAuth" => false,
          "error" => true 
      ], JSON_PRETTY_PRINT);
    } else {
      $decoded = JWT::decode($jwt, SECRET, array('HS512'));

      $sql = '
        SELECT *
        FROM `user`
        WHERE id="' . $decoded->data->userId .'"
        AND token="' . $jwt .'"
        LIMIT 1
      ';
      $query = $this->db->query($sql);

      if (!empty($query)) {
        return true;
      } else {
        return false;
      }
    }
  }
}
