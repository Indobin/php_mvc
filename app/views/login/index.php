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
   <div class="col-md-6">
    <div class="card mt-5">
     <div class="card-header text-center">
      <h2>Login</h2>
     </div>
     <div class="card-body">
      <?php if (isset($error)) { ?>
      <div class="alert alert-danger" role="alert">
       <?php echo $error; ?>
      </div>
      <?php } ?>
      <form action="<?= BASEURL; ?>/login/auth" method="post">
       <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
       </div>
       <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
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