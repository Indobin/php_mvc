<?php 
class AboutController extends Controller{
 public function __construct()
 {
  $this->CekLogin();
 }
 public function index()
 {
  $data =[
   'nama' => 'Satya',
   'umur' => '20',
   'judul' => 'About',
  ];
  $this->view('template/header', $data);
  $this->view('about/index', $data);
  $this->view('template/footer');
 }
}
?>