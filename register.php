<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <?php require_once('layout.php') ?>
</head>
<body>
    <?php include('include/navbar.php') ?>
    <div class="container my-5">
        <form method="post" action="operator.php" class="mt-auto me-auto ms-auto w-50">
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" name="fname">
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lname">
            </div>
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="phoneNo">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button class="btn btn-primary" name="register">Register</button>
            <p>Already have an account, <a href="login.php">Login?</a>
        </form>
    </div>
</body>
</html>