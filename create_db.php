<?php
    //Connecting to the database
    $servername = "localhost";
    $username = "root";
    $password = "";

    //Create a connection
    $conn = mysqli_connect($servername, $username, $password);

    // Create a db
    $sql = "CREATE DATABASE `try`";
    $result = mysqli_query($conn, $sql);

    // Check for db success
    if($result)
    {
        echo "Database was created successfully.";
    }
    else{
        echo "Database was not created, because of this error---> ". mysqli_error($conn);
    }
    
?>