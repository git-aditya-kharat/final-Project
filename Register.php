<?php
header('Access-Control-Allow-Origin: *');
?>
<!doctype html>
<html lang="en">
<head>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title>MD EduChem | Register</title>
    
    <!--====== logo Icon ======-->
    <link rel="shortcut icon" href="images/logo.png" type="image/png">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="css/slick.css">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="css/animate.css">
    
    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="css/nice-select.css">
    
    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="css/jquery.nice-number.min.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!--====== Default css ======-->
    <link rel="stylesheet" href="css/default.css">
    
    <!--====== Style css ======-->
    <link rel="stylesheet" href="css/style.css">
    
    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="css/responsive.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./Dashboard/plugins/sweetalert2/sweetalert2.min.css">
  
</head>
<body>
    

    <section class="pt-3">
        <div class="overlay"></div>
        <div class="container">
        <div class="row d-flex justify-content-center">
         <div class="col-md-6">
           <div class="card">
            <article class="card-body">
            <h4 class="card-title text-center">Enroll Now</h4>
            <hr>
        <form id="register" method="POST">
            <div class="form-group-sm">
             <label>Name</label>
                <div class="input-group">
                 <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                 </div>
                    <input name="" class="form-control" placeholder="Student Full Name" type="text" name="name" id="name" required>
                </div> <!-- input-group.// -->
            </div> <!-- form-group// -->
            <div class="form-group-sm">
             <label>University name</label>
                <div class="input-group">
                 <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fas fa-school"></i> </span>
                 </div>
                    <input name="" class="form-control" placeholder="Student College Name" type="text" name="cname" id="cname" required>
                </div> <!-- input-group.// -->
            </div> <!-- form-group// -->
            <div class="form-group-sm">
             <label>Email-id</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                </div>
                <input class="form-control" placeholder="example@gmail.com" type="email" name="email" id="email" required>
              </div> <!-- input-group.// -->
            </div> <!-- form-group// -->
            <div class="form-group-sm">
             <label>Mobile No.</label>
                <div class="input-group">
                 <div class="input-group-prepend">
                    <span class="input-group-text"> <i class='fas fa-phone-alt'></i> </span>
                 </div>
                    <input name="mobile" class="form-control" type="tel" placeholder="012-345-6789" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" id="mobile" required>
                </div> <!-- input-group.// -->
            </div> <!-- form-group// -->
            <div class="form-group-sm">
             <label>Create Password</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input class="form-control" placeholder="******" type="password" name="pass"  id="pass" required>
              </div> <!-- input-group.// -->
            </div> <!-- form-group// -->
            <div class="form-group-sm">
             <label>Confirm Password</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input class="form-control" placeholder="******" type="password" name="cpass" id="cpass"required>
              </div> <!-- input-group.// -->
            </div> <!-- form-group// -->
            <div class="form-group-sm" style="margin-top: 20px">
              <button type="submit" class="btn btn-warning btn-block"> Register</button>
            </div> <!-- form-group// -->
        </form>
        </article>
        </div>
       </div>
      </div>
     </div>
     <p class="text-center">Already have an account?<a href="login.php" class=""> sign in now.</a></p>
    </section>
  
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
  <script src="./Dashboard/plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <!--<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>-->
   <script type="text/javascript">
function loader(){
    
    $.blockUI({
        message: '<div class="loader"><svg class="circular" viewBox="25 25 50 50"> <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/></svg></div>',
        overlayCSS: {
            backgroundColor: '#000',
            opacity: 0.7,
            cursor: 'wait'
        },
        css: {
            color: '#333',
            border: 0,
            padding: 0,
            backgroundColor: 'transparent'
        },
    });

}
    $('#register').on('submit', function(e) {
      e.preventDefault();
        loader();
        $.ajax({
            url: './Dashboard/backend/data.php',
            type: 'POST',
            dataType: 'json',
            data:{
                type:"register",
                name:$('#name').val(),
                cname:$('#cname').val(),
                mail:$('#email').val(),
                mobile:$('#mobile').val(),
                pass:$('#pass').val(),
                cpass:$('#cpass').val(),
                user_role:"3"
            },
            success: function(data) {
              console.log(data);
                $.unblockUI();
                // console.log('1')
                if(data['success'] == 1){
                  Swal.fire(
                  'Success',
                  'Registration done successfully',
                  'success'
                ).then(function(){
            window.location.href = "./login.php";
        });
            }
                else if(data['success'] == 2){
                 Swal.fire(
                  'Warning',
                  'Insert correct data',
                  'warning'
                ).then(function(){
            location.reload();
        });
                }
                else if(data['success'] == 3){
                 Swal.fire(
                  'Warning',
                  'Email already existed',
                  'warning'
                ).then(function(){
            location.reload();
        });
                }
                else if(data['success'] == 4){
                 Swal.fire(
                  'Warning',
                  'Password and Confirm Password Must be same',
                  'warning'
                ).then(function(){
            location.reload();
        });
                }
                else{
                  Swal.fire(
                  'Error',
                  'Something went wrong',
                  'error'
                ).then(function(){
            location.reload();
        });  
        }
            },
             error: function (response) {
        console.log("Error")
        console.log(response)
      }
        });    
        
        return false;
        
    });
   </script>

</body>
</html>
