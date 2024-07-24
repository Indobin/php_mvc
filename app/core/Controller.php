<?php 
class Controller{
 public function view($view, $data = [])
 {
  require_once '../app/views/' . $view . '.php';
 }
 public function model($model){
  require_once '../app/models/' . $model . '.php';
  // require_once __DIR__ .'/../models/'. $model .'.php';
  return new $model;
 }
 public function redirect($url)
 {
  header('Location:' . BASEURL . $url);
  exit();
 }
}
?>