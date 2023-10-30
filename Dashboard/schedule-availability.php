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
            <h1 class="m-0">Schedule Availability</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="https://mdeduchem.com/">Home</a></li>
              <li class="breadcrumb-item active">Schedule Availability</li>
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
                    <div class="col-md-6 container-fluid">
                       <form id="schedule_availibility" method="POST">
                          <div class="my-3">
                            <label class="control-label">Date</label>
                            <input type="date" name="date" id="date" class="form-control" required>
                          </div>
                          <div class="my-3">
                           <label class="control-label">Start Time</label>
                           <input type="time" name="start_time" id="start_time" class="form-control" required>
                          </div>
                          <div class="my-3">
                            <label class="control-label">End Time</label>
                            <input type="time" name="end_time" id="end_time" class="form-control" required>
                          </div>
                          <div class="my-3">
                            <input type="submit" name="Add Schedule" class="btn btn-primary" value="Add Schedule">
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
    <!-- /.content -->
        <!-- /.content -->
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
                  <i class="fas fa-bell "></i>
                  My Schedules
                </h3>
              </div>
                 <div class="table-responsive">
                    <table class="table display table-striped table-bordered nowrap text-center col-md-12" id="schedule_table" style="width: 100%; ">
                      <thead>
                        <th>Sr.No.</th>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Status</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                        <th>Sr.No.</th>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tfoot>
                    </table>
                  </div>
                  </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
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
function deleteSchedule(sid){
  Swal.fire({
  title: 'Do you want to delete this Schedule?',
  text: "",
  icon: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {
  if (result.isConfirmed) {
    $.ajax({
            url: './backend/data.php',
            type: 'POST',
            dataType: 'json',
            data:{
              type:"delete_schedule",
              sid:sid
            },
            success: function(data) {
              console.log(data);
                $.unblockUI();
                // console.log('1')
                if(data['success'] == 1){
                  // console.log('2')
                    //alert('success');
                    toastr.success(data['message'], "Success");
                    table.ajax.reload();
                }
                if(data['success'] == 0){
                  // console.log('3')
                    // alert('failure');
                    toastr.error(data['message'], "something went wrong");
                    table.ajax.reload();
                }
            },
             error: function (response) {
        console.log("Error")
        console.log(response)
      }
        });    
        
        return false;
      }
    });
}
  $('#schedule_availibility').on('submit', function(e) {
      e.preventDefault();
      var formData = new FormData(this);
        $.ajax({
            url: './backend/data.php',
            type: 'POST',
            dataType: 'json',
            beforeSend: function(){
               loader(); 
            },
            data:{
              type:"schedule_availibility",
              user_id:<?php echo $_SESSION['id'];?>,
              date:$("#date").val(),
              start_time:$("#start_time").val(),
              end_time:$("#end_time").val()
            },
            success: function(data) {
              console.log(data);
                $.unblockUI();
                // // console.log('1')
                if(data['success'] == 1){
                    toastr.success(data['message'], "Success");
                    $("#schedule_availibility").trigger("reset");
                    table.ajax.reload();
                }
                if(data['success'] == 0){
                    toastr.error(data['message'], "something went wrong");
                    $("#schedule_availibility").trigger("reset");
                    table.ajax.reload();
                }
                if(data['success'] == 2){
                    toastr.warning(data['message'], "please fill all the form fields");
                    $("#schedule_availibility").trigger("reset");
                    table.ajax.reload();
                }
                if(data['success'] == 3){
                    toastr.warning(data['message'], "avaialbility already scheduled between this date and time");
                    $("#schedule_availibility").trigger("reset");
                    table.ajax.reload();
                }
            },
             error: function (response) {
        console.log("Error")
        console.log(response)
      }
        });    
        
        return false;
        
    });
  $(document).ready(function() {
    
    table = $('#schedule_table').DataTable({
            "destroy": true,
            "order": [
                [1, "asc"]
            ],
            "language": {
                "thousands": "'",
                "zeroRecords":"No Data Found",
                "emptyTable":"No Data Found",
            },
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "ajax": {
                "url": "./backend/data.php",
                "type": "POST",
                "data": {
                    "type": "fetch_advisor_schedule",
            }
        },
        rowCallback: function (row,data) {
          console.log(data);
                if(data[4]=="cancelled" || data[4]=="expired")
                {
                   $('td:eq(5)',row).html('NA');
                }
                else{
                $('td:eq(5)',row).html(`<button class="btn btn-danger btn-sm" onClick=deleteSchedule('${data[5]}')>Delete</button>`);
              }
            }        
    });
  });
</script>
</body>
</html>
