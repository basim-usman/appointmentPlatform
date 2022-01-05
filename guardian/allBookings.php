<?php  include('../includes/inner-header.php');  ?>

<body class="g-sidenav-show  bg-gray-200">
<?php  include('../includes/gsidebar.php'); 
      include ('../classes/guardians.php');
$guardian = new Guardians();
$result = $guardian->getGuardianBookings();
// echo "<pre>";print_r($result);echo "</pre>";
// die("I am here.. LA ALA LALALA A");
 ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
   <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Guardian</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Bookings</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Bookings</h6>
        </nav>
        
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">All Bookings </h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Teacher</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Guardian</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Detials/Notes</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Start Time</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">End Time</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions </th>
                    </tr>
                  </thead>
                  <tbody id="tableBody">
                     <?php if($result)
                            { 
                              foreach ($result as $row ) {
                                // $timeStart = $row['b_date']." ".$row['b_time_start'];
                                // $timeEnd = $row['b_date']." ".$row['b_time_end'];
                                $time_in_12_hour_format1  = date("g:i a", strtotime($row['b_time_start']));
                                $time_in_12_hour_format2  = date("g:i a", strtotime($row['b_time_end']));
                                
                                ?>
                            <tr>

                              <td>
                                <div class="d-flex px-2 py-1">
                                 
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-xs"><?php echo $row['tfirst']." ".$row['tlast']; ?></h6>
                                    <p class="text-xs text-secondary mb-0"><?php echo $row['temail']; ?></p>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <div class="d-flex px-2 py-1">
                                 
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-xs"><?php echo $row['gfirst']." ".$row['glast']; ?></h6>
                                    <p class="text-xs text-secondary mb-0"><?php echo $row['gemail']; ?></p>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <p class="text-xs font-weight-bold mb-0"><?php echo $row['description']; ?></p>
                               
                              </td>
                              
                              <td >
                                <span class="text-secondary text-xs font-weight-bold"><?php echo $row['b_date']; ?></span>
                              </td>
                               <td >
                                <span class="text-secondary text-xs font-weight-bold"><?php  echo $time_in_12_hour_format1; ?></span>
                              </td>
                               <td >
                                <span class="text-secondary text-xs font-weight-bold"><?php  echo $time_in_12_hour_format2; ?></span>
                              </td>

                              <td >
                                <?php if($row['status'] == 'open'){ ?>
                                    <span class="badge badge-sm bg-gradient-success"><?php echo $row['status']; ?></span>
                                <?php }elseif($row['status'] == 'booked'){?>
                                    <span class="badge badge-sm bg-gradient-secondary"><?php echo $row['status']; ?></span>
                                <?php }elseif($row['status'] == 'closed'){?>
                                    <span class="badge badge-sm bg-gradient-danger"><?php echo $row['status']; ?></span>
                                <?php } ?> 
                              </td>
                             
                              <td >
                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                  View
                                </a>
                              </td>
                            </tr>
                   <?php  } ?>         
                  <?php }else{ ?>
                    <tr>
                       <td colspan="100%" class="text-center">
                            No data available.
                        </td>
                    </tr>
                  <?php }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div style="margin-top: 80px;">
          <div class="alert alert-dark alert-dismissible text-white" role="alert" id="process" style="display:none;">
                <span class="text-sm">Processing Your Request</span>
          </div>
          <div class="alert alert-success alert-dismissible text-white" role="alert" id="success" style="display:none;">
                <span class="text-sm">Added Successfully </span>
               
          </div>
            <div class="alert alert-warning alert-dismissible text-white" role="alert" id="notification" style="display:none;">
                <span class="text-sm" id="notificationText">Added Successfully </span>
               
          </div>
          <div class="alert alert-danger alert-dismissible text-white" role="alert" id="fail" style="display:none;">
                <span class="text-sm" id="responseerror">Sorry Technical Problem..Try again later.!! </span>
               
          </div>
        </div>


      <script type="text/javascript">
         var dtToday = new Date();
    
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
       
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
            var maxDate = year + '-' + month + '-' + day;

            var maxDate = year + '-' + month + '-' + day;
       
            $('#schedule_date').attr('min', maxDate);
      
      </script>
      <script type="text/javascript">
        function notificationWork(param1,param2)
          {
            var userType = param2;
            var userID  = param1;
            

            var json_data={userType:userType,userID:userID};

              $.post(
                      "../ajax.php",
                      {
                        function_to_run: "notificationMeeting",
                        data: json_data,
                      },
                      function (response) {
                        var res = JSON.parse(response);

                          if (res.data == "true") {

                          $("#notificationText").text(res.error);
                           $("#notification").show();
                            setTimeout(function() {
                                  $("#notification").hide('blind', {}, 300)
                              }, 4000);
                              
                         
                          }
                      }
                    );

            
          }

        notificationWork(<?php echo $_SESSION['st_id']?>,'guardian');
      </script>

<?php  include('../includes/inner-footer.php');  ?>
