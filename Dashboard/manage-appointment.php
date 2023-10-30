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
            <h1 class="m-0">Manage Appointment</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Appointment</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
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
                 <div class="table-responsive">
                    <table class="table display table-striped table-bordered nowrap text-center col-md-12" id="my_appointment_table" style="width: 100%; ">
                      <thead>
                        <th>Sr.No.</th>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Student Name</th>
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
                        <th>Student Name</th>
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
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    
  </div>
  <!-- /.content-wrapper -->
<?php
 include './partials/dash-footer.php';
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
function Markdone(app_id,schedule_id){
  Swal.fire({
  title: 'Do you want to Mark this Appointment Done?',
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
              type:"Mark_appointment_done",
              app_id:app_id,
              schedule_id:schedule_id,
              user_id:<?php echo $_SESSION['id']; ?>,
              status:"done",
            },
            success: function(data) {
              console.log(data);
                $.unblockUI();
                // console.log('1')
                if(data['success'] == 1){
                  // console.log('2')
                    //alert('success');
                    toastr.success(data['message'], "Success");
                    // $("#postnt").trigger("reset");
                    table.ajax.reload();
                }
                if(data['success'] == 0){
                  // console.log('3')
                    // alert('failure');
                    toastr.error(data['message'], "something went wrong");
                    // $("#postnt").trigger("reset");
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
function CancelAppointment(app_id,schedule_id){
  // console.log(id);
  // console.log(material);
  // console.log(thambnail);
  Swal.fire({
  title: 'Do you want to Cancel this Appointment?',
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
              type:"Cancel_Appointment",
              app_id:app_id,
              schedule_id:schedule_id,
              user_id:<?php echo $_SESSION['id']; ?>,
              status:"cancelled",
            },
            success: function(data) {
              console.log(data);
                $.unblockUI();
                // console.log('1')
                if(data['success'] == 1){
                  // console.log('2')
                    //alert('success');
                    toastr.success(data['message'], "Success");
                    // $("#postnt").trigger("reset");
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
$(document).ready(function() {
    // $.fn.dataTable.moment( 'YYYY-MM-DD HH:mm:ss' );
    
    table = $('#my_appointment_table').DataTable({
            "destroy": true,
            "scrollX": true,
            "order": [
                [1, "desc"]
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
                    "type": "manage_appointment",
                    "user_id":"<?php echo $_SESSION['id'];?>"
            }
        },
        rowCallback: function (row,data) {
          console.log(data);
                if(data[5]=="upcoming")
                {
                $('td:eq(6)',row).html(`<button class="btn btn-primary btn-sm mx-1" onClick=Markdone('${data[6]}','${data[7]}')>Done</button><button class="btn btn-danger btn-sm" onClick=CancelAppointment('${data[6]}','${data[7]}')>Cancel</button>`);
              }
              else
              {
                  $('td:eq(6)',row).html('NA');
              }
            }
    });

  });
  
</script>
</body>
</html>
