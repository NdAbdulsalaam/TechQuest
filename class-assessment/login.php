<head>
<?php
    require_once('layout.php');
    require_once('include/navbar.php');
    session_start();
    include("include/config.php");

    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hass_password = md5($password);


        $check_user = mysqli_query($connectdb, "SELECT * FROM `registration` WHERE email = '$email' AND password = '$hass_password'");
        $fetch_info = mysqli_fetch_array($check_user);
        
        if($fetch_info > 0){
            $_SESSION['id'] = $fetch_info['id'];
            $_SESSION['email'] = $fetch_info['email'];
            header('location: dashboard.php');
        }else{
            echo("<script>window.alert('Login details not valid')</script>");
            header("refresh:0 url=login.php");
        }
    }

?>
</head>



<div class="w-50 mb-3 mt-auto ms-auto me-auto">
<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <button type="submit" class="btn btn-primary" name="login">Login</button>
</form>

    <div>
    <p>Don't have an account? <a href="register.php">Register<a></p>
    </div>
</div>