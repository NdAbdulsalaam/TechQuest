<?php
    include("connectdb.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Info</title>
</head>
<body>
    <?php
        $get_info = mysqli_query($connectdb, "SELECT * FROM `registration` WHERE 1");
        while($current_user = mysqli_fetch_array($get_info)){
    ?>
    <div>
        <h2><?php echo $current_user['fname'] ." " .$current_user['lname'] ?></h2>
        <p><?php echo $current_user['email'] ?></p>
        <p><?php echo $current_user['phoneNo'] ?></p>
    </div>
    <hr>
    <?php } ?>

    <a href="update.php">Update User</a>
</body>
</html>