<?php
include './connection.php';
session_start();
if (isset($_SESSION['id'])) {
    header("Location: ./Dashboard/");
}
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
  <title>SMAGS | Login</title>

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
  <link rel="stylesheet" href="./Dashboard/plugins/sweetalert2/sweetalert2.min.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  </style>
</head>

<body>

  <section class="" style="padding-top: 10px">
    <div class="container">
      <div class="overlay"></div>
      <div class="row d-flex justify-content-center">
        <div class="col-md-5">
          <div class="logo text-center">
            <h3>SMAGS</h3>
          </div>
          <div class="card">
            <article class="card-body">
              <h4 class="card-title text-center mb-4 mt-1">Sign in</h4>
              <hr>
              <form id="login" method="POST">
                <div class="form-group">
                  <label>Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="email" class="form-control" placeholder="example@gmail.com" type="email" name="email" id="email" required>
                  </div> <!-- input-group.// -->
                </div> <!-- form-group// -->
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control" placeholder="******" type="password" name="pass" id="pass" required>
                  </div> <!-- input-group.// -->
                </div> <!-- form-group// -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block"> Login </button>
                </div> <!-- form-group// -->
                <!-- <button type="button" class="btn btn-primary" onclick='forgetPass()'>Forgot password?</button>   -->
              </form>
            </article>
          </div>
        </div>
      </div>
    </div>
    <p class="text-center">Don't have an account? <a href="register.php" class="">Register now.</a></p>
  </section>

  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="./Dashboard/plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
  <script type="text/javascript">
    function loader() {

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

    $('#login').on('submit', function(e) {
      e.preventDefault();
      loader();
      $.ajax({
        url: './Dashboard/backend/data.php',
        type: 'POST',
        dataType: 'json',
        data: {
          type: "login",
          mail: $('#email').val(),
          pass: $('#pass').val()
        },
        success: function(data) {
          console.log(data);
          $.unblockUI();
          // console.log('1')
          if (data['success'] == 1) {
            Swal.fire(
              'Success',
              'Login successfully',
              'success'
            ).then(function() {
              window.location.href = "./login.php";
            });
          } else if (data['success'] == 2) {
            Swal.fire(
              'Warning',
              'Insert correct data',
              'warning'
            ).then(function() {
              location.reload();
            });

          } else if (data['success'] == 3) {
            Swal.fire(
              'Error',
              'Your id is blocked for unblock id contact to the Administrator.',
              'warning'
            ).then(function() {
              location.reload();
            });
          } else {
            Swal.fire(
              'Error',
              'Enter valid email and password',
              'error'
            ).then(function() {
              location.reload();
            });
          }
        },
        error: function(response) {
          console.log("Error")
          console.log(response)
        }
      });

      return false;

    });
  </script>

</body>

</html>