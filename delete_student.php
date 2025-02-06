<?php
    include('config.php');

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $id = $_POST['id'];

        if(!$id){
            echo "Invalid Student ID";
            return;
        }

        $sql = "DELETE FROM student WHERE id = $id";

        if(mysqli_query($conn, $sql)){
            echo "Student removed successfully";
        }else{
            echo "Error deleting student" . $id . mysqli_error($conn);
        }

        //Close the database connection
        mysqli_close($conn);

    }else{
        echo "Invalid Request!";
    }
?>