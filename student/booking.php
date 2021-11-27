<?php  include('../includes/inner-header.php');  ?>
<body class="g-sidenav-show  bg-gray-200">
<?php  include('../includes/ssidebar.php');  
if(!$_GET){
    $url = "sdashboard.php";
    echo "<script>window.location.href='".$url."';</script>";
}else{
  include('../classes/students.php');
  $student = new Students();
  $result = $student->getScheduleForStudent();
  $result = $result[0];

  $timeStart = $result['date']." ".$result['time_start'];
  $timeEnd = $result['date']." ".$result['time_end'];
                               

}


?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
   <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Booking</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Booking</h6>
        </nav>
        
      </div>
    </nav>
   <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Book An Appointment</h4>
                  <div class="row mt-3">
                   
                  </div>
                </div>
              </div>
              <div class="card-body">
               <!--  <form role="form" class="text-start"> -->
                <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                    <input type="text" name="teacher" id="teacher" class="form-control" placeholder="Teacher" value="<?php echo $result['first_name']." ".$result['last_name'];?>" readonly>
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                    <input type="text" name="schedule_date" id="schedule_date" class="form-control" placeholder="Date" value="<?php echo $result['date'];?>"  readonly="">
                  </div>
                    <center><p style="color: #ff0000; font-weight: bold; font-size: 12px;" id ="dateerror"> </p></center>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                    <input type="text" name="timestarts" id="timestarts" class="form-control" placeholder="Time Start" value="<?php  echo date("g:iA ", strtotime($timeStart)); ?> " readonly>
                     <input type="hidden" name="timestart" id="timestart" class="form-control" placeholder="Time Start" value="<?php  echo $result['time_start']; ?> " readonly>
                  </div>
                  <center><p style="color: #ff0000; font-weight: bold; font-size: 12px;" id ="timestarterror"> </p></center>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                    <input type="text" name="timeends" id="timeends" class="form-control" placeholder="Time End" value="<?php  echo date("g:iA ", strtotime($timeEnd)); ?>" readonly="">
                    <input type="hidden" name="timeend" id="timeend" class="form-control" placeholder="Time End" value="<?php  echo $result['time_end'] ?>" readonly="">
                     <input type="hidden" name="st_id" id="st_id" class="form-control" value="<?php echo $_SESSION['st_id'];?>">
                      <input type="hidden" name="st_id" id="sc_id" class="form-control" value="<?php echo $result['sc_id'];?>">
                     <input type="hidden" name="status" id="status" class="form-control" value="booked">
                      <input type="hidden" name="total" id="total" class="form-control" value="<?php echo $result['total'];?>">
                      <input type="hidden" name="t_id" id="t_id" class="form-control" value="<?php echo $result['t_id'];?>">
                  </div>
                    <center><p style="color: #ff0000; font-weight: bold; font-size: 12px;" id ="timeenderror"> </p></center>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                    <input type="time" name="timestart" id="stimestart" class="form-control" placeholder="Time Start" onchange ="validateAppointmentTime()" required>
                  </div>
                  <center><p style="color: #ff0000; font-weight: bold; font-size: 12px;" id ="stimestarterror"> </p></center>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                    <input type="time" name="stimeend" id="stimeend" class="form-control" placeholder="Time End" required>
                  </div>
                    <center><p style="color: #ff0000; font-weight: bold; font-size: 12px;" id ="stimeenderror"> </p></center>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                    <textarea type="text" class="form-control" id="description" name="description" required="" placeholder="Details/Notes" readonly=""><?php echo $result['description'];?></textarea>
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                    <select class="form-control" id="mode" name="mode" required>
                      <option value="">---Select---</option>
                      <option value="chat">Chat</option>
                      <option value="ftf">Face to Face</option>
                      
                    </select>
                  </div>
                  <div class="alert alert-danger" id="failedNotificationTime">
                    <span id="failedTextTime" style="color:white;">Appointment Availiabilty : <?php  echo date("g:iA ", strtotime($timeStart)); ?> - <?php  echo date("g:iA ", strtotime($timeEnd)); ?></span>
                  </div>
                  <div class="alert alert-success" id="successNotificationTime" style="display:none">
                    <span id="successTextTime" style="color:white;"></span>
                  </div>
                   <center><p style="color: #ff0000; font-weight: bold; font-size: 12px;" id ="descriptionerror">
                   </p></center>
                  <div class="text-center">
                    <button type="button" class="btn bg-gradient-primary w-100 my-4 mb-2" id="reg_btn" onclick="bookSchedule()">BOOK NOW</button>
                 
               <!--  </form> -->
              </div>
            </div>
          </div>
        </dvi>
     
      </div>
      <div style="margin-top: 80px;">
          <div class="alert alert-dark alert-dismissible text-white" role="alert" id="process" style="display:none;">
                <span class="text-sm">Processing Your Request</span>
          </div>
          <div class="alert alert-success alert-dismissible text-white" role="alert" id="success" style="display:none;">
                <span class="text-sm">Added Successfully </span>
               
          </div>
          <div class="alert alert-danger alert-dismissible text-white" role="alert" id="fail" style="display:none;">
                <span class="text-sm" id="responseerror">Sorry Technical Problem..Try again later.!! </span>
                <span class="text-sm" id="responseerror1"></span>
               
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
        notification(<?php echo $_SESSION['st_id']?>,'student');
      </script>

<?php  include('../includes/inner-footer.php');  ?>
