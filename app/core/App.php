<?php 
class App{
 protected $controller = 'HomeController';
 protected $method = 'index';
 protected $params = [];
 // public function __construct(){
 //  $url = $this->parseUrl();

 //  // Controller
 //  if (file_exists('../app/controllers/' . $url[0] . '.php')) {
 //   $this->controller = $url[0];
 //   unset($url[0]);
 //  }
 //  require_once '../app/controllers/' . $this->controller . '.php';
 //  $this->controller = new $this->controller;

 //  // Method
 //  if (isset($url[1])) {
 //   if (method_exists($this->controller, $url[1])) {
 //    $this->method = $url[1];
 //    unset($url[1]);
 //   }
 //  }

 //  //Params
 //  if (! empty($url)) {
 //   $this->params = array_values($url);
 //  }

 //  // run controller, medhod, and params
 //  call_user_func_array([$this->controller, $this->method], $this->params);
 // }
 public function __construct(){
  $url = $this->parseUrl();

  // Controller
  if (isset($url[0]) && file_exists('../app/controllers/' . ucfirst($url[0]) . 'Controller.php')) {
      $this->controller = ucfirst($url[0]) . 'Controller';
      unset($url[0]);
  }
  require_once '../app/controllers/' . $this->controller . '.php';
  $this->controller = new $this->controller;

  // Method
  if (isset($url[1]) && method_exists($this->controller, $url[1])) {
      $this->method = $url[1];
      unset($url[1]);
  }

  // Params
  $this->params = $url ? array_values($url) : [];

  // Run controller, method, and params
  call_user_func_array([$this->controller, $this->method], $this->params);
}

 public function parseUrl(){
  if (isset($_GET['url'])) {
   $url = rtrim($_GET['url'],'/');
   $url = filter_var($url, FILTER_SANITIZE_URL);
   $url = explode('/', $url);
   return $url;
  }
  return [];
 }
}
?>