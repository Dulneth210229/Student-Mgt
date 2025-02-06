<?php
    //Import the database configuration file
    include('config.php');

    if($_SERVER["REQUEST_METHOD" === 'POST']){

        $name = $_POST['name'];
        $birth = $_POST['birth'];
        $gender = $_POST['gender'];

        //Age calculation
        $birthDate = new DateTime($birth);
        $today = new DateTime();
        $age = $today->diff($birthDate)->y;

        //Handle file uploads
        if($_FILES['resume']['error'] === UPLOAD_ERR_OK){
            $uploadDir = 'uploads/'; // Folder to store uploaded files
            if(!is_dir($uploadDir)){
                mkdir($uploadDir, 0777, true);//Create the folder if it does not exist
            }

            //Generate q uniq file name
            $fileName = uniqid() . '_' . basename($_FILES['resume']['name']);
            $filePath = $uploadDir . $fileName;

            //Move the uploaded file to the uploads folder
            if(move_uploaded_file($_FILES['resume']['tmp_name'], $filePath)){

                //Insert data into database
                $sql = "INSERT INTO emp_table (name, birth, age, gender, resume) VALUES ('$name', '$birth', $age, '$gender', '$filePath')";

                if (mysqli_query($conn, $sql)){
                    echo "Student Added Successfully";
                }else{
                    echo "Error Adding Student : " . mysqli_error($conn);
                }
                
            }else{
                echo "Error Uploading resume";
            }
        }

    }else{
        echo "Invalid request";
    }
?>