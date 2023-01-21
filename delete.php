<?php
    include 'db_connect.php';
    $student_id=$_REQUEST['student_id'];
    $course_id=$_REQUEST['course_id'];

    $delete_student_query="DELETE FROM student_registration WHERE student_registration.id='$student_id'";
    
    // if($delete_student_result)
    // {
    //     echo 1;
    // }
    
    $delete_course_query="DELETE FROM student_course WHERE student_id='$student_id'";
    $delete_course_result=mysqli_query($conn, $delete_course_query);
    
    $delete_student_result=mysqli_query($conn, $delete_student_query);

    if($delete_course_result && $delete_student_result){
        echo 1;
        header("location:view.php");
    }
?>