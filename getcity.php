
<?php
    $q =$_GET['q'];

    $con = mysqli_connect('localhost','root','','student');
    if (!$con) {
      die('Could not connect: ' . mysqli_error($con));
    }
    
    $sql="SELECT * FROM select_city WHERE  state_id= '$q'";
    $result = mysqli_query($con,$sql);
    
    echo '<option value="state">Select My</option>';
    while($row = mysqli_fetch_array($result)) {
        echo '<option value="'.$row['id'].'">'.$row['city_name'].'</option>';
    }
    mysqli_close($con);
    
?>