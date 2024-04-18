<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"</script>  
<script src="https://kit.fontawesome.com/3df60fe6e2.js" crossorigin="anonymous"></script>


<?php 

    // Check if the user is not logged in and is not on the login page
    if (empty($_SESSION['id']) || $_SESSION['id'] < 1) {
        // Check if the current page is not the login page
        if (basename($_SERVER['PHP_SELF']) !== 'login.php' && basename($_SERVER['PHP_SELF']) !== 'register.php') {
            header("location: login.php");
            exit();
        }
    }
?>