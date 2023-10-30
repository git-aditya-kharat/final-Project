<?php
session_start();

include './connection.php';
if (isset($_SESSION['id'])) {
  $sid=$_SESSION['id'];
   $sql="SELECT * FROM `users` WHERE id='$sid'";
   $result=$conn->query($sql);
   if($result)
   {
    $row3=$result->fetchALL();
    // print_r($row3);
   }
   // else{
   //  echo 'hi';
   // }
   // 
}
else{
  // header("Location:index.php");
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
    <title>SMAGS | Home</title>
    
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
  <style>
.dropbtn {
  background-color: white;
  color: blue;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  /*display: inline-block;*/
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 120px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 2;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown:hover .dropdown-content {display: block;}

/*.dropdown:hover .dropbtn {background-color: #3e8e41;}*/
</style>
</head>

<body>
   
    <!--====== PRELOADER PART START ======-->
    
    <div class="preloader">
        <div class="loader rubix-cube">
            <div class="layer layer-1"></div>
            <div class="layer layer-2"></div>
            <div class="layer layer-3 color-1"></div>
            <div class="layer layer-4"></div>
            <div class="layer layer-5"></div>
            <div class="layer layer-6"></div>
            <div class="layer layer-7"></div>
            <div class="layer layer-8"></div>
        </div>
    </div>
    
    <!--====== PRELOADER PART START ======-->
    
    <!--====== HEADER PART START ======-->
    
    <header id="header-part">  
        <div class="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-9 col-8">
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto py-1">
                                    <li class="nav-item">
                                        <a  href="index.php" style="font-size: 24px;">SMAGS</a>
                                    </li>
                                    <li class="pagelink">
                                <?php  if(isset($_SESSION['id'])){ ?>
                                    
                                        <ul class="navbar-nav ml-auto">
                                          <li class="nav-item dropdown">
                                                <a class="nav-link" data-toggle="dropdown" href="#">
                                                  <i class="fa fa-user"></i><?php echo substr($row3[0]['name'], 0, 10); ?>
                                                  <span class="badge badge-warning navbar-badge"></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left border-0">
                                                  <div class="dropdown-divider"></div>
                                                  <a href="./Dashboard/" class="dropdown-item">
                                                    <i class="fa fa-dashboard"></i> My Dashboard
                                                  </a>
                                                  <div class="dropdown-divider"></div>
                                                  <a href="./logout.php" class="dropdown-item">
                                                    <i class="fa fa-power-off"></i> LogOut
                                                  </a>
                                                  </div>
                                              </li>
                                        </ul>
      
                                    
                                <?php } else{ ?>
                                    
                                        <a href="login.php" class="button-media btn btn-warning text-light px-3">Login</a>
                                    <?php } ?>      
                                    </li>
                                    
                                </ul>
                            </div>
                        </nav> <!-- nav -->
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-4">
                        <div><a href="#" class="logo-media"></a>
                        </div>
                        <div class="button float-right" style="margin-top: 13px">
                                <?php  if(isset($_SESSION['id'])){ ?>
                            <!-- Notifications Dropdown Menu -->
                            <!--<ul class="navbar-nav ml-auto">-->
                            <!--  <li class="nav-item dropdown">-->
                            <!--    <a class="nav-link" data-toggle="dropdown" href="./Dashboar">-->
                            <!--      <i class="fa fa-user"></i><?php echo $row3['name']; ?>-->
                            <!--      <span class="badge badge-warning navbar-badge"></span>-->
                            <!--    </a>-->
                            <!--    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">-->
                            <!--      <div class="dropdown-divider"></div>-->
                            <!--      <a href="Dashboard/profile.php" class="dropdown-item">-->
                            <!--        <i class="fa fa-user"></i> My Profile-->
                            <!--      </a>-->
                            <!--      <div class="dropdown-divider"></div>-->
                            <!--      <a href="logout.php" class="dropdown-item">-->
                            <!--        <i class="fa fa-power-off"></i> LogOut-->
                            <!--      </a>-->
                            <!--      </div>-->
                            <!--  </li>-->
                            <!--</ul>-->
                            <div class="dropdown dropbtn">
  <button class="dropbtn" style="color:black"><i class="fa fa-user"></i> <?php echo substr($row3[0]['name'], 0, 10); ?></button>
  <div class="dropdown-content">
    <a href="./Dashboard/" class="dropdown-item px-2"><i class="fa fa-dashboard"></i> My Dashboard</a>
    <a href="./logout.php" class="dropdown-item px-2"><i class="fa fa-power-off"></i> LogOut</a>
  </div>
</div>
<!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
 -->                        </div>
                                    
                        <?php } else{ ?>
                        <div class="button float-right">
                        <a href="login.php" class="main-btn">Login</a>
                        </div>
                        <?php } ?>
                        
                        
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>
    </header>