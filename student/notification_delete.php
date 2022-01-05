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

}
  $signuprun = new Teachers2();
  $signuprun->teacherNotification2();
?>