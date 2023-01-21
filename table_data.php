<?php
    include 'db_connect.php'; 
    $toatal_course_query="SELECT * FROM course";
    $toatal_course_result=mysqli_query($conn, $toatal_course_query);

    // student assigned course
  $total_course_row= mysqli_fetch_all($toatal_course_result,MYSQLI_ASSOC);

  echo json_encode($total_course_row);

    
?>