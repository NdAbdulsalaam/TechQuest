<?php 
    define("DATA_SERVER", "localhost");
    define("DATA_USER", "root");
    define("DATA_PASS", "");
    define("DATA_NAME", "tqclassdb");

    $connectdb = mysqli_connect(DATA_SERVER, DATA_USER, DATA_PASS, DATA_NAME);

    if($connectdb != true) {
        echo "Ops! Something went wrong";
    }
