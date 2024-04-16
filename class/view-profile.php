<?php
    session_start();
    include('connectdb.php');
?>

<head>
    <?php require_once('layout.php') ?>
    <style>
        table td,th{
            padding: 10px;
        }
    </style>
</head>

<div class="container p-5 my-5">
    <?php
        $userid = $_SESSION['id'];
        $get_info = mysqli_query($connectdb, "SELECT * FROM `registration` WHERE id='$userid'");
        $current_user = mysqli_fetch_array($get_info);
    ?>
    <table style="width: 60%;" class="table-striped table-bordered p-2">
        <tr class="bg-danger text-light">
           <td colspan="2"><h3><?php echo $current_user['fname'] ." " .$current_user['lname'] ?>'s Profile</h3></td>
        </tr>

        <tr>
            <th>First Name</th>
            <td><?php echo $current_user['fname'] ?></td>
        </tr>

        <tr>
            <th>Last Name</th>
            <td><?php echo $current_user['lname'] ?></td>
        </tr>

        <tr>
            <th>Email</th>
            <td><?php echo $current_user['email'] ?></td>
        </tr>

        <tr>
            <th>Contact</th>
            <td><?php echo $current_user['phoneNo'] ?></td>
        </tr>
    </table>
</div>

<div>
        <?php include('include/dash-nav.php') ?>
    </div>

    <div class="text-center my-5">
        <a href="logout.php" class="btn btn-danger w-50">Logout</a>
    </div>