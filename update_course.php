<!-- php -->
<?php 
    include 'db_connect.php';
    $result='';
    $exist=2;
  
?>
<?php 
            
            $course_id=$_GET['course_id'];
                        
        if(isset($_POST['submit'])){
            $course=$_POST['course_name'];
            $exist_course="SELECT * FROM course WHERE course_name='$course'";
            $exist_result=mysqli_query($conn, $exist_course);
            $exist_num=mysqli_num_rows($exist_result);
         echo $exist_num;
        if($exist_num==0)
        {
            $update_query="UPDATE `course` SET `course_name`='$course' WHERE id='$course_id'";
            $result=mysqli_query($conn, $update_query);
            header("location:course.php");
               
        }
        else{
            $exist=1;
        }
    }    

?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Selection</title>


    <script src="https://kit.fontawesome.com/22ad683826.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


    <!-- style -->
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <!-- navbar -->
    <?php include 'partials/navbar.php';?>
    <!-- /navbar -->
    
    
    <?php 
        // if($result==1){
        // echo '<div class="alert alert-success" role="alert">
        //     <strong>Course added Successfully</strong>You can select course by clicking
        //     </div>';
        // }
        // else if($row>0){
        //     echo '<div class="alert alert-warning" role="alert">
        //     <strong>Warning.... Course not added succesfully</strong>Please resubmit form to select course.
        //     </div>';
        // }
    ?>

    <!-- Form -->
        <div class="container main-container my-5">
            <h2 class="my-4 heading">Enter Course Name</h2>
            <form method="post" class="form-container">


                <div class="my-4">
                    <div class="course">
                        <div class="mb-3 mt-5 form-div">
                            <label for="course" class="form-label">Insert Course</label>
                            <div class="mb-3 form-div form-group">
                                <input type="text" required name="course_name" class="input form-control" id="course"
                                    aria-describedby="emailHelp">
                            </div>

                        </div>
                    </div>

                    <?php if($exist==1){echo '<p style="color:red">Course already exist</p>';}?>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    <!-- /Form -->
