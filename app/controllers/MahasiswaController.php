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
 public function detail($id){
  $data = [
   'judul' => 'Detail Mahasiswa',
   'mhs' => $this->model('Mahasiswa_Model')->getMahasiswaById($id),
  ];
  $this->view('template/header', $data);
  $this->view('mahasiswa/detail', $data);
  $this->view('template/footer');
 }
 public function tambah(){
  if ($this->model('Mahasiswa_Model')->tambahMahasiswa($_POST)>0) {
   Messege::setFlash('Data Mahasiswa','berhasil', 'ditambahkan' , 'success');
   header('Location:' . BASEURL . '/mahasiswa');
   exit;
  }else {
   Messege::setFlash('Data Mahasiswa','gagal', 'ditambahkan', 'danger');
   header('Location:' . BASEURL . '/mahasiswa');
   exit;
  }
 }
 public function hapus($id)
 {
  if ($this->model('Mahasiswa_Model')->hapusMahasiswa($id)>0) {
   Messege::setFlash('Data Mahasiswa','berhasil', 'dihapus' , 'success');
   header('Location:' . BASEURL . '/mahasiswa');
   exit;
  }else {
   Messege::setFlash('Data Mahasiswa','gagal', 'ditambah', 'danger');
   header('Location:' . BASEURL . '/mahasiswa');
   exit;
  }
 }
 public function edit()
 {
 echo json_encode($this->model('Mahasiswa_Model')->getMahasiswaById($_POST['id']));
 }
 public function editdata()
 {
  if ($this->model('Mahasiswa_Model')->editMahasiswa($_POST)>0) {
   Messege::setFlash('Data Mahasiswa','berhasil', 'diedit' , 'success');
   header('Location:' . BASEURL . '/mahasiswa');
   exit;
  }else {
   Messege::setFlash('Data Mahasiswa','gagal', 'ditambah', 'danger');
   header('Location:' . BASEURL . '/mahasiswa');
   exit;
  }
 }
 public function cari()
 {
  $data = [
   'judul' => 'Daftar Mahasiswa',
   'mhs' => $this->model('Mahasiswa_Model')->cariDataMahasiswa(),
  ];
  $this->view('template/header', $data);
  $this->view('mahasiswa/index', $data);
  $this->view('template/footer');
 }
}

?>