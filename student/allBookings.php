<?php  include('../includes/inner-header.php');  ?>

<body class="g-sidenav-show  bg-gray-200">
<?php  include('../includes/ssidebar.php'); 
      include ('../classes/students.php');
$student = new Students();
$result = $student->getStudentBookings();
$count = count($result);
 ?>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
   <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Student</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Bookings</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Bookings</h6>
        </nav>
        
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="alert alert-danger alert-dismissible text-white" role="alert" id="fails" style="display:none;">
                <span class="text-sm" id="responseerrors"> </span>
                <button type="button" id="resc_btn" class="btn bg-gradient-success" >Reschedule</button>
               
               
          </div>
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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Student</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Detials/Notes</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Start Time</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">End Time</th>
                       <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Mode</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions </th>
                    </tr>
                  </thead>
                  <tbody id="tableBody">
                     <?php if($result)
                            { 
                              $hit = 0;
                              foreach ($result as $row ) {
                                $hit++;
                                // $timeStart = $row['b_date']." ".$row['b_time_start'];
                                // $timeEnd = $row['b_date']." ".$row['b_time_end'];
                                $time_in_12_hour_format1  = date("g:i a", strtotime($row['b_time_start']));
                                $time_in_12_hour_format2  = date("g:i a", strtotime($row['b_time_end']));
                                
                                ?>
                            <tr>

                              <td>
                                <div class="d-flex px-2 py-1">
                                   <input type="hidden" name="count" id="count" value="<?php echo $count;?>">
                                   <input type="hidden" name="sc_id" id="sc_id-<?php echo $hit;?>" value="<?php echo $row['sc_id']; ?>">
                                   <input type="hidden" name="st_id" id="st_id-<?php echo $hit;?>" value="<?php echo $row['appoint_id']; ?>">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm"><?php echo $row['tfirst']." ".$row['tlast']; ?></h6>
                                    <p class="text-xs text-secondary mb-0"><?php echo $row['temail']; ?></p>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <div class="d-flex px-2 py-1">
                                 
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm"><?php echo $row['sfirst']." ".$row['slast']; ?></h6>
                                    <p class="text-xs text-secondary mb-0"><?php echo $row['semail']; ?></p>
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
                                <span class="text-secondary text-xs font-weight-bold">
                                
                                  <?php  echo $time_in_12_hour_format1; ?></span>
                              </td>
                               <td >
                                <span class="text-secondary text-xs font-weight-bold">
                                  <input type="hidden" name="time_in_12_hour_format2" id="time_in_12_hour_format2" value="<?php  echo $time_in_12_hour_format2; ?>">
                                  <?php  echo $time_in_12_hour_format2; ?>
                                  </span>
                              </td>
                               <td>
                                 <span class="text-secondary text-xs font-weight-bold"><?php if($row['mode'] == 'ftf'){echo 'Face-Face';}else{ echo $row['mode']." | Link : [".$row['chat_link']." ]";} ?></span>
                              </td>
                                
                             <td>
                                
                                <?php if($row['status'] == 'open'){ ?>
                                    <span class="badge badge-sm bg-gradient-success"><?php echo $row['status']; ?></span>
                                <?php }elseif($row['status'] == 'booked'){?>
                                    <span class="badge badge-sm bg-gradient-secondary"><?php echo $row['status']; ?></span>
                                <?php }elseif($row['status'] == 'done'){?>
                                    <span class="badge badge-sm bg-gradient-danger"><?php echo $row['status']; ?></span>
                                <?php }elseif($row['status'] == 'cancelled'){ ?> 
                                    <span class="badge badge-sm bg-gradient-danger"><?php echo $row['status']; ?></span>
                                <?php }elseif($row['status'] == 'inprocess'){ ?> 
                                    <span class="badge badge-sm bg-gradient-secondary"><?php echo $row['status']; ?></span>
                                <?php }elseif($row['status'] == 'reschedule'){ ?> 
                                   
                               
                      

                                    <?php  if($count == $hit){


                                  ?> 
                                    <input type="hidden" name="resc" id="resc-<?php echo $hit;?>" value="1">
                                      <input type="hidden" name="time_in_12_hour_format1" id="time_in_12_hour_format1-<?php echo $hit;?>" value="<?php  echo $time_in_12_hour_format1; ?>">
                                        <input type="hidden" name="time_in_12_hour_format2" id="time_in_12_hour_format2-<?php echo $hit;?>" value="<?php  echo $time_in_12_hour_format2; ?>">
                                         <input type="hidden" name="b_id-<?php echo $hit;?>" id="b_id-<?php echo $hit;?>" value="<?php echo $row['b_id'];?>">
                                   <?php }else{ ?>
                                     <input type="hidden" name="resc" id="resc-<?php echo $hit;?>" value="0">
                                       <input type="hidden" name="time_in_12_hour_format1" id="time_in_12_hour_format1-<?php echo $hit;?>" value="<?php  echo $time_in_12_hour_format1; ?>">
                                        <input type="hidden" name="time_in_12_hour_format2" id="time_in_12_hour_format2-<?php echo $hit;?>" value="<?php  echo $time_in_12_hour_format2; ?>">
                                         <input type="hidden" name="b_id-<?php echo $hit;?>" id="b_id-<?php echo $hit;?>" value="<?php echo $row['b_id'];?>">


                                   <?php } ?>
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
                <span class="text-sm">Processing Your Request </span>
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
         <!--  <div class="alert alert-danger alert-dismissible text-white" role="alert" id="fails" style="display:none;">
                <span class="text-sm" id="responseerrors">Sorry Technical Problem..Try again later.!! </span>
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>  
               &nbsp;   &nbsp; <button type="button" class="btn bg-gradient-success" onclick="rescheduleStudent()">Reschedule</button>
               
          </div> -->
        </div>


      <script type="text/javascript">
        var count = $("#count").val()
        var resc =$("#resc-"+count).val()
        var time_in_12_hour_format1 = $("#time_in_12_hour_format1-"+count).val()
        var time_in_12_hour_format2 = $("#time_in_12_hour_format2-"+count).val()
        var b_id = $("#b_id-"+count).val()
        var sc_id = $("#sc_id-"+count).val()
        if(resc ==1){
          $("#responseerrors").text("Your Booking at ["+time_in_12_hour_format1+" - "+time_in_12_hour_format2+ " ] Need to Rescdeule  With Your Teacher. Click Here to Reschedule ");
          

          $("#resc_btn").attr("onclick","goTo('"+b_id+"','"+sc_id+"')");
        
           $("#fails").show();
           setTimeout(function() {
                  $("#fails").hide('blind', {}, 300)
              }, 3000);

         // setTimeout(function(){ $("#fail").hide(); }, 5000);

        }
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
      

      function goTo(param1,param2){
        window.location.href="reBooking.php?b_id="+param1+"&sc_id="+param2;

      }
       
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

        notificationWork(<?php echo $_SESSION['st_id']?>,'student');
      </script>


<?php  include('../includes/inner-footer.php');  ?>
