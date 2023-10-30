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
            <h1 class="m-0">Genrate Report</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Genrate Report</li>
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
          <section class="col-lg-12 connectedSortable ">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card col-md-12 py-3">
              <form id="genrate_report" method="POST">
            <div class="form-group-sm">
             <label>From</label>
                <div class="input-group">
                 <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-calendar" aria-hidden="true"></i> </span>
                 </div>
                    <input class="form-control" type="date" name="from_date" id="from_date" required>
                </div> <!-- input-group.// -->
            </div> <!-- form-group// -->
            <div class="form-group-sm">
             <label>To</label>
              <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-calendar" aria-hidden="true"></i> </span>
                 </div>
                    <input class="form-control" type="date" name="to_date" id="to_date" required>
                </div>  <!-- input-group.// -->
            </div> <!-- form-group// -->
            <div class="form-group-sm" style="margin-top: 20px">
              <button type="submit" class="btn btn-warning btn-block"> Genrate Report</button>
            </div> <!-- form-group// -->
        </form>   
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <section class="content" id="report" style="display: none;">
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
                    <i class="fas fa-book "></i>
                    Summerized Report
                  </h3>
                </div>
                 <div class="table-responsive">
                    <table class="table display table-striped table-bordered nowrap text-center col-md-12" id="appointement_report_table" style="width: 100%; ">
                      <thead>
                        <th>Sr.No.</th>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Student Name</th>
                        <th>Advisor Name</th>
                        <th>Status</th>
                      </thead>
                      <tbody>
                      </tbody>
                      <tfoot>
                        <th>Sr.No.</th>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Student Name</th>
                        <th>Advisor Name</th>
                        <th>Status</th>
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
$('#genrate_report').on('submit', function(e) {
    e.preventDefault();
    $('#report').show();
    table = $('#appointement_report_table').DataTable({
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
                    "type": "appointment_report",
                    "from_date":$('#from_date').val(),
                    "to_date": $('#to_date').val(),
            }
        },
        rowCallback: function (row,data) {
          console.log(data);
              //   if(data[5]=="upcoming")
              //   {
              //   $('td:eq(6)',row).html(`<button class="btn btn-primary btn-sm mx-1" onClick=Markdone('${data[6]}','${data[7]}')>Done</button><button class="btn btn-danger btn-sm" onClick=CancelAppointment('${data[6]}','${data[7]}')>Cancel</button>`);
              // }
              // else
              // {
              //     $('td:eq(6)',row).html('NA');
              // }
            }
        });
    });
</script>
</body>
</html>
