<?php include("../includes/header.php"); ?>


<body class="bg-gray-200">

  
  <main class="main-content  mt-0">

    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">

      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Register Yourself</h4>
                  <div class="row mt-3">
                    <!-- <div class="col-2 text-center ms-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-facebook text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center px-1">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-github text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center me-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-google text-white text-lg"></i>
                      </a>
                    </div> -->
                  </div>
                </div>
              </div>
              <div class="card-body">
               <!--  <form role="form" class="text-start"> -->
                  <div class="input-group input-group-outline mb-3">
                      <label class="form-label"></label>
                      <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" required>

                    </div>
                    <center><p style="color: #ff0000; font-weight: bold; font-size: 12px;" id ="firstnameerror"> </p></center>

                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label"></label>
                      <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name"  required>
                    </div>
                     <center><p style="color: #ff0000; font-weight: bold; font-size: 12px;" id ="lastnameerror"> </p></center>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label"></label>
                      <input type="text" name="username" id="username" class="form-control" onkeyup="scanUsernameGuardian();" placeholder="Username" required >
                    </div>
                     <center><p style="color: #ff0000; font-weight: bold; font-size: 12px;" id ="usernameerror"> </p></center>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label"></label>
                      <input type="email" id="email" name="email" class="form-control" placeholder="Email" onkeyup="scanGuardianMail();" required>
                    </div>
                     <center><p style="color: #ff0000; font-weight: bold; font-size: 12px;" id ="emailerror"> </p></center>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label"></label>
                      <input type="email" id="kidemail" name="kidemail" class="form-control" placeholder="Student Email" onkeyup="scanKidMail();" required>
                      <input type="hidden" id="kidID" name="kidID" class="form-control" value="">
                      
                    </div>
                     <center><p style="color: #ff0000; font-weight: bold; font-size: 12px;" id ="kidemailerror"> </p></center>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label"></label>
                      <input type="text" name="phone_number" id="phone_number" placeholder="Mobile#" class="form-control" onkeyup="scanMobileNumber()" required>
                    </div>
                     <center><p style="color: #ff0000; font-weight: bold; font-size: 12px;" id ="phoneerror"> </p></center>
                     <div class="input-group input-group-outline mb-3">
                      <label class="form-label"></label>
                      <input type="text" name="address" id="address" class="form-control"  placeholder="Address" required>
                    </div>
                     <center><p style="color: #ff0000; font-weight: bold; font-size: 12px;" id ="addresserror"> </p></center>
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
                     <center><p style="color: #ff0000; font-weight: bold; font-size: 12px;" id ="registererror"> </p></center>
                  <div class="text-center">
                    <button type="button" class="btn bg-gradient-primary w-100 my-4 mb-2" id="reg_btn" name="reg_btn" onclick="guardianValidate()">Sign Up</button>
                  </div>
                  <p class="mt-4 text-sm text-center">
                  Already have an account?
                    <a href="index.php" class="text-primary text-gradient font-weight-bold">Sign In</a>
                  </p>
               <!--  </form> -->

              </div>
            </div>
          </div>
        </div>
        <div class="alert alert-dark alert-dismissible text-white" role="alert" id="process" style="display:none;">
                <span class="text-sm">Processing Your Request</span>
        </div>
        <div class="alert alert-success alert-dismissible text-white" role="alert" id="success" style="display:none;">
                <span class="text-sm">Registerd Successfully </span>
               
        </div>
        <div class="alert alert-danger alert-dismissible text-white" role="alert" id="fail" style="display:none;">
                <span class="text-sm" id="responseerror">Sorry Technical Problem..Try again later.!! </span>
               
        </div>
      </div> 

  <!--   Core JS Files   -->
<?php include("../includes/inner-footer.php");?>