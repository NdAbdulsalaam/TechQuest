<?php

    class Greeting {
       function sayHello(){
        echo "Hello Abdulsalaam";
       } 
    
       function sayHi(){
        echo "Hi Abdulsalaam";
       } 
    }

    $greet_me = new Greeting();
    $greet_me -> sayHello();
    echo '<br>';
    
    $greet_me -> sayHi();
    echo '<br>';