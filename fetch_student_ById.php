<?php
    include('config.php');

    //Set the content type to json
    header('Content-Type : application/json');

    if(isset($_GET['id'])){

        $id = $_GET['id'];

        //Fetch Student By Id
        $sql = "SELECT * FROM student WHERE id = $id";

        $result = mysqli_query($conn, $sql);

        if($result && mysqli_num_rows($result) > 0){
            $student = mysqli_fetch_assoc($result);
            echo json_encode($student);
        }else{
            echo json_encode(['error' => 'Employee Not found']);
        }
    }else{
        echo "Invalid request";
    }


?>