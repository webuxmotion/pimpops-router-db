<?php

namespace Site\Controller;

use Core\Worker\Auth\Auth;
use Core\DI;
use Core\Helper\Cookie;
use \Firebase\JWT\JWT;

class UserController extends SiteController {

  protected $auth;
  protected $user;

  public function __construct($di) {
    parent::__construct($di);

    $this->auth = new Auth($di);
  }
 
  public function register() {
    $req = json_decode(file_get_contents('php://input'), true);

    $options = [
      'cost' => 12,
    ];

    $password_hash = password_hash(SECRET . $req['password'], PASSWORD_BCRYPT, $options);

    $data = [
      'email'    => isset($req['email'])    ? $req['email']         : null,
      'password' => isset($req['password']) ? $password_hash : null,
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

  public function exceptionHandler() {

    $user = $this->user;

    $tokenId    = base64_encode($this->auth->salt());
    $issuedAt   = time();
    $notBefore  = $issuedAt + 0;             //Adding 10 seconds
    $expire     = $notBefore + 60 + 60;            // Adding 60 * 60 seconds
    $serverName = 'http://localhost'; // Retrieve the server name from config ile

    $data = [
        'iat'  => $issuedAt,         // Issued at: time when the token was generated
        'jti'  => $tokenId,          // Json Token Id: an unique identifier for the token
        'iss'  => $serverName,       // Issuer
        'nbf'  => $notBefore,        // Not before
        'exp'  => $expire,           // Expire
        'data' => [                  // Data related to the signer user
            'userId'   => $user->id  // userid from the users table
        ]
    ];

    $jwt = JWT::encode($data, SECRET, 'HS512'); 

    $sql = '
      UPDATE user
      SET token = "' . $jwt . '"
      WHERE id=' . $user->id . '
    ';
    $this->db->execute($sql);

    // Set cookie
    $this->auth->authorize($jwt);

    echo json_encode([
      "loginSuccess" => true
    ], JSON_PRETTY_PRINT);
  }

  public function login() {
    $req = json_decode(file_get_contents('php://input'), true);

    // Find user by email
    $sql = '
      SELECT *
      FROM `user`
      WHERE email="' . $req['email'] .'"
      LIMIT 1
    ';
    $query = $this->db->query($sql);

    if (!empty($query)) {
      $user = $query[0];

      $this->user = $user;

      // Check the password
      
      if (password_verify(SECRET . $req['password'], $user->password)) {

        set_exception_handler([$this, 'exceptionHandler']);
        
        $decoded = JWT::decode($user->token, SECRET, array('HS512'));

        if ($decoded) {
          $this->auth->authorize($user->token);

          echo json_encode([
            "loginSuccess" => true
          ], JSON_PRETTY_PRINT);
        }


        
      } else {
        Cookie::delete('w_auth');

        echo json_encode([
          "loginSuccess" => false,
          "message" => "Wrong password"
        ], JSON_PRETTY_PRINT);
      }
    } else {
      echo json_encode([
        "loginSuccess" => false,
        "message" => "Auth failes, email not found"
      ], JSON_PRETTY_PRINT);
    }
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
        $user = $query[0];

        echo json_encode([
          "isAdmin" => $user->role == 0 ? false : true,
          "isAuth" => true,
          "email" => $user->email,
          "name" => $user->name,
          "lastname" => $user->lastname,
          "role" => $user->role,
          "cart" => $user->cart,
          "history" => $user->history
        ], JSON_PRETTY_PRINT);

      } else {
        echo json_encode([
          "isAuth" => false,
          "error" => true 
        ], JSON_PRETTY_PRINT);
      }
    }
  } 
}
