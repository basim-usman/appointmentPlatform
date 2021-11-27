<?php  include('../includes/inner-header.php');  ?>
<body class="g-sidenav-show  bg-gray-200">
<?php  include('../includes/ssidebar.php');  
if(!$_GET){
    $url = "tdashboard.php";
    echo "<script>window.location.href='".$url."';</script>";
}else{
  include('../classes/teachers.php');
  $teacher = new Teachers();
  $result = $teacher->getScheduleForTeacher();
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
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Add Appointment History</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Add Appointment History</h6>
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
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Add Appointment History</h4>
                  <div class="row mt-3">
                   
                  </div>
                </div>
              </div>
              <div class="card-body">
               <!--  <form role="form" class="text-start"> -->
                <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                    <input type="hidden" name="b_id" id="b_id" value="<?php echo $_GET['b_id'];?>">
                    <input type="hidden" name="t_id" id="t_id" value="<?php echo $_SESSION['t_id'];?>">
                     <textarea type="text" class="form-control" id="problem" name="problem" required="" placeholder="Reason of Appointment" ></textarea>
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                   <textarea type="text" class="form-control" id="solution" name="solution" required="" placeholder="Solution of Appointment" rows="20"></textarea>
                  </div>
                    <center><p style="color: #ff0000; font-weight: bold; font-size: 12px;" id ="dateerror"> </p></center>
 
                 
                  <div class="text-center">
                    <button type="button" class="btn bg-gradient-primary w-100 my-4 mb-2" id="reg_btn" onclick="updateSolution()">Save</button>
                    
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

<?php  include('../includes/inner-footer.php');  ?>
