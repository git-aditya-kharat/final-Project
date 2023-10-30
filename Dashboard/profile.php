<?php
 include './partials/dash-header.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">My Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="https://mdeduchem.com/">Home</a></li>
              <li class="breadcrumb-item active">My Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="row">
                    <div class="col-md-9 container-fluid">
                       <form id="updateprofile" method="POST" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="my-3">
                            <label class="" for="name">Name:</label>
                             <input type="text" name="name" id="name" required class="form-control" placeholder="" value="<?php echo $row3[0]['name']?>">
                          </div>
                          </div>
                          <div class="col-md-6">
                            <div class="my-3">
                            <label class="" for="email">Email:</label>
                             <input type="text" name="email" id="email" required class="form-control" placeholder="" value="<?php echo $row3[0]['email']?>" disabled>
                          </div>
                          </div>
                          <div class="col-md-6">
                            <div class="my-3">
                            <label class="" for="college">University Name:</label>
                             <input type="text" name="college" id="college" required class="form-control" placeholder="" value="<?php echo $row3[0]['university_name']?>">
                          </div>
                          </div>
                          <div class="col-md-6">
                            <div class="my-3">
                            <label class="" for="mobile">Mobile:</label>
                             <input type="tel" name="mobile" id="mobile" required class="form-control" placeholder="" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" value="<?php echo $row3[0]['mobile']?>">
                          </div>
                          </div>
                          
                        </div>
                          <div class="my-3">
                            <input type="submit" name="Upload" class="btn btn-primary" value="Update Profile">
                          </div>
                        </form>

                      </div>
                  </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card col-md-12">
              <div class="card-header my-2" style="border-bottom: none;">
                <h3 class="card-title">
                  <i class="fas fa-lock "></i>
                  Change Password
                </h3>
              </div> <!-- /.card-header
              <div class="card-body">
                <div class="tab-content p-0">
                 Morris chart - Sales -->
                 <div class="row">
                    <div class="col-md-9 container-fluid">
                       <form id="changepass" method="POST" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="my-3">
                            <label class="" for="pass">New Password:</label>
                             <input type="password" name="pass" id="pass" required class="form-control" placeholder="">
                          </div>
                          </div>
                          <div class="col-md-6">
                            <div class="my-3">
                            <label class="" for="cpass">Confirm Password:</label>
                             <input type="password" name="cpass" id="cpass" required class="form-control" placeholder="">
                          </div>
                          </div>
                          <div class="my-3">
                            <input type="submit" name="Upload" class="btn btn-primary" value="Change Password">
                          </div>
                        </form>

                      </div>
                    </div>
            <!-- /.card -->
          </section>
      </div>
    </div>
  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php 
include './partials/dash-footer.php'
  ?>
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
  $('#updateprofile').on('submit', function(e) {
        loader();
        
        $.ajax({
            url: './backend/data.php',
            type: 'POST',
            dataType: 'json',
            data:{
              type:"updateprofile",
              name:$('#name').val(),
              university:$('#college').val(),
              mobile:$('#mobile').val()
            },
            success: function(data) {
              console.log(data);
                $.unblockUI();
                // console.log('1')
                if(data['success'] == 1){
                  // console.log('2')
                    //alert('success');
                    toastr.success(data['message'], "Success");
                }
                if(data['success'] == 0){
                  // console.log('3')
                    // alert('failure');
                    toastr.success(data['message'], "something went wrong");
                }
            },
             error: function (response) {
        console.log("Error")
        console.log(response)
      }
        });    
        
        return false;
        
    });
  $('#changepass').on('submit', function(e) {
        loader();
        
        $.ajax({
            url: './backend/data.php',
            type: 'POST',
            dataType: 'json',
            data:{
              type:"changepass",
              pass:$('#pass').val(),
              cpass:$('#cpass').val()
            },
            success: function(data) {
              console.log(data);
                $.unblockUI();
                // console.log('1')
                if(data['success'] == 1){
                  // console.log('2')
                    //alert('success');
                    toastr.success(data['message'], "Success");
                    $("#changepass").trigger("reset");
                }
                if(data['success'] == 0){
                  // console.log('3')
                    // alert('failure');
                    toastr.error(data['message'], "something went wrong");
                    $("#changepass").trigger("reset");
                }
                if(data['success'] == 2){
                  // console.log('3')
                    // alert('failure');
                    toastr.warning(data['message'], "password and confirm password must be same");
                    $("#changepass").trigger("reset");
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
