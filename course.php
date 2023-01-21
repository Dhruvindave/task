<!-- php -->
<?php 
    include 'db_connect.php';
    $result='';
    $exist=2;
    // $course='';
  
?>
<?php 
    // if(($_POST['submit'])){
        if(isset($_POST['course'])){
        $course=$_POST['course'];
    
        
        $exist_course="SELECT * FROM course WHERE course_name='$course'";
        $exist_result=mysqli_query($conn, $exist_course);
        $exist_num=mysqli_num_rows($exist_result);

        //  echo $exist_num;
        // $=$_GET['name'];
        // echo $exist_num."<br>";
        // if($exist_num>0){
        //     echo "10";
        // }
        if($exist_num==0)
        {
            $insert_query="INSERT INTO `course`(`course_name`) VALUES ('$course')";
            $result=mysqli_query($conn, $insert_query);
            echo 1;
        }
        else{
            echo 0;
        }
    }    
?>
<!-- /php -->






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

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <!-- /jquery -->


    <!-- style -->
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <!-- navbar -->
    <?php include 'partials/navbar.php';?>
    <!-- /navbar -->

    <!-- Response of form -->
    <div id="response"></div>
    <!-- /Response of form -->
    
    <!-- Form -->
    <div class="container main-container my-5">
        <h2 class="col-md-6">Enter Course Name</h2>
        <form id="course_form" method="" class="col-md-6 col-lg-8">


            <div class="my-4">
                <div class="course">
                    <div class="mb-3 mt-5 form-div">
                        <label for="course" class="form-label">Insert Course</label>
                        <div class="mb-3 form-div form-group">
                            <input type="text" required name="course" placeholder="C/CPP/RUBE/NODE...."
                                class="input form-control" id="course" aria-describedby="emailHelp">
                        </div>

                    </div>
                </div>

                <?php if($exist==1){echo '<p style="color:red">Course already exist</p>';}?>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- /Form -->

    <!-- Total inserted course -->
    <!-- <div class="table_button" id="table_button">
        <button id="table_button" class="btn btn-dark">Check inserted course</button>
    </div> -->
    <div id="tableCourseData">
    <div class="table mt-5 table-responsive" style="text-align:center;">
        <table class="table table-striped">
            <h2 class="my-4 col-md-6 col-lg-8" style="text-align:left;">Inserted course</h2>
            <thead class="form-div">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Course name</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody id="tbody">
              
            </td>
            </tbody>
        </table>
    </div>
    </div>
    <!-- /Total inserted course -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="jquery.js"></script>
    <script>

    </script>
</body>

</html>