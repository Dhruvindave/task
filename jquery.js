// ------------>>>>>>>>>>>>>Student_registration page starts<<<<<<<<<<<<<--------------------
// Change state city start
function showState(str) {
    $.ajax({
        type: 'GET',
        url: 'getstate.php?q=' + str,
        data: {},
        success: function (response) {
            document.getElementById("txtHint").innerHTML = response;
        }
    });
}

function showCity(val) {
    $.ajax({
        type: 'GET',
        url: 'getcity.php?q=' + val,
        data: {
            //  get_option:val   
        },
        success: function (response) {
            document.getElementById("txtHint1").innerHTML = response;
        }
    });
}
// Change state city stop


// Email exist check start
$("#email1").keyup(function() {
    var email = $("#email1").val();
    $.ajax({
        type: 'GET',
        url: 'emailcheck.php?email=' + email,
        success: function(data, status) {
            if (data == "not exist") {
                $("#email1").css("border", "0px solid black");
                $("#emailExist").text("");
            } else if (data == "emailIdExist") {
                $("#emailExist").text("Email id exist");
                $("#emailExist").css("color", "red");
                $("#email1").css("border", "3px solid red");
            }
        }
    });
});
// Email exist check end 


// Password validation start
$("#password").on({
    focus:function(){
        $("#password").keyup(function () {
            var count = $("#password").val().length;
        
            if (count < 7) {
                $(this).css("border", "3px solid red");
                // $("#passwordNotice").show();
            } else if (count >= 8) {
                $(this).css("border", "3px solid green");
                // alert("done");
                // $("#passwordNotice").hide();
            }
        });
    },    
    blur:function(){
        ("$password").css("border","0px solid black");
    }
});


$("#cpassword").keyup(function(){
    var password = $("#password").val();
    var cpassword = $(this).val();
    if(password!=cpassword){
        $("#cpasswordCheck").text("Both password does not match");
        $("#cpasswordCheck").css("color","red");
        $("#cpassword").css("border","3px solid red");
    }
    else{
        $("#cpasswordCheck").text("");
        $("#cpassword").css("border","3px solid green");
        
    }
});
// Password validation end

// student registration form submitting start
$("#registration_form").submit(function (ev) {
    ev.preventDefault();
    var form = $("#registration_form");
    // var url= form.attr('action');
    $.ajax({
        type: "POST",
        url: "registration_submit.php",
        data: form.serialize(),
        success: function (data) {
            alert("Form submitted succesfully");
        },
        error: function (data) {
            alert("form not submitted");
        }
    });
});
// student registration form submitting end
// ------------>>>>>>>>>>>>>Student_registration page ends<<<<<<<<<<<<<--------------------

// ------------>>>>>>>>>>>>>Course page starts<<<<<<<<<<<<<<<----------------------------


$("#course_form").submit(function(ev) {
    ev.preventDefault();
    var formData = $("#course_form");
    console.log(formData);
    if (formData == '') {
        return;
    } else {
        $.ajax({
            type: 'POST',
            url: 'course_submit.php',
            data: formData.serialize(),
            success: function(data) {
              if(data==1){
               console.log(data);
                alert("submited");
              }
              else if(data==0){
                alert("Not submited");
              }
              else if(data == -1){
                alert("already exist");
              }
              getTable();

            }
        
        });
    }
});

// course table
// $("#course_form").submit(function() {
//     $.ajax({
//         type: 'GET',
//         url: 'table_data.php',
//         success: function(data) {
//             document.getElementById("tableCourseData").innerHTML = data;
//         }
//     });
// });
$("#course_form").submit(function(){
    $.ajax({
        type:'GET',
        url:'table_data.php',
        success:function(data){
            if(success){
                alert("Data:" +data);
            }
        }
    });
});

function getTable(){
    $.ajax({
        type: 'POST',
        url: 'table_data.php',
        success:function(data){
            // console.log("data",JSON.parse(data));
            let nData = JSON.parse(data);
            let html =''
            nData.forEach((element)=>{
                html +=`<tr><td>${element.id}</td>`
                html +=`<td>${element.course_name}</td>`
                html +=`<td><a href="update_course.php?course_id=${element.id}" class="btn btn-warning btn-sm mx-3">Update</a>`
                html +=`<a href="#course_id=${element.id}" id="delete" class="btn btn-danger btn-sm">Delete</a></td></tr>`
                // console.log(element.id);
                // console.log(element.course_name);
            })
            // getTable();

            
            $("#tbody").html(html);
            
        }

    });
}
$(document).ready(function(){
    // alert("Ready");getTable
    getTable();
  
    $(document).on("click","a",function(){
        // alert($("#delete").attr("href"));
    //    $("a").preventDefault();
    var a =$(this).attr("href");
    console.log($(this));
   var b = a.slice(1);
   console.log("delete_course.php?"+b);
    // console.log(a);
    $.ajax({
        type:'GET',
        url:'delete_course.php?'+b,
        success:function(data){
            if(data=="deleted"){
                alert("Deleted");
                getTable();
            }
            else if(data=="error"){
                alert("Error");
            }
            else{
                // console.log("Data "+data);
                alert("This course is assigned to user");
            }
        }
    });

    });
    
});


// course table

// update student starts

// update student ends 

// ------------>>>>>>>>>>>>>Course page ends<<<<<<<<<<<<<<<------------------------------