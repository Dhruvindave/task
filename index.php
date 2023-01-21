<!-- php -->
<?php
    include 'db_connect.php';
    $result='';
    $country_code='';
    $exist=false;
    $check=0;
?>

<?php 
     
?>
<!-- /php -->






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>

    <script src="https://kit.fontawesome.com/22ad683826.js" crossorigin="anonymous"></script>
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <!-- /jquery -->
    <!-- style -->
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <!-- navbar -->
    <?php include 'partials/navbar.php';?>
    <!-- /navbar -->


    <div id="form_status"></div>

    <!-- caraousel -->
    <?php include 'partials/caraousel.php';?>
    <!-- /caraousel -->


    <!-- Form -->

    <div class=" my-5">
        <h2 class="mb-5 col-lg-8 col-md-6 container">Student Registration Form</h2>

        <form id="registration_form" action='' class="container col-lg-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3 form-div form-group">
                        <label for="name" class="form-label">Name</label>
                        <input required type="text" class="input form-control" placeholder="Enter name here.."
                            name="name" id="name">
                        <?php
                            if($exist==true)
                            {
                            echo '<p style="color:red;">Student already exist</p>';
                            }
                        ?>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 form-div form-group">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" required name="email" placeholder="user@gmail.com"
                            class="input form-control" id="email1" aria-describedby="emailHelp">
                    </div>
                    <div id="emailExist"></div>

                </div>
            </div>


            <div class="mb-3 form-div form-group">
                <!-- <label for="course" class="form-label">Course</label>
                <select class="form-select input" required name="course_code" aria-label="Default select example">
                    <option value="0">Course</option>
                    <?php 
                        $sql="SELECT * FROM course WHERE 1";
                        $fetch_data=mysqli_query($conn, $sql);

                        while($row=mysqli_fetch_assoc($fetch_data)){
                        echo '<option value="'.$row['id'].'">'.$row['course_name'].'</option>';

                        }
                    ?>
                </select> -->

            </div>

            <div class="mb-3 form-div form-group">
                <label for="address" id="floatingTextarea" class="form-label">Address</label>
                <textarea class="form-control input" required name="address" placeholder="Type Your address"
                    id="floatingTextarea"></textarea>
            </div>

            <div class="mb-3 form-div form-group">
                <div class="form-check-inline">
                    <input class="form-check-input input" required value="Male" type="radio" name="radio"
                        id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Male
                    </label>

                    <input class="form-check-input input" required value="Female" type="radio" name="radio"
                        id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Female
                    </label>
                </div>
            </div>
            <div class="mb-3 form-div form-group">
                <label class="form-check-label" for="exampleCheck1">Course</label><br>
                <select class="form-select input" required name="course_code" aria-label="Default select example">
                    <option value="0">Select Course</option>
                    <?php 
                            $quw1="SELECT * FROM course";
                                $req1=mysqli_query($conn, $quw1);
                                while($row1=mysqli_fetch_assoc($req1)){
                                echo '<option value="'.$row1['id'].'">'.$row1['course_name'].'</option>';

                                }
                        ?>
                </select>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-div form-group">
                        <label for="country code" class="form-label">Country Code</label>
                        <select class="form-select input" required name="country_code"
                            aria-label="Default select example">
                            <option selected>Country Code</option>
                            <option value="+91">+91</option>
                            <option value="+92">+92</option>
                            <option value="+1">+1</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-div form-group">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" required class="form-control input" name="phone" id="phone"
                            placeholder="9979568684">
                    </div>
                </div>


            </div>

            <!-- </div> -->
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3 form-div form-group">
                        <label for="country" class="form-label">Country</label>
                        <select class="form-select input" required name="country" onchange="showState(this.value)"
                            aria-label="Default select example">
                            <option selected>Country</option>
                            <?php 
                                $sql="SELECT * FROM select_country";
                                $result_country=mysqli_query($conn, $sql);
                                while($country_row=mysqli_fetch_assoc($result_country)){
                                    echo '<option value="'.$country_row['id'].'">'.$country_row['country_name'].'</option>'; 
                                }
                            ?>

                            <!-- <option value="3">U.S.A</option> -->
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3 form-div form-group">
                        <label for="State" class="form-label">State</label>
                        <select class="form-select input" required id="txtHint" name="state"
                            onchange="showCity(this.value)" aria-label="Default select example">
                            <option value="0">Select state</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3 form-div form-group">
                        <label for="City" class="form-label ">City</label>
                        <select class="form-select" id="txtHint1" name="city" aria-label="Default select example">
                            <option selected>City</option>
                        </select>
                    </div>
                </div>
            </div>




            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3 form-div form-group">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" id="password" name="password"
                            pattern="/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/" required class="form-control"
                            id="exampleInputPassword1">
                            <div id="passwordCheck"></div>
                    </div>


                </div>
                <div class="col">
                    <div class="mb-3 form-div form-group">
                        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                        <input type="password" id="cpassword" name="cpassword" required class="form-control"
                            id="exampleInputPassword1">
                    </div>
                    <div id="cpasswordCheck"></div>
                </div>
            </div>




            <div class="mb-3 form-div form-group form-check">
                <input type="checkbox" name="check" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Agree with terms</label>
            </div>
            <button name="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- /Form -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>



    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>

    <script src="jquery.js"></script>
   <script>
    // $("#password").on({
    //     focus:function(){
    //         var password = $("#password").val();
    //         var lowerCase =
    //     $("#passwordCheck").text("Password should be combination of 1 capital latter,small latters and numbers");
    //     $("#passwordCheck").css({
    //         "font-size":"15px",
    //         "color":"red",
    //         "margin-top":"15px"
    //     });
    //     },
    //     blur:function(){
    //         $("#passwordCheck").text("");
    //     }
    // });
    
   </script>
</body>

</html>