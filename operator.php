<?php
    session_start();
    include('connectdb.php');

    if(isset($_POST['register'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phoneNo = $_POST['phoneNo'];
        $password = $_POST['password'];

        // Convert password to Hash (For more secure data)
        $hash_password = md5($password);

        $insert_into_db = mysqli_query($connectdb, "INSERT INTO `registration` (`fname`, `lname`, `email`, `phoneNo`, `password`) VALUES ('$fname', '$lname', '$email', '$phoneNo', '$hash_password')");

        if($insert_into_db == true){
            echo "<script>window.alert('Successfully Registered!')</script>";
            header("refresh:0 url=register.php");
        }else{
            echo "<script>window.alert('Something went wrong, pls try again!')</script>";
            header("location: register.php");
        }
    }

    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hash_password = md5($password);

        $check_user = mysqli_query($connectdb, "SELECT * FROM `registration` WHERE email='$email' and password='$hash_password'");
        $fetch_info = mysqli_fetch_array($check_user);

        if($fetch_info > 0){
            $_SESSION['id'] = $fetch_info['id'];
            $_SESSION['email'] = $fetch_info['email'];
            header('location: dashboard.php');
        }else{
            echo("<script>window.alert('Login details not valid')</script>");
        }
    }

    if(isset($_POST['update'])){
        $user_id = $_SESSION['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phoneNo = $_POST['phoneNo'];

        $update_info = mysqli_query($connectdb, "UPDATE `registration` SET `fname`='$fname', `lname`='$lname', `email`='$email', `phoneNo`='$phoneNo' WHERE id='$user_id'");

        if($update_info == true){
            echo "<script>window.alert('User Info Successfully Updated!')</script>";
            header("refresh:0 url=preview.php");
        }else{
            echo "<script>window.alert('Something went wrong, pls try again!')</script>";
            header("location: update.php");
        }
    }