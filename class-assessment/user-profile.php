<?php 

  session_start();
  include('include\config.php'); 

if(!isset($_SESSION['id']) ||  $_SESSION['id'] < 1){
  header("location: login.php");
  exit();
}

    require_once('layout.php');
    include('include/navbar.php');
    $user_id = $_SESSION['id'];
    $fetch_info = mysqli_query($connectdb, "SELECT * FROM `registration` WHERE id = '$user_id'");
    $current_user = mysqli_fetch_array($fetch_info);

?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Label</th>
      <th scope="col">Value</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>First Name</td>
      <td><?php echo $current_user['fname'] ?></td>
    </tr>
    <tr>
      <td>Last Name</td>
      <td><?php echo $current_user['lname'] ?></td>
    </tr>
    <tr>
      <td>Email Address</td>
      <td><?php echo $current_user['email'] ?></td>
    </tr>
    <tr>
      <td>Phone Number</td>
      <td><?php echo $current_user['phoneNo'] ?></td>
    </tr>
  </tbody>
</table>

<?php require_once('include/dash-navbar.php') ?>
