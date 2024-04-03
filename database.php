<?php
    define("DB_SERVER", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "techquestdb");

    $connectdb = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    if($connectdb == true){
        echo "Database connected";
    }else{
        echo "Unable to connect to database";
    }

