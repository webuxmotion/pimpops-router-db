<?php

namespace Core\Worker\Auth;

use Core\Helper\Cookie;

class Auth {
  protected $authorized = false;
  protected $hash_user;
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
}
