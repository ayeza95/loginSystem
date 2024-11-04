<?php
    //Connecting to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "try";

    //create a connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Die if connection was not successful
    if(!$conn){
        die("sorry we failed to connect : ". mysqli_connect_error());
    }
    else{
        echo "Connectin was succesfully";
    }
    echo "<br>";


 // Create a table in db

 $sql = " CREATE TABLE `try` (`sno` INT(100) NOT NULL AUTO_INCREMENT , `name` VARCHAR(100) NOT NULL , `Phone Number` CHAR(10) NOT NULL , `Date of Birth` DATE NOT NULL , `Gender` VARCHAR(50) NOT NULL , `Username` VARCHAR(50) NOT NULL , `Email` VARCHAR(100) NOT NULL , `Password` VARCHAR(50) NOT NULL , `Confirm Password` VARCHAR(50) NOT NULL , PRIMARY KEY (`sno`))";
    $result = mysqli_query($conn, $sql);

    // Check for table success
    if($result)
    {
        echo "Table created successfully.";
    }
    else{
        echo "Table was not created, because of this error---> ". mysqli_error($conn);
    }

?>