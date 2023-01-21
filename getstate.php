<!DOCTYPE html>
<html>
<head>

</head>
<body>

<?php
$q =$_GET['q'];

$con = mysqli_connect('localhost','root','','student');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

$sql="SELECT * FROM select_state WHERE  country_id= '$q'";
$result = mysqli_query($con,$sql);

echo '<option value="state">My state</option>';
while($row = mysqli_fetch_array($result)) {
    echo '<option value="'.$row['id'].'">'.$row['state_name'].'</option>';
}
mysqli_close($con);
?>


</body>
</html>