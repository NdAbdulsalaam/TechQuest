<head>
<?php require_once('layout.php') ?>
</head>

    <?php require_once('include/navbar.php') ?>

<div class="w-50 mb-3 mt-auto ms-auto me-auto">
<form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>

    <div>
    <p>Don't have an account? <a href="register.php">Register<a></p>
    </div>
</div>