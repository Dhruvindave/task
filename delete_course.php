<?php 
    include 'db_connect.php';
    $course_id= $_GET['course_id'];
    $assigned_course="SELECT COUNT(*)student_id FROM student_course WHERE course_id='$course_id'";
   
    $assigned_result=mysqli_query($conn, $assigned_course);
    $assigned_row=mysqli_fetch_assoc($assigned_result);
    $assigned_num=$assigned_row['student_id'];
   if($assigned_num>0){
        echo "This course is assigned to students so it can't be delete.";
   }
   else{
        $sql="DELETE FROM course WHERE id='$course_id'";
        $result=mysqli_query($conn, $sql);
        if($result){
            echo "deleted";
            // header("location:course.php");
        }
        else{
            echo "error";
        }
    }
?>
