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
  return $this->db->resulSet(); //dari PDO database
 }
 public function getMahasiswaById($id)
 {
  $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
  $this->db->bind('id', $id);
  return $this->db->single();
  // dari PDO Database
 }
 public function tambahMahasiswa($data)
 {
  $tambah = "INSERT INTO mahasiswa 
            VALUES
            ('', :nama, :nim, :email, :prodi)";
 $this->db->query($tambah);
 $this->db->bind('nama', $data['nama']);
 $this->db->bind('nim', $data['nim']);
 $this->db->bind('email', $data['email']);
 $this->db->bind('prodi', $data['prodi']);

 $this->db->execute();
 return $this->db->CekPerubahan();
 }
 public function hapusMahasiswa($id)
 {
  $hapus = "DELETE FROM mahasiswa WHERE id = :id";
  $this->db->query($hapus);
  $this->db->bind('id', $id);
  $this->db->execute();
  return $this->db->CekPerubahan();
 }
 public function editMahasiswa($data)
 {
  $edit = "UPDATE mahasiswa
  SET nama = :nama,
      nim = :nim,
      email = :email,
      prodi = :prodi
      WHERE id = :id";
  $this->db->query($edit);
  $this->db->bind('nama', $data['nama']);
  $this->db->bind('nim', $data['nim']);
  $this->db->bind('email', $data['email']);
  $this->db->bind('prodi', $data['prodi']);
  $this->db->bind('id', $data['id']);
  $this->db->execute();
  return $this->db->CekPerubahan();
 }
 public function cariDataMahasiswa()
 {
    $keyword = $_POST['keyword'];
    $cari = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
    $this->db->query($cari);
    $this->db->bind('keyword', "%$keyword%");
    return $this->db->resulSet();
 }
}
?>