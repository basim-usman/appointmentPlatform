<?php 
 error_reporting(E_ALL); 
 session_start();

 if(  (  (($_SESSION['islogin'])) AND ($_SESSION['islogin'] == true) ) OR ($_SESSION['islogin'] != NULL) ){

    if($_SESSION['type'] == 'student'){
         $url = "../student/sdashboard.php";
        echo "<script>window.location.href='".$url."';</script>";
    }
    
    if($_SESSION['type'] == 'teacher'){
         $url = "../teacher/tdashboard.php";
        echo "<script>window.location.href='".$url."';</script>";
    }

    if($_SESSION['type'] == 'guardian'){
         $url = "../guardian/gdashboard.php";
        echo "<script>window.location.href='".$url."';</script>";
    }
} 

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Appointment Portal
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="./../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="./../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
  <script type='text/javascript' src='../functions.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
</head>
