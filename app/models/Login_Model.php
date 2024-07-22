<?php 
class Login_Model 
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
}

?>