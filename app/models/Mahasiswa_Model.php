<?php 
class Mahasiswa_Model{
 private $table = 'mahasiswa';
 private $db;
 public function __construct()
 {
  $this->db = new Database;
 }
 public function getAllMahasiswa()
 {
  $this->db->query('SELECT * FROM '. $this->table);
  return $this->db->resulSet();
 }

}
?>