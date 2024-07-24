<!-- views/login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Login</title>
 <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
</head>
<body>
 <div class="container">
  <div class="row justify-content-center">
   <div class="col-md-5">
    <div class="card mt-5">
     <div class="card-header text-center">
      <h2>Login</h2>
     </div>
      <form action="<?= BASEURL; ?>/Users" method="post">
      <input type="hidden" value="login" name="type">
      <?php Messege::flash()?>
       <div class="mb-3">
        <label for="username" class="form-label">Username atau Email</label>
        <input type="text" class="form-control" id="username" name="username/email" >
       </div>
       <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" >
       </div>
       <div class="mb-3">
       <p class="text-center text-muted">Belum memiliki akun? <a href="<?= BASEURL; ?>/Users"
       class="fw-bold text-body"><u>Klik daftar</u></a></p>
       </div>
       <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>
     </div>
    </div>
   </div>
  </div>
 </div>

</body>

</html>