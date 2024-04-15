<?php 
    define("DB_SERVER", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "tqclassdb");

    $connectdb = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    if($connectdb != true) {
        echo "Ops! Something went wrong";
    }
