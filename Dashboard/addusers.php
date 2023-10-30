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
            <h1 class="m-0">Add Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="https://mdeduchem.com/">Home</a></li>
              <li class="breadcrumb-item active">Add Users</li>
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
              <!-- <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Sales
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li>
                  </ul>
                </div>
              </div> --><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="row">
                    <div class="col-md-6 container-fluid">
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
                           <label>Select User Type</label>
                            <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                              </div>
                            <select class="form-control" id="user_role" name="user_role" required>
                              <option>--- Select User Type ---</option>
                              <option value="3">Student</option>
                              <option value="2">Advisor</option>
                            </select>
                          </div>
                          </div>
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
                            <button type="submit" class="btn btn-primary btn-block"> Add User</button>
                          </div> <!-- form-group// -->
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
 $('#register').on('submit', function(e) {
      e.preventDefault();
        loader();
        $.ajax({
            url: './backend/data.php',
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
                user_role:$('#user_role').val(),
            },
            success: function(data) {
              console.log(data);
                $.unblockUI();
                // console.log('1')
                if(data['success'] == 1){
                   toastr.success(data['message'], "Success");
                    $("#register").trigger("reset");
            }
                else if(data['success'] == 2){
                  toastr.warning(data['message'], "Enter correct data");
                   $("#register").trigger("reset");
                }
                else if(data['success'] == 3){
                 toastr.warning(data['message'], "email id already exits");
                    $("#register").trigger("reset");
                }
                else if(data['success'] == 4){
                  toastr.warning(data['message'], "password and confirm password must be same");
                  $("#register").trigger("reset");
                }
                else{
                  toastr.error(data['message'], "something went wrong");
                    $("#register").trigger("reset");
                    // table.ajax.reload();
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
