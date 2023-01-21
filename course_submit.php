<?php 
     
    // if(isset($_POST['submit'])){
        include 'db_connect.php';
        $course=$_POST['course'];
        
        $exist_course="SELECT * FROM course WHERE course_name='$course'";
        $exist_result=mysqli_query($conn, $exist_course);
        $exist_num=mysqli_num_rows($exist_result);

        //  echo $exist_num;
        // $=$_GET['name'];
         $exist_num;
        if($exist_num==0)
        {
            $insert_query="INSERT INTO `course`(`course_name`) VALUES ('$course')";
            $result=mysqli_query($conn, $insert_query);
            if($result){
             echo 1;
            }
            else{
                echo 0;
            }
        }
        else{
            echo -1;
        }
        
        
    // }    
?>