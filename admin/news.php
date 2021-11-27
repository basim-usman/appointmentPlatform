<?php  include('../includes/inner-header.php');  ?>

<body class="g-sidenav-show  bg-gray-200">
<?php  include('../includes/asidebar.php'); 
      include ('../classes/admin.php');
$admin = new Admin();
$result = $admin->lastNews();

 ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
   <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Admin  </a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">News</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">News</h6>
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
                <h6 class="text-white text-capitalize ps-3">News </h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="col-12 mt-4">
                <div class="row">
                <?php if($result)
                        { $hit = 0;
                          foreach ($result as $row ) { 
                            $hit++;
                ?>
                  <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                    <div class="card card-blog card-plain">
                      <div class="card-header p-0 mt-n4 mx-3">
                        <a class="d-block shadow-xl border-radius-xl">
                          <img src="../assets/img/home-decor-1.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                        </a>
                      </div>
                      <div class="card-body p-3">
                        <p class="mb-0 text-sm">News # <?php echo $hit;?></p>
                        <a href="javascript:;">
                          <h5>
                            <?php echo $row['title']; ?>
                          </h5>
                        </a>
                        <p class="mb-4 text-sm">
                         <?php echo $row['description']; ?>
                        </p>
                         <div class="d-flex align-items-center justify-content-between">
                            <button type="button" class="btn btn-outline-primary btn-sm mb-0">  <?php echo $row['status']." News"; ?></button>
                        
                        </div>
                      </div>
                    </div>
                  </div> 
                   <?php  } ?>         
                  <?php }?>

                </div>
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
          <div class="alert alert-danger alert-dismissible text-white" role="alert" id="fail" style="display:none;">
                <span class="text-sm" id="responseerror">Sorry Technical Problem..Try again later.!! </span>
               
          </div>
        </div>


<?php  include('../includes/inner-footer.php');  ?>
