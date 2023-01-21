<?php
    include 'db_connect.php';
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