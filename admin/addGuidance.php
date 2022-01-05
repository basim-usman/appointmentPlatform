<?php  include('../includes/inner-header.php');  ?>
<body class="g-sidenav-show  bg-gray-200">
<?php  include('../includes/asidebar.php');  ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
     <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Add Guidance</a></li>
              <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
            </ol>
            <h6 class="font-weight-bolder mb-0">Add Guidance</h6>
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
                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Add Guidance</h4>
                    <div class="row mt-3">
                     
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label"></label>
                        <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full Name"  required>

                        <input type="hidden" name="a_id" id="a_id" value="<?php echo $_SESSION['a_id'];?>">
                      
                      </div>
                       <center><p style="color: #ff0000; font-weight: bold; font-size: 12px;" id ="fullnameerror"> </p></center>
                      <div class="input-group input-group-outline mb-3">
                        <label class="form-label"></label>
                        <input type="text" name="username" id="username" class="form-control" onkeyup="scanUsernameAdmin();" placeholder="Username" required >
                      </div>
                        <center><p style="color: #ff0000; font-weight: bold; font-size: 12px;" id ="adminusernameerror"> </p></center>
                      <div class="input-group input-group-outline mb-3">
                        <label class="form-label"></label>
                        <input type="text" name="email" id="email" class="form-control" onkeyup="scanAdminMail();" placeholder="Email" required >
                      </div>
                        <center><p style="color: #ff0000; font-weight: bold; font-size: 12px;" id ="adminemailerror"> </p></center>
                      <div class="input-group input-group-outline mb-3">
                        <label class="form-label"></label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" onkeyup="validatePassword()" required>
                      </div>
                       <center><p style="color: #ff0000; font-weight: bold; font-size: 12px;" id ="passworderror"> </p></center>
                      <div class="input-group input-group-outline mb-3">
                        <label class="form-label"></label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" required onkeyup="passwordMatch()">
                      </div>
                       <center><p style="color: #ff0000; font-weight: bold; font-size: 12px;" id ="confirmpassworderror"> </p></center>     

                    <div class="text-center">
                      <button type="button" class="btn bg-gradient-primary w-100 my-4 mb-2" id="reg_btn" onclick="adminValidate()">Save</button>
                      
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
