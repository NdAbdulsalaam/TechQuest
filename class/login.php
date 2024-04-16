<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <?php require_once('layout.php') ?>
</head>
<body class="bg-light">
    <div class="container" style="margin-top: 7rem;">
        <form method="post" action="operator.php" class="w-50 mt-auto me-auto ms-auto">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="login">Login</button>
            <p>I don't have an account, <a href="register.php">Resgister?</a>
        </form>
    </div>
</body>
</html>