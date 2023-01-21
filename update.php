<?php 
    include 'db_connect.php';

    if(isset($_GET['student_id'])){
       $student_id=$_GET['student_id'];
       $result=2; 

       $data_sql = "SELECT student_registration.*,student_course.course_id,student_course.student_id,course.course_name FROM student_registration LEFT JOIN student_course ON student_registration.id=student_course.student_id LEFT JOIN course ON student_course.course_id=course.id WHERE student_registration.id='$student_id'";
       $data_result=mysqli_query($conn, $data_sql);
        $data_row=mysqli_fetch_assoc($data_result);
        // var_dump($data_row);
        $course_id=$data_row['course_id'];
        // fetching data from post
    }
    if(isset($_POST['name'])){
        $student_id=$_POST['student_id'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        $course_code=$_POST['course_code'];
        $phone=$_POST['phone'];
        $country=$_POST['country'];
        $state=$_POST['state'];
        $city=$_POST['city'];
    
        $update_query="UPDATE student_registration SET name='$name',email='$email',address='$address',mobile='$phone',country='$country',state='$state',city='$city' WHERE id='$student_id'";
        $update_result=mysqli_query($conn, $update_query);

        // update course
            $qwu="UPDATE `student_course` SET `course_id`='$course_code' WHERE student_id='$student_id'";
            $sec_update=mysqli_query($conn, $qwu);
            if($sec_update)
            {
                // header("location:view.php");
            }
        // update course over
        
        if($update_result==1){
            $result=1;
        }
        else if($update_result==0){
            $result=0;
        }
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <script src="https://kit.fontawesome.com/22ad683826.js" crossorigin="anonymous"></script>
    <!-- Custom stlylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


    <!-- style -->
    <link rel="stylesheet" href="index.css">

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <!-- /jquery -->
</head>

<body>
    <!-- navbar -->
    <?php include 'partials/navbar.php';?>
    <!-- /navbar -->

    <?php 
        if($result==1){
        echo '<div class="alert alert-success" role="alert">
            <strong>Update Successfully</strong>You can see updated details by clicking <a href="view.php">here</a>
            </div>';
        }
        else if($result==0){
            echo '<div class="alert alert-warning" role="alert">
            <strong>Warning.... Update not succesfully</strong>Please resubmit form to update information.
            </div>';
        }
    ?>



    <!--Update Form -->

    <div class="container my-5">
        <form id="updateStudentForm" action='' class="container col-lg-8">
            <h2 class="mb-5">Student Registration Form</h2>
            <div class="col-md-6">
                <div class="mb-3 form-div form-group">
                    <input required type="hidden" class="input form-control" name="student_id" id="student_id"
                        value="<?php echo $data_row['id'];?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3 form-div form-group">
                        <label for="name" class="form-label">Name</label>
                        <input required type="text" class="input form-control" name="name" id="name"
                            value="<?php echo $data_row['name'];?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 form-div form-group">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" required name="email" class="input form-control" id="email"
                            aria-describedby="emailHelp" value="<?php echo $data_row['email'];?>">
                    </div>
                </div>
            </div>




            <div class="mb-3 form-div form-group">
                <label for="address" id="floatingTextarea" class="form-label">Address</label>
                <textarea class="form-control input" required name="address" placeholder="Type Your address"
                    id="floatingTextarea"> <?php echo $data_row['address'];?></textarea>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3 form-div form-group">
                        <label class="form-check-label" for="exampleCheck1">Course</label><br>
                        <select class="form-select input" required name="course_code"
                            aria-label="Default select example">
                            <!-- selected course query -->
                            <?php       
                                $selected_course_que="SELECT * FROM course WHERE id=".$data_row['course_id'];
                                $course_que_result=mysqli_query($conn, $selected_course_que);
                                $course_selected_row=mysqli_fetch_assoc($course_que_result);

                            ?>
                            <!-- /selected course query -->
                            <option selcted value="<?php echo $course_selected_row['id'];?>">
                                <?php echo $course_selected_row['course_name'];?></option>
                            <?php 
                                $quw1="SELECT * FROM course";
                                    $req1=mysqli_query($conn, $quw1);
                                    while($row1=mysqli_fetch_assoc($req1)){
                                    if($course_selected_row['id']== $row1['id']){
                                        continue;
                                    }
                                    echo '<option value="'.$row1['id'].'">'.$row1['course_name'].'</option>';
                                    }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3 form-div form-group">
                        <div class="country-code">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" required class="form-control input" name="phone" id="phone"
                                placeholder="9979568684" value="<?php echo $data_row['mobile'];?>">
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3 form-div form-group">
                        <label for="country" class="form-label">Country</label>
                        <select class="form-select input" required name="country" onchange="showState(this.value)"
                            aria-label="Default select example">
                            <!-- selected country query -->
                            <?php       
                                    $selected_con_que="SELECT * FROM select_country WHERE id=".$data_row['country'];
                                    $con_que_result=mysqli_query($conn, $selected_con_que);
                                    $country_selected_row=mysqli_fetch_assoc($con_que_result);
                                
                                ?>
                            <!-- /selected country query -->

                            <option selected value="<?php echo $country_selected_row['id'];?>">
                                <?php echo $country_selected_row['country_name'];?></option>
                            <?php 
                                $sql="SELECT * FROM select_country";
                                $result_country=mysqli_query($conn, $sql);
                                while($country_row=mysqli_fetch_assoc($result_country)){
                                    if($country_row['country_name']==$country_selected_row['country_name'])
                                    {
                                        continue;
                                    }
                                    echo '<option value="'.$country_row['id'].'">'.$country_row['country_name'].'</option>'; 
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3 form-div form-group">
                        <label for="State" class="form-label">State</label>
                        <select class="form-select input" required id="txtHint" name="state"
                            onchange="showCity(this.value)" aria-label="Default select example">
                            <!-- selected state query -->
                            <?php       
                                $selected_state_que="SELECT * FROM select_state WHERE id=".$data_row['state'];
                                $state_que_result=mysqli_query($conn, $selected_state_que);
                                $state_selected_row=mysqli_fetch_assoc($state_que_result);
                                
                            ?>
                            <!-- /selected state query -->
                            <option selected value="<?php echo $state_selected_row['id'];?>">
                                <?php echo $state_selected_row['state_name'];?></option>
                                <?php 
                                    $sql="SELECT * FROM select_state";
                                    $result_state=mysqli_query($conn, $sql);
                                    while($state_row=mysqli_fetch_assoc($result_state)){
                                        if($state_row['state_name']==$state_selected_row['state_name'])
                                        {
                                            continue;
                                        }
                                        echo '<option value="'.$state_row['id'].'">'.$state_row['state_name'].'</option>'; 
                                    }
                                ?>
                                
                        </select>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="mb-3 form-div form-group">
                        <label for="City" class="form-label ">City</label>
                        <select class="form-select" id="txtHint1" name="city" aria-label="Default select example">

                            <!-- selected state query -->
                            <?php       
                                $selected_city_que="SELECT * FROM select_city WHERE id=".$data_row['city'];
                                $city_que_result=mysqli_query($conn, $selected_city_que);
                                $city_selected_row=mysqli_fetch_assoc($city_que_result);
                                
                            ?>
                                <?php 
                                    $sql="SELECT * FROM select_city";
                                    $result_city=mysqli_query($conn, $sql);
                                    while($city_row=mysqli_fetch_assoc($result_city)){
                                        if($city_row['city_name']==$city_selected_row['city_name'])
                                        {
                                            continue;
                                        }
                                        echo '<option value="'.$city_row['id'].'">'.$city_row['city_name'].'</option>'; 
                                    }
                                ?>

                            <!-- /selected state query -->
                            <option selected value="<?php echo $city_selected_row['id'];?>">
                                <?php echo $city_selected_row['city_name'];?></option>
                        </select>
                    </div>
                </div>
            </div>





            <button id="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- /Update Form -->




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="jquery.js"></script>
    <script>
    $("#updateStudentForm").submit(function(ev) {
        ev.preventDefault();
        var form = $("#updateStudentForm");
        $.ajax({
            type: 'POST',
            url: 'update.php',
            data: form.serialize(),
            success: function(data) {
                if (data) {
                    // alert("submit");
                 var c=confirm("Form submitted do you want to go to Details page");
                    if(c){
                        $(location).attr('href','view.php');
                    }
                    
                } else {
                    alert("Form not submitted");
                }
            },
            error: function(data) {
                alert("ajax error");
            }
        });
    });
    </script>
</body>

</html>