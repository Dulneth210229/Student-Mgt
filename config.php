<?php
    //Database connection
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $name = "student";

    try{
        //Create the database connection
        $conn = new mysqli($server, $user, $password, $name, 3308);
        echo "Connected to the database successfully!";
    }catch(mysqli_sql_exception){
        echo "Database connection failed";
    }



?>