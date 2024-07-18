<?php 

class MahasiswaController extends Controller{
 public function index(){
  $data = [
   'judul' => 'Daftar Mahasiswa',
   'mhs' => $this->model('Mahasiswa_Model')->getAllMahasiswa(),
  ];
  $this->view('template/header', $data);
  $this->view('mahasiswa/index', $data);
  $this->view('template/footer');
 }
}

?>