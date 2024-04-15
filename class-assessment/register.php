<head>
<?php 
    require_once('layout.php');
    include("include/config.php");

    if(isset($_POST['register'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phoneNo = $_POST['phoneNo'];
        $password = $_POST['password'];

    $hash_password = md5($password);

    $insert_data = mysqli_query($connectdb, "INSERT INTO `registration` (`fname`, `lname`, `email`, `phoneNo`, `password`) VALUES ('$fname', '$lname', '$email', '$phoneNo', '$hash_password')");

    if($insert_data == true){
        echo "<script>window.alert('Successfully Registered!')</script>";
        header("refresh:0 url=login.php");
    }else{
        echo "<script>window.alert('Something went wrong, pls try again!')</script>";
        header("location: register.php");
    }
}
?>

</head>

    <?php require_once('include/navbar.php') ?>

<div class="w-50 mb-3 mt-auto ms-auto me-auto">
    <form method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">First Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="fname">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" >Last Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="lname">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
        </div>
        <div class="mb-3">
            <label for="exam" class="form-label" >Phone Number</label>
            <input type="text" class="form-control" name="phoneNo">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
            <button type="submit" class="btn btn-primary" name="register">Register</button>
    </form>

        <p>You already have an account? <a href="login.php">Login<a></p>
    </div>