<?php 
class HomeController extends Controller{
 public function __construct()
 {
  $this->CekLogin();
 }
 public function index()
 {
  $data = [
   'judul' => 'Home',
   'nama' => $this->model('home_model')->getUser(),
  ];
  $this->view('template/header', $data);
  $this->view('home/index', $data);
  $this->view('template/footer');
 }
}
?>