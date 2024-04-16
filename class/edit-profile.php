<?php
    session_start();
    include('connectdb.php');
?>

<head>
    <?php require_once('layout.php') ?>
    <style>

    </style>
</head>


<div class="container my-5">
    <?php 
        $user_id = $_SESSION["id"];
        $get_info = mysqli_query($connectdb, "SELECT * FROM `registration` WHERE id = '$user_id'" );
        $current_user = mysqli_fetch_array($get_info);
    ?>

    <form method="post" action="operator.php" class="mt-auto me-auto ms-auto w-50">
        <fieldset>
            <legend class="float-none w-auto p-2"><h3><i>Edit Profile</i></h3></legend>
        <div class="mb-3">
            <label class="form-label">First Name</label>
            <input type="text" class="form-control" name="fname" value="<?php echo $current_user['fname'] ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Last Name</label>
            <input type="text" class="form-control" name="lname" name="fname" value="<?php echo $current_user['lname'] ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" class="form-control" name="email" name="fname" value="<?php echo $current_user['email'] ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="text" class="form-control" name="phoneNo" name="fname" value="<?php echo $current_user['phoneNo'] ?>">
        </div>
        <button class="btn btn-primary" name="update">Update</button>
        </fieldset>
    </form>
</div>


    <div>
        <?php include('include/dash-nav.php') ?>
    </div>

    <div class="text-center my-5">
        <a href="logout.php" class="btn btn-danger w-50">Logout</a>
    </div>