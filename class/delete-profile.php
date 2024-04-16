<?php
    session_start();
    include("connectdb.php");

    if($_SESSION['id'] > 0){
        $user_id = $_SESSION['id'];
        $delete_user = mysqli_query($connectdb, "DELETE FROM `registration` WHERE id='$user_id'");
        echo "<script>window.alert('User Info Successfully deleted!')</script>";
        header("refresh:0 url=login.php");
    }else{
            echo "<script>window.alert('Something went wrong, kindly login!')</script>";
            header("refresh:0 url=login.php");
        session_destroy();
        header('location: login.php');
    }