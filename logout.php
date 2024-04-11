<?php
    session_start();
    include("connectdb.php");

    if($_SESSION['id'] > 0){
        session_destroy();
        header('location: login.php');
    }