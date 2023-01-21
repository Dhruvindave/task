<?php include 'db_connect.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View details</title>
    <script src="https://kit.fontawesome.com/22ad683826.js" crossorigin="anonymous"></script>
    <!-- Custom stlylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
    .main-container {}
    </style>
    <!-- style -->
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <!-- navbar -->
    <?php include 'partials/navbar.php';?>


    <div class="m-5 p-5">
        
            <h1>See Details</h1>
       
        <div class="table mt-5 table-responsive">
            <table class="table table-striped ">

                <thead class="form-div">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Course</th>
                        <th scope="col">Address</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Gender</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        // $sql="SELECT student_registration.*,student_course.course_id,course.course_name FROM student_registration,student_course,course WHERE student_course.course_id=course.id AND student_registration.id=student_course.student_id";
                        $sql = "SELECT student_registration.*,student_course.course_id,course.course_name FROM student_registration LEFT JOIN student_course ON student_registration.id=student_course.student_id LEFT JOIN course ON student_course.course_id=course.id;";
                        
                        $result=mysqli_query($conn, $sql);
                                    while($row=mysqli_fetch_assoc($result)){
                                        echo'<tr>
                                            <td>'.$row['id'].'</td>
                                            <td>'.$row['name'].'</td>
                                            <td>'.$row['email'].'</td>
                                            <td>'.$row['course_name'].'</td>
                                            <td>'.$row['address'].'</td>
                                            <td>'.$row['mobile'].'</td>
                                            <td>'.$row['radio'].'</td>
                                            <td><a href="update.php?student_id='.$row['id'].'" class="btn btn-sm btn-warning">Update</a></td>
                                            <td><a href="delete.php?student_id='.$row['id'].'&course_id='.$row['course_id'].'" class="btn btn-sm btn-danger">Delete</a></td>
                                        </tr>';
                                }
                    ?>
                    

                </tbody>
            </table>
        </div>
    </div>

</body>

</html>