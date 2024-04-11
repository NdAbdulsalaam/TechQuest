<?php
    include("connectdb.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Preview Data</title>
</head>
<body>
    <?php
        $get_info = mysqli_query($connectdb, "SELECT * FROM `registration` WHERE 1");
        while($fetch = mysqli_fetch_array($get_info)){
    ?>
    <div>
        <h1><?php echo $fetch['id'] ?></h1>
        <p><?php echo $fetch['name'] ?></p>
        <p><?php echo $fetch['email'] ?></p>
    </div>
    <hr>
    <?php } ?>

    <a href="update.php">Update User Informations</a>
</body>
</html>