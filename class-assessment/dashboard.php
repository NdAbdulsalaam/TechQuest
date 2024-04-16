<?php
    session_start();
    include('connectdb.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php require_once('layout.php') ?>
</head>
<body>
    <?php
        include("include/navbar.php");
        $userid = $_SESSION['id'];
        $get_info = mysqli_query($connectdb, "SELECT * FROM `registration` WHERE id='$userid'");
        $current_user = mysqli_fetch_array($get_info);
    ?>
    <div class="container card p-5 bg-light my-5">
        <b class="text-danger">Welcome</b>
        <h2>
            <?php
                echo $current_user['fname'] ." " .$current_user['lname'];
            ?>
        </h2>
    </div>

    
    <div>
        <?php include("include/dash-nav.php") ?>
    </div>


    <div class="text-center my-5">
        <a href="logout.php" class="btn btn-danger w-50">Logout</a>
    </div>
</body>
</html>