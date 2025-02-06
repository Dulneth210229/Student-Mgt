<?php
    include('config.php');

    //set the content-type header to json
    header('Content-Type: application/json');

    //SQL statement to get data from the database
    $sql = "SELECT * FROM student";

    $result = mysqli_query($conn, $sql);

    if(!$result){
        die("Error fetching students" . mysqli_error($conn));
    }

    //Fetch all rows as an associative array
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //Encoded result as json and output it
    echo json_encode($rows);

    //Free the result set
    mysqli_free_result($result);

    //Close the connection
    mysqli_close($conn);

?>