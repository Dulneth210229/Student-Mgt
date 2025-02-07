<?php
    include('config.php');

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        //get the form data to be update
        $id = $_POST['id'];
        $name = $_POST['name'];
        $birth = $_POST['birth'];
        $gender = $_POST['gender'];

        //calculate the age using birth date
        $birthDate = new DateTime($birth);
        $today = new DateTime();
        $age = $today->diff($birthDate)->y;

        //Handle file upload (if a new resume is provided)
        $filePath = null;

        if($_FILES['resume']['error'] === UPLOAD_ERR_OK){
            $uploadDir = 'uploads/'; //Directory to store uploads file
            if(!is_dir($uploadDir)){
                mkdir($uploadDir, 0777, true); //Create the new directory if it does not exist
            }

            $fileName = uniqid() . '_' . basename($_FILES['resume']['name']);
            $filePath = $uploadDir . $fileName;

            if(!move_uploaded_file($_FILES['resume']['tmp_name'], $filePath)){

                echo "Error uploading resume";
                exit;
            }
        }

        //Upload data in the database
        if($filePath){
            //If a new resume uploaded,
            $sql = "UPDATE student SET name = '$name', birth = '$birth', age = $age, gender = '$gender', resume = '$filePath' WHERE id = $id";
        }else{
            //If no resume uploaded
            $sql = "UPDATE student SET name = '$name', birth = '$birth', age = $age, gender = '$gender' WHERE id = $id";
        }

        if(mysqli_query($conn, $sql)){
            echo "Student Updated successfully";
        }else{
            echo "Update Student error!" . mysqli_error($conn);
        }

        mysqli_close($conn);

    }else{
        echo "Invalid request";
    }
?>