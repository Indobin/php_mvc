<?php 
class Users_Model 
{
 private $db;
 public function __construct()
 {
  $this->db = new Database;
 }
 public function Auth($data)
 {
  $cek = "SELECT * FROM users WHERE username = :username and password = :password";
  $this->db->query($cek);
  $this->db->bind('username', $data['username']);
  $this->db->bind('password', $data['password']);
  // $this->db->execute();
  return $this->db->single();
 }
 public function CekUserEmail($email, $username)
 {
  $cek = "SELECT * FROM users WHERE username = :username OR email = :email";
  $this->db->query($cek);
  $this->db->bind('username', $username);
  $this->db->bind('email', $email);
  $row =  $this->db->single();
  if ($this->db->CekPerubahan() > 0) {
   return $row;
  }else{
   return false;
  }
 }
 public function register($data)
 {
  $insert = "INSERT INTO users (username, email, password)
  VALUES (:username, :email, :password)";
  $this->db->query($insert);
  $this->db->bind('username', $data['username']);
  $this->db->bind('email', $data['email']);
  $this->db->bind('password', $data['password']);
  $this->db->execute();
  return $this->db->CekPerubahan();
 }
 public function login($UsrOrEmail, $password)
 {
     $user = $this->CekUserEmail($UsrOrEmail, $UsrOrEmail);
     if ($user == false) {
         return false;
     }
 
     $hashedPassword = $user->password;
 
     // Debug: Output hashed password dan password yang diberikan
     error_log("Hashed password yang disimpan: " . $hashedPassword);
     error_log("Password yang diberikan: " . $password);
 
     if (password_verify($password, $hashedPassword)) {
         return $user;
     } else {
         return false;
     }
 }
}

?>