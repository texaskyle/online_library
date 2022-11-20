<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbName = 'online_library';
    $conn = mysqli_connect($host, $username, $password, $dbName);

    // checking if the database connected 
     if(!$conn){
    die("connection to the database failed: " . mysqli_connect_error());
     }else{
        echo "connection to the database successful<br>";
     }
