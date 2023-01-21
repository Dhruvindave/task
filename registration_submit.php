<?php 
    include 'db_connect.php';
    $result='';
    $country_code='';
    $exist=false;
    $check=0;
    // if(isset($_POST['submit'])){
            $course_code=$_POST['course_code'];
         $name=$_POST['name'];
         $email=$_POST['email'];
         $address=$_POST['address'];
         $phone=$_POST['phone'];
         $country_code=$_POST['country_code'];
         $country=$_POST['country'];
         $state=$_POST['state'];
         $city=$_POST['city'];
         $sem=$_POST['radio'];
         if(isset($_POST['check'])){
           $check=$_POST['check'];
            if($check=="on")
            {
                $check=1;
            }
            $check;
        }
         $password=$_POST['password'];
         $cpassword=$_POST['cpassword'];
            $sql="SELECT * FROM student_registration WHERE name='$name'";
            $result1=mysqli_query($conn, $sql);
            $num=mysqli_num_rows($result1);
        $num;
           if($num>0)
           {
            $exist=true;
           } 
           else{
                if($password==$cpassword){
                    
                    $phone1=$country_code.$phone;
                    // insert into student table
                    $insert_query="INSERT INTO `student_registration`(`name`,`email`,`address`,`mobile`,`terms`,`radio`,`country`,`state`,`city`)VALUES('$name','$email','$address','$phone1','$check','$sem','$country','$state','$city')";
                    $result=mysqli_query($conn, $insert_query);  
                    // insert into student couser table
                    $select="SELECT id FROM student_registration ORDER BY id DESC LIMIT 1";
                    $query=mysqli_query($conn, $select);
                    $ro=mysqli_fetch_assoc($query);
                    $id1=$ro['id'];
                    
                    $qwu="INSERT INTO `student_course` (`student_id`, `course_id`) VALUES ('$id1', '$course_code')";
                    $sec_ins=mysqli_query($conn, $qwu);
                    if($sec_ins){
                        echo 1;
                    }
                }
            }

    // }
?>