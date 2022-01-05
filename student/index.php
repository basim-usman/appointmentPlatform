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
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Student Login </h4>
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
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Email"  required>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label"></label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                  </div>
                  <center><p style="color: #ff0000; font-weight: bold; font-size: 12px;" id ="loginerror"> </p></center>
                  <div class="text-center">
                    <button type="button" class="btn bg-gradient-primary w-100 my-4 mb-2" onclick="studentAuth();">Login</button>
                  </div>
                  <p class="mt-4 text-sm text-center">
                    Don't have an account?
                    <a href="sregister.php" class="text-primary text-gradient font-weight-bold">Sign up</a>
                  </p>
               <!--  </form> -->
              </div>
            </div>
          </div>
        </div>
        <div style="margin-top: 80px;">
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
        
      </div> 

  <!--   Core JS Files   -->
<?php include("../includes/inner-footer.php");?>