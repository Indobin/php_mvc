<?php 
class LoginController extends Controller
{
 public function index()
 {
  $data = [
   'judul' => 'Login'
  ];
  $this->view('login/index', $data);
  $this->view('template/footer');
 }
 public function auth()
 {
  // $username = $_POST['username'];
  // $password = $_POST['password'];
  if ($this->model('Login_Model')->Auth($_POST)) {
   Messege::setFlash('berhasil', 'ditambahkan' , 'success');
   header('Location:' . BASEURL . '/mahasiswa');
   exit;
  }else {
   Messege::setFlash('gagal', 'ditambah', 'danger');
   header('Location:' . BASEURL . '/mahasiswa');
   exit;
  }
 }
}
?>