<?php
    session_start();
    include('connectdb.php');

    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hash_password = md5($password);

        $check_user = mysqli_query($connectdb, "SELECT * FROM `registration` WHERE email='$email' AND password='$hash_password'");
        $current_user = mysqli_fetch_array($check_user);

        if($current_user > 0){
            $_SESSION['id'] = $current_user['id'];
            $_SESSION['email'] = $current_user['email'];
            header('location: dashboard.php');
        }else{
            echo("<script>window.alert('Login details not valid')</script>");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <?php require_once('layout.php') ?>
</head>
<body class="bg-light">
    <div class="container" style="margin-top: 7rem;">
        <form method="post" class="w-50 mt-auto me-auto ms-auto">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="login">Login</button>
        </form>
    </div>
</body>
</html>