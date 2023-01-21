<?php 
    include 'db_connect.php';
    $email=$_GET['email'];
    $sql="SELECT email FROM student_registration WHERE email='$email'";
    $result=mysqli_query($conn, $sql);
    $num=mysqli_num_rows($result);

    if($num>0){
        echo "emailIdExist";
    }
    else{
        echo "not exist";
    }

?>