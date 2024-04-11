<?php
    $remark = $_GET['remark'];

    if(isset($_GET['submit'])){
        switch($remark){
            case "A":
                echo "Excellent!";
                break;
            case "B":
                echo "Very Good!";
                break;
            case "C":
                echo "Good!";
                break;
            case "D":
                echo "Fair!";
                break;
            default:
                echo "Failed";
        }
    }
?>

<html>
<head>

</head>
<body>
    <div>
        <form method="get">
            <input type="text" placeholder="Type in your grade" name="remark">
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>