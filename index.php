<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Mgt</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<style>
    body{
        font-family: "Poppins", serif;
        font-weight: 500;
        font-style: normal;
        background-color:rgb(242, 242, 242);
    }
    h1{
        text-align: center;
    }
    #studentForm{
       display: none;
        max-width: 500px;
        padding: 1rem;
        border-radius: 1rem;
        margin: 1.5rem auto 0 auto;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        
    }
    #studentForm input{
        width: 450px;
        padding: 0.5rem;
        border-radius: 0.5rem;
        border: 1px solid slategray;
        margin: 0 auto;
    }
    #studentForm button{
        width : 470px;
        color: white;
        font-weight: 400;
        padding: 0.5rem;
        background-color: lime;
        border: 1px solid lime;
        border-radius:  0.5rem;
    }
    /*Update form*/
    #studentUpdateForm{
       display: none;
       max-width: 500px;
       padding: 1rem;
       border-radius: 1rem;
       margin: 1.5rem auto 0 auto;
       box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
       
   }
   #studentUpdateForm input{
       width: 450px;
       padding: 0.5rem;
       border-radius: 0.5rem;
       border: 1px solid slategray;
       margin: 0 auto;
   }
   #studentUpdateForm button{
       width : 470px;
       color: white;
       font-weight: 400;
       padding: 0.5rem;
       background-color: lime;
       border: 1px solid lime;
       border-radius:  0.5rem;
   }
</style>
</head>
<body>
    <h1>Student Management System</h1>
    <hr>
    <!--Add student modal-->
    <form id="studentForm" enctype="multipart/form-data">
        <label for="name">Name :</label><br>
        <input type="text" name="name" id="name" required><br><br>

        <label for="birth" >Birth Date</label><br>
        <input type="date" name="birth" id="birth" required><br><br>

        <label for="resume">Resume</label><br>
        <input type="file" name="resume" id="resume" accept=".pdf" required><br><br>

        <button type="submit">Add Student</button>

    </form>

    <!--Update student modal-->
    <form id="studentUpdateForm" enctype="multipart/form-data">
        <label for="updateName">Name :</label><br>
        <input type="text" name="updateName" id="updateName" required><br><br>

        <label for="updateBirth" >Birth Date</label><br>
        <input type="date" name="updateBirth" id="updateBirth" required><br><br>

        <label for="updateResume">Resume</label><br>
        <input type="file" name="updateResume" id="updateResume" accept=".pdf" required><br><br>

        <button type="submit">Update Student</button>
        <button id="close" style="background-color: yellow; margin-top: 1rem ;border: none" >Close The Form</button>

    </form>

    <!--Data Table-->
   <table id="studentTable" class="display" style="width: 100%; margin-top: 5rem;">
    <thead>
        <th>Student ID</th>
        <th>Name</th>
        <th>Birth Date</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Resume</th>
        <th>Action</th>
    </thead>
    <tbody>
        <!--Data will be loaded here via AJAX-->
    </tbody>
   </table>
   <script>
    $(document).ready(function(){
        //Initialize the data table
        var dataTable = $('#studentTable').dataTable({
            ajax: {
                url:'fetch_employees.php',
                dataSrc: '',
            
            },
            columns: [
                {data : 'id'},
                {data: 'name'},
                {data : 'birth'},
                {data : 'age'},
                {data: 'gender'},
                {data : 'resume',
                    render: function(data, type, row){
                        if(data){
                            return `<a href="${data}" target = "_blank"> View Resume </a>`
                        }else{
                            return "No resume uploaded";
                        }
                    }
                },
                {data : null,
                    render:  function(data, type, row){
                        //create Delete and update 
                        return `<button class="btn-delete" data-id="${data.id}">Remove Student</button> 
                        <button class="btn-update" data-id="${data.id}">Update Student</button> `
                    }
                }
            ]
        });

        //Handle Data Submission

        //Update Handle

        //Delete handle
    })
    </script>
</body>
</html>