<?php 
class UsersController extends Controller
{
 public function index()
 {
  if (isset($_SESSION['id'])) {
    $this->redirect('/home');
}
  $data = [
   'judul' => 'Login'
  ];
  $this->view('register/index', $data);
  $this->view('template/footer');
 }
 public function register()
 {
  // sanitize post data
  $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  $cek_username = "/^[a-zA-Z0-9_]{3,16}$/";

  // inisialisasi data
  $data = [
    'username' => trim($_POST['username']),
    'email' => trim($_POST['email']),
    'password' => trim($_POST['password']),
    'Rpassword' => trim($_POST['Rpassword']),
  ];
  // validasi inputan
  if (empty($data['username']) || empty($data['email'])
  || empty($data['password'])|| empty($data['Rpassword'])) {
    Messege::setFlash('Daftar gagal','silahkan', 'isi semua data' , 'danger');
    // header('Location:' . BASEURL . '/Users');
    // exit;
    $this->redirect('/users');
  }
  if (!preg_match($cek_username, $data['username'])) {
    Messege::setFlash('Daftar gagal','username', 'tidak valid' , 'danger');
    $this->redirect('/users');
  }
  if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    Messege::setFlash('Daftar gagal','email', 'tidak valid' , 'danger');
    $this->redirect('/users');
  }
  if (strlen($data['password'] < 6)) {
    Messege::setFlash('Daftar gagal','password kurang', 'dari 6 karakter' , 'danger');
    $this->redirect('/users');
  }elseif ($data['password'] !== $data['Rpassword']) {
    Messege::setFlash('Daftar gagal','password', 'tidak sama' , 'danger');
    $this->redirect('/users');
  }
  // cek kesamaan username atau email yang ada
  if ($this->model('Users_Model')->CekUserEmail($data['email'], $data['username'])) {
    Messege::setFlash('Daftar gagal','email atau', 'username sudah ada' , 'danger');
    $this->redirect('/users');
  }
  // password validasi dan hash
  $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

  if ($this->model('Users_Model')->Register($data)) {
    $this->redirect('/users/login');
  }else {
    die("Terjadi Kesalahan");
  }
}
public function Login()
{
  if (isset($_SESSION['id'])) {
    $this->redirect('/home');
}
  $data = [
    'judul' => 'Login'
   ];
   $this->view('login/index', $data);
   $this->view('template/footer');
}
// Controller
public function auth()
{
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $data = [
        'username/email' => trim($_POST['username/email']),
        'password' => trim($_POST['password'])
    ];

    if (empty($data['username/email']) || empty($data['password'])) {
        Messege::setFlash('Login gagal', 'harap', 'isi semua form', 'danger');
        $this->redirect('/users/login');
    }

    // Cek email atau username
    $user = $this->model('Users_Model')->CekUserEmail($data['username/email'], $data['username/email']);
    if ($user) {
        $loggedInUser = $this->model('Users_Model')->login($data['username/email'], $data['password']);
        if ($loggedInUser) {
            $this->MembuatSession($loggedInUser);
        } else {
            // Debug: Output alasan gagal
            error_log("Login gagal: Password salah.");
            Messege::setFlash('Login gagal', 'password', 'salah', 'danger');
            $this->redirect('/users/login');
        }
    } else {
        // Debug: Output alasan gagal
        error_log("Login gagal: User tidak ditemukan.");
        Messege::setFlash('Login gagal', 'username atau email', 'tidak ditemukan', 'danger');
        $this->redirect('/users/login');
    }
}

public function MembuatSession($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
    $this->redirect('/home');
    // var_dump($a);
    // die();
}
public function logout()
{
  unset($_SESSION['id']);
  unset($_SESSION['username']);
  unset($_SESSION['email']);
  session_destroy();
  $this->redirect('/users/login');
}

}
$init = new UsersController;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 switch ($_POST['type']) {
  case 'register':
   $init->register();
   break;
  case 'login':
    $init->auth();
    break;
 }
}
?>