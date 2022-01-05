<?php
include_once("../classes/dbAccess.php");

class Teachers2 extends DbAccess {

public function teacherNotification2()
	{
			
		$id = $_GET['id'];
			$query = "UPDATE `schedules` SET status_notification = 1	WHERE sc_id = '$id' ";
			
			$result = mysqli_query($this->DBlink,$query);
		  header('location: sdashboard.php');
			
	}
public function removeRescheduleNotification()
	{
			
		  $id = $_GET['id'];
			$query = "UPDATE `bookings` SET notification = 'false'	WHERE b_id = '$id' ";
			
			$result = mysqli_query($this->DBlink,$query);
		  header('location: sdashboard.php');
			
	}
}

  $signuprun = new Teachers2();
  if($_GET['state'] == 0 ){
  	$signuprun->teacherNotification2();
  }else if($_GET['state']==1){
$signuprun->removeRescheduleNotification();
  }else{
  	 header('location: sdashboard.php');
  }
  
  
?>