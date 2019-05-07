<?php

namespace Site\Controller;

class UserController extends SiteController {
 
  public function register() {
    $req = json_decode(file_get_contents('php://input'), true);

    $data = [
      'email'    => isset($req['email'])    ? $req['email']         : null,
      'password' => isset($req['password']) ? md5(SECRET . $req['password']) : null,
      'name'     => isset($req['name'])     ? $req['name']          : null,
      'lastname' => isset($req['lastname']) ? $req['lastname']      : null,
      'cart'     => '[]',
      'history'  => '[]',
      'role'     => isset($req['role'])     ? $req['role']          : 0,
      'token'    => '' 
    ];
    
    $this->db->execute("INSERT INTO user SET ", $data);

    echo json_encode([
      "success" => true
    ], JSON_PRETTY_PRINT);
  }
}
