<?php

session_start();
include('include/config.php');

if(!isset($_SESSION['id']) ||  $_SESSION['id'] < 1){
    header("location: login.php");
    exit();
}

    if($_SESSION['id'] > 0 ){
        echo "<script>confirm('Are you sure you want to logout?')</script>";
        // echo "<script>window.alert('You have successfully logged out?')</script>";
        session_destroy();
        header("refresh: 0 url=login.php");

    }