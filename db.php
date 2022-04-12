<?php

    $db = new PDO('mysql:host=localhost;dbname=projetweb', 'amine', 'root');


    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>