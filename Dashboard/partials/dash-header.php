<?php
session_start();
include './../connection.php';
if (isset($_SESSION['id'])) {
  $sid=$_SESSION['id'];
   $sql="SELECT * FROM `users` Where id='$sid'";
   $result1=$conn->query($sql);
   if($result1)
    $row3=$result1->fetchALL();
   // if($row3['payment_status']==0)
   //      header("Location: ./../pay.php");
   $dirname=$_SERVER['PHP_SELF'];
}
else{
  header("Location: ./../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SMAGS | Dashboard</title>
  <link rel="shortcut icon" href="./../images/logo.png" type="image/png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="./plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="./plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="./plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="./plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="./plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="./plugins/toastr/toastr.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css"/>
  <link rel="stylesheet" href="./plugins/sweetalert2/sweetalert2.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="./dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i><?php echo $row3[0]['name']; ?>
          <span class="badge badge-warning navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
          <div class="dropdown-divider"></div>
          <a href="./profile.php" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> My Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="./../logout.php" class="dropdown-item">
            <i class="fas fa-power-off mr-2"></i> LogOut
          </a>
          </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <!-- <img src="./../images/logo.png" alt="AdminLTE Logo" class="brand-image"> -->
      <span class="brand-text font-weight-light">SMAGS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php if($row3[0]['user_role']==1)
          { ?>
          <li class="nav-item">
            <a href="./users.php" class="nav-link <?php if($dirname =="/Dashboard/users.php") { echo 'active'; } else{ echo 'ul';} ?>">
              <i class="fa fa-user nav-icon"></i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./addusers.php" class="nav-link <?php if($dirname =="/Dashboard/addusers.php") { echo 'active'; } else{ echo 'ul';} ?>">
              <i class="fa fa-plus nav-icon"></i>
              <p>Add Users</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="./genrate-report.php" class="nav-link <?php if($dirname =="/Dashboard/genrate-report.php") { echo 'active'; } else{ echo 'ul';} ?>">
              <i class="fa fa-book nav-icon"></i>
              <p>Genrate Report</p>
            </a>
          </li>
        <?php } else if($row3[0]['user_role']==2)
        { ?>
          <li class="nav-item">
            <a href="./schedule-availability.php" class="nav-link <?php if($dirname =="/Dashboard/students.php") { echo 'active'; } else{ echo 'ul';} ?>">
              <i class="fa fa-user nav-icon"></i>
              <p>Schedule Availabiliry</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="./manage-appointment.php" class="nav-link <?php if($dirname =="/Dashboard/all-material.php") { echo 'active'; } else{ echo 'ul';} ?>">
              <i class="fa fa-book nav-icon"></i>
              <p>Manage Appointment</p>
            </a>
          </li>
        <?php } else if($row3[0]['user_role']==3)
          {
         ?>
          <li class="nav-item">
            <a href="./book-appointment.php" class="nav-link <?php if($dirname =="/Dashboard/students.php") { echo 'active'; } else{ echo 'ul';} ?>">
              <i class="fa fa-user nav-icon"></i>
              <p>Book Appointment</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="./appointment-history.php" class="nav-link <?php if($dirname =="/Dashboard/appointment-history.php") { echo 'active'; } else{ echo 'ul';} ?>">
              <i class="fa fa-book nav-icon"></i>
              <p>MY History</p>
            </a>
          </li>
        <?php } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>