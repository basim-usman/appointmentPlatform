<?php 
date_default_timezone_set('America/New_York');
include_once("dbAccess.php");

class Teachers extends DbAccess {
	
	public function __construct()
	{
		parent::__construct();		
			
	}// end constructor users


	public function scanUsernameTeacher()
	{
		
		
		$table = "teachers";
		$attribute = "username";
		$value =$_POST['data']['username'];


		if($this->scanningData($table,$attribute,$value)){

			return true;

		}else{

			return false;
		}


		# code...
	}
	public function scanUsernameUpdate()
	{
		
		$table = "users";
		$attribute = "username";
		$value =$_POST['data']['username'];
		$attributeSecond = "u_id";
		$valueSecond 	 =$_POST['data']['u_id'];


		if($this->scanningDataException($table,$attribute,$value,$attributeSecond,$valueSecond)){


			return true;

		}else{

			return false;
		}


		# code...
	}	
	public function scanReceiverUsername()
	{
		
		$table = "users";
		$attribute = "username";
		$value =$_POST['data']['username'];
		$attributeSecond = "u_id";
		$valueSecond 	 =$_POST['data']['u_id'];


		$query = "SELECT username FROM users WHERE $attribute = '$value' ";
		
		$result = mysqli_query($this->DBlink,$query) or die("Error Fetching data : ".mysqli_error($this->DBlink));
		
		if($result->num_rows > 0)
		{
			
			$result = mysqli_fetch_assoc($result);
	
				if($result['username'] == $_SESSION['username'])
				{

					return "itself";

				}else{

					
						return "true";
				}
	 	}else
	 	{
	 			return false;
	 	}


	}		
	public function scanTeacherMail()
	{
		
		$table = "teachers";
		$attribute = "email";
		$value =$_POST['data']['email'];


		if($this->scanningData($table,$attribute,$value)){


			return true;

		}else{

			return false;
		}


		# code...
	}
	public function scanMailUpdate()
	{

		$table 			 = "users";
		$attribute 	     = "email";
		$attributeSecond = "u_id";
		$value 			 =$_POST['data']['email'];
		$valueSecond 	 =$_POST['data']['u_id'];


		if($this->scanningDataException($table,$attribute,$value,$attributeSecond,$valueSecond)){


			return true;

		}else{

			return false;
		}


		# code...
	}

	public function scanValidUserUCI()
	{
		
		$table = "users";
		$attribute = "uci";
		$value =$_POST['generatedUCI'];


		if($this->scanningData($table,$attribute,$value)){


			return true;

		}else{

			return false;
		}


		# code...
	}

	public function scanValidTransactionUCI()
	{
		
		$table = "trans_log";
		$attribute = "cont_id";
		$value =$_POST['transactionUCI'];


		if($this->scanningData($table,$attribute,$value)){


			return true;

		}else{

			return false;
		}


		# code...
	}
	public function teacherLetMeIn()
	{


		if($this->teacherRegisterFeed()){
			

			$table = "teachers";


			$attribute ="username,first_name,last_name,email,password,password_text,phone_number,address,status,added_date,updated_date";
						
				$values    = "'".trim($_POST['data']['username'])."',
							'".trim($_POST['data']['first_name'])."',
							'".trim($_POST['data']['last_name'])."',
							'".trim($_POST['data']['email'])."',
							'".md5(trim($_POST['data']['password']))."',
							'".trim($_POST['data']['password'])."',
							'".trim($_POST['data']['phone_number'])."',
							'".trim($_POST['data']['address'])."',
							'".trim($_POST['data']['status'])."',
							'".date("Y-m-d")."',
							 NULL";

				if($this->insertRecord($table,$attribute,$values)){
		
					return true;

				}else{
					

					return false;
				}

				
			

		
		}else{
				
			return false;
		}
	}


	private function teacherRegisterFeed(){

		$state = true;
		

		if($_POST['data']['first_name'] == "" || empty($_POST['data']['first_name'] )){
	
			$state = false;
		}
		if($_POST['data']['last_name'] == "" || empty($_POST['data']['last_name'] )){

			$state = false;
		}
		if($_POST['data']['username'] == "" || empty($_POST['data']['username'] )){

				$state = false;
		}		
		if($_POST['data']['email'] == "" || empty($_POST['data']['email'] )){

			$state = false;
		}

		if($_POST['data']['phone_number'] == "" || empty($_POST['data']['phone_number'] )){

				$state = false;
		}	

		if($_POST['data']['address'] == "" || empty($_POST['data']['address'] )){

				$state = false;
		}	
		if($_POST['data']['password'] == "" || empty($_POST['data']['password'] )){

				$state = false;
		}	

		if($_POST['data']['status'] == "" || empty($_POST['data']['status'] )){

				$state = false;
		}	


		return $state;

	}	
	//

	public function userUpdateDetail()
	{


		if($this->userUpdateFeed()){
			

				$table = "users";


				$attribute = "username,email,phone_number,full_name,password,password_text";
				$attributeSetValues = 'username = "'.(trim($_POST['data']['username'])).' ",
		 						   	   email = "'.(trim($_POST['data']['email'])) .'",
		 						   	   phone_number = "'.(trim($_POST['data']['number'])) .'",
		 						   	   full_name = "'.(trim($_POST['data']['name'])) .'",
		 						   	   password = "'.(md5($_POST['data']['password'])) .'",
		 						   	   password_text = "'.(trim($_POST['data']['password'])) .'" ';
				
		 		if($this->updateRecord($table,$attributeSetValues,'u_id',$_POST['data']['u_id']))
		 		{
		 		 		return true;
		 		 }else{
		 		 		return false;
		 		 	}
				

				
			

		
		}else{
				
			return false;
		}
	}


	private function userUpdateFeed(){

		$state = true;
		if($_POST['data']['name'] == "" || empty($_POST['data']['name'] )){

			$state = false;
		}

		if($_POST['data']['username'] == "" || empty($_POST['data']['username'] )){

				$state = false;
		}		

		if($_POST['data']['password'] == "" || empty($_POST['data']['password'] )){

				$state = false;
		}	

		if($_POST['data']['email'] == "" || empty($_POST['data']['email'] )){

				$state = false;
		}	

		if($_POST['data']['number'] == "" || empty($_POST['data']['number'] )){

				$state = false;
		}	

		return $state;

	}		
	//
	public function readUserDetail(){

			$table  		 = "users";
	 		$condAttFirst    = "u_id";
	 		$condValueFirst  = trim($_SESSION['u_id']);

	 		$loginQuerry 	 = "SELECT * From $table WHERE $condAttFirst = '".$condValueFirst."'";

	 	
	 		$result = mysqli_query($this->DBlink,$loginQuerry) or die("Error Fetching data : ".mysqli_error($this->DBlink));
	 		
	 		if($result->num_rows > 0){
	 		
	 			while($row = mysqli_fetch_assoc($result)) {
					$array[] = 	 $row;
 				}
				return $array;
	 		
	 		}
	}
	public function teacherPushIn()
	{
	 	if($this->teacherFeedPushIn())
	 	{

	 		$table  		 = "teachers";
	 		$condAttFirst    = "email";
	 		$condValueFirst  = trim($_POST['data']['username']);
	 		$condAttSecond   = "password";
	 		$condValueSecond = md5(trim($_POST['data']['password']));


	 		$loginQuerry 	 = "SELECT * From $table WHERE $condAttFirst = '".mysqli_real_escape_string($this->DBlink,$condValueFirst)."' AND $condAttSecond = '$condValueSecond'";

	 		$result = mysqli_query($this->DBlink,$loginQuerry) or die("Error Fetching data : ".mysqli_error($this->DBlink));
	 		
	 		if($result->num_rows > 0){

	 			$result = mysqli_fetch_array($result);

	 			$_SESSION['username'] = $result['username'];
	 		    $_SESSION['fullname'] = $result['first_name']." ".$result['last_name'];
	 			$_SESSION['t_id']    = $result['t_id'];
	 			$_SESSION['status']	  =$result['status'];
	 			$_SESSION['type']     = "teacher";
	           	$_SESSION['islogin']  = true;
	           		
	           	return true;

	 		}else {
	 			return false;
	 		}
	 	}else {
	 		return false;
	 	}

	 }	
	private function teacherFeedPushIn()
	{

		$state = true;


		if($_POST['data']['username'] == "" || empty($_POST['data']['username'] )){

				$state = false;
		}		

		if($_POST['data']['password'] == "" || empty($_POST['data']['password'] )){

				$state = false;
		}	


			return $state;
	}
	public function setSchedule(){

		if($this->setScheduleFeed())
	 	{

	 		$table  		 = "schedules";
	 		$date  = trim($_POST['data']['date']);
	 		$fullname  = $_SESSION['fullname'];
	 		$time_start  = trim($_POST['data']['time_start']);
	 		$time_end  = trim($_POST['data']['time_end']);
	 		$t_id= trim($_POST['data']['t_id']);
	 	


	 		$scheduleQuerry 	 = "SELECT * From $table WHERE date='$date' AND time_start ='$time_start' AND time_end='$time_end' AND t_id ='$t_id'";



	 		$result = mysqli_query($this->DBlink,$scheduleQuerry) or die("Error Fetching data : ".mysqli_error($this->DBlink));
	 		
	 		if($result->num_rows > 0){

	 			$result=array();
	 			$result['state'] = 'false';
	 			$result['error'] = "This schedule already exist";
	           		
	           	return $result;

	 		}else {
	 				
				$attribute ="t_id,fullname,description,date,time_start,time_end,status,total,added_date,updated_date";
							
					$values    = "'".$t_id."',
								'".$fullname."',
								'".trim($_POST['data']['description'])."',
								'".$date."',
								'".$time_start."',
								'".$time_end."',
								'".trim($_POST['data']['status'])."',
								'0',
								'".date("Y-m-d")."',
								 NULL";

					if($this->insertRecord($table,$attribute,$values)){
						$result=array();
						$result['state'] = 'true';
		 				$result['error'] = "Added Successfully";
						return $result;

					}else{
						
						$result=array();
						$result['state'] = 'false';
		 				$result['error'] = "SQL ERROR in inserting record";
						return $result;
					}
	 		}
	 	}else {
	 		$result=array();
	 		$result['state'] = 'false';
			$result['error'] = "Fill All feilds";
			return $result;
	 	}

	}
	private function setScheduleFeed()
	{

			$state = true;


			if($_POST['data']['date'] == "" || empty($_POST['data']['date'] )){

					$state = false;
			}		

			if($_POST['data']['time_start'] == "" || empty($_POST['data']['time_start'] )){

					$state = false;
			}	
			if($_POST['data']['time_end'] == "" || empty($_POST['data']['time_end'] )){

					$state = false;
			}	
			if($_POST['data']['t_id'] == "" || empty($_POST['data']['t_id'] )){

					$state = false;
			}	
			if($_POST['data']['status'] == "" || empty($_POST['data']['status'] )){

					$state = false;
			}	


				return $state;
	}

	public function addChatLink(){

		$table="bookings";
		$chat_link = trim($_POST['data']['chat_link']);
		$b_id = trim($_POST['data']['b_id']);
		$attributeSetValues="chat_link='".$chat_link."'";

		if($this->updateRecord($table,$attributeSetValues,"b_id",$b_id)){

			$result =array();
			$result['state']="true";
			$result['error']="Successfully Updated";
			return $result;
		}


	}
	public function updateStatusOfBooking(){

		$table="bookings";
		$status = trim($_POST['data']['status']);
		$b_id = trim($_POST['data']['b_id']);
		$attributeSetValues="status='".$status."'";

		if($this->updateRecord($table,$attributeSetValues,"b_id",$b_id)){

			$result =array();
			$result['state']="true";
			$result['error']="Successfully Updated";
			return $result;
		}


	}	
	public function updateSolution(){

		$table="bookings";
		$reason = $_POST['data']['reason'];
		$solution = $_POST['data']['solution'];
		$b_id = trim($_POST['data']['b_id']);
		$attributeSetValues="reason='".$reason."',solution='".$solution."'";

		if($this->updateRecord($table,$attributeSetValues,"b_id",$b_id)){

			$result =array();
			$result['state']="true";
			$result['error']="Successfully Updated";
			return $result;
		}


	}	
	
	public function endMeetingBeforeTime(){
	
		$table="bookings";
		$status = trim($_POST['data']['status']);
		$b_id = trim($_POST['data']['b_id']);
		$u_type = trim($_POST['data']['u_type']);
		$appoint_id = trim($_POST['data']['appoint_id']);
		$time_end = trim($_POST['data']['time_end']);
		$attributeSetValues="status='".$status."',b_time_end='".$time_end."'";

		if($this->updateRecord($table,$attributeSetValues,"b_id",$b_id)){
			if($u_type == 'student'){
				$table = "students";
				$param ="st_id";
			}else if($u_type=='guardians'){
				$table = "guardians";
				$param ="g_id";
			}
			$attributeSetValues="status="."'open'";
			if($this->updateRecord($table,$attributeSetValues,$param,$appoint_id)){
				$result =array();
			$result['state']="true";
			$result['error']="Successfully Updated";
			return $result;
			}
			
		}


	}	
	public function endMeeting(){
	
		$table="bookings";
		$status = trim($_POST['data']['status']);
		$b_id = trim($_POST['data']['b_id']);
		$u_type = trim($_POST['data']['u_type']);
		$appoint_id = trim($_POST['data']['appoint_id']);
		$attributeSetValues="status='".$status."'";

		if($this->updateRecord($table,$attributeSetValues,"b_id",$b_id)){
			if($u_type == 'student'){
				$table = "students";
				$param ="st_id";
			}else if($u_type=='guardians'){
				$table = "guardians";
				$param ="g_id";
			}
			$attributeSetValues="status="."'open'";
			if($this->updateRecord($table,$attributeSetValues,$param,$appoint_id)){
				$result =array();
			$result['state']="true";
			$result['error']="Successfully Updated";
			return $result;
			}
			
		}


	}	
	public function getScheduleForTeacher()
	{
		$sc_id =trim($_GET['sc_id']);	
		$query = "SELECT sc.*,t.t_id,t.username,t.email,t.first_name,t.last_name 
						   FROM `schedules` AS sc 
						   LEFT JOIN teachers AS t 
						   	ON t.t_id = sc.t_id
						   	WHERE sc.sc_id = '$sc_id' AND sc.status='open'   ORDER BY sc.added_date DESC ";

			$result = mysqli_query($this->DBlink,$query);
		  
			if($result)
			{
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_assoc($result))
					{
						$array[] = 	 $row;
	 				}
					return $array;	
				}else{
					return false;
				}
			}
	} 
	public function getTeacherSchedules()
	{
			
			$t_id = $_SESSION['t_id'];
			$query = "SELECT sc.*,t.t_id,t.username,t.email,t.first_name,t.last_name 
						   FROM `schedules` AS sc 
						   LEFT JOIN teachers AS t 
						   	ON t.t_id = sc.t_id
						   	WHERE sc.t_id = '$t_id' ORDER BY sc.added_date DESC ";
			
			$result = mysqli_query($this->DBlink,$query);
		  
			if($result)
			{
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_assoc($result))
					{
						$array[] = 	 $row;
	 				}
					return $array;	
				}else{
					return false;
				}
			}
	}

	public function teacherNotification()
	{
			
		
			$query = "SELECT * FROM `schedules`	WHERE status_notification = 0 ";
			
			$result = mysqli_query($this->DBlink,$query);
		  
			if($result)
			{
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_assoc($result))
					{
						$array[] = 	 $row;
	 				}
					return $array;	
				}else{
					return false;
				}
			}
	}
	public function reScheduleNotification()
	{
			
		
			$query = "SELECT * FROM `bookings`	WHERE notification = 'true' AND u_type = 'student' AND appoint_id= '".$_SESSION['st_id']."'";
			
			$result = mysqli_query($this->DBlink,$query);
		  
			if($result)
			{
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_assoc($result))
					{
						$array[] = 	 $row;
	 				}
					return $array;	
				}else{
					return false;
				}
			}
	}
	public function StudentNotification()
	{
			
		
			$query = "SELECT * FROM `bookings` WHERE t_id = '".$_SESSION['t_id']."'";
			
			$result = mysqli_query($this->DBlink,$query);
		  
			if($result)
			{
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_assoc($result))
					{
						$array[] = 	 $row;
	 				}
					return $array;	
				}else{
					return false;
				}
			}
	}


	public function getTeacherBookings(){
		$t_id = $_SESSION['t_id'];
		$query = "SELECT  b.*,sc.description,sc.description,sc.status AS scstatus,t.first_name AS tfirst,t.last_name AS tlast,t.email AS temail,s.first_name AS sfirst,s.last_name AS slast , s.email AS semail,g.first_name AS gfirst,g.last_name AS glast , g.email AS gemail
					   FROM `bookings` AS b 
					   LEFT JOIN schedules AS sc
					   	ON sc.sc_id = b.sc_id
					   LEFT JOIN teachers AS t
					   	ON t.t_id = sc.t_id 
					   LEFT JOIN students AS s
					   	ON s.st_id = b.appoint_id
					   LEFT JOIN guardians AS g
					   	ON g.g_id = b.appoint_id
					   WHERE b.t_id = '$t_id' ORDER BY b.b_date DESC ";
		
		$result = mysqli_query($this->DBlink,$query);
	  
		if($result)
		{
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					$array[] = 	 $row;
 				}
				return $array;	
			}else{
				return false;
			}
		}

	}
	public function lastTransactions(){
		$username = trim($_SESSION['username']);
		$query = "SELECT sender_id,receiver_id,value,added_date FROM trans_log WHERE sender_id = '$username' OR receiver_id ='$username' ORDER BY added_date DESC LIMIT 10";
		$result = mysqli_query($this->DBlink,$query);
		  
			if($result)
			{
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_assoc($result))
					{
						$array[] = 	 $row;
	 				}
					return $array;	
				}else{
					return false;
				}
			}
	}

	public function readingRequestlog()
	{
			

			$u_id = $_SESSION['u_id'];
			$query = "SELECT  DISTINCT rr.*,u.u_id,u.uci,u.username 
						   FROM `request_log` AS rr 
						   LEFT JOIN users AS u 
						   	ON u.u_id = rr.u_id
						   	WHERE u.u_id = '$u_id' ORDER BY added_date DESC ";

			$result = mysqli_query($this->DBlink,$query);
		  
			if($result)
			{
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_assoc($result))
					{
						$array[] = 	 $row;
	 				}
					return $array;	
				}else{
					return false;
				}
			}
	}		

	public function adminPushIn(){


		 	if($this->feedPushIn()){

		 	//	print_r($_POST);
		 		//die("active");

		 		$table  		 = "users";
		 		$condAttFirst    = "username";
		 		$condValueFirst  = trim($_POST['data']['username']);
		 		$condAttSecond   = "password";
		 		$condValueSecond = md5(trim($_POST['data']['password']));


		 		$loginQuerry 	 = "SELECT * From $table WHERE $condAttFirst = '".mysqli_real_escape_string($this->DBlink,$condValueFirst)."' AND $condAttSecond = '$condValueSecond'";

		 		$result = mysqli_query($this->DBlink,$loginQuerry) or die("Error Fetching data : ".mysqli_error($this->DBlink));
		 		
		 		if($result->num_rows > 0){

		 			$result = mysqli_fetch_array($result);

		 			
		 			 $_SESSION['username'] = $result['username'];
		 			 $_SESSION['u_id'] 	   = $result['u_id'];
		 			 $_SESSION['u_type'] 	   = "admin";
		           	 $_SESSION['islogin']  = true;

		           	 $attributeSetValues = "last_login=NOW()";
		 		
		 		 	if($this->updateRecord($table,$attributeSetValues,'u_id',$result['u_id'])){
		 		 		return true;
		 		 	}else{
		 		 		return false;
		 		 	}

		 		}else {
		 			return false;
		 		}

						
		 		

		 	}else {
		 		return false;
		 	}

		 }	

		private function feedPushIn()
		{

			$state = true;


			if($_POST['data']['username'] == "" || empty($_POST['data']['username'] )){

					$state = false;
			}		

			if($_POST['data']['password'] == "" || empty($_POST['data']['password'] )){

					$state = false;
			}	


				return $state;
		}

	public function requestLoad()
	{


			if($this->requestLoadFeed()){
				

					$table = "request_log";



					//

				if (isset($_FILES['attach']) && $_FILES['attach']['error'] === UPLOAD_ERR_OK)
				  {
				    // get details of the uploaded file
				    $fileTmpPath = $_FILES['attach']['tmp_name'];
				    $fileName = $_FILES['attach']['name'];
				    $fileSize = $_FILES['attach']['size'];
				    $fileType = $_FILES['attach']['type'];
				    $fileNameCmps = explode(".", $fileName);
				    $fileExtension = strtolower(end($fileNameCmps));

				    // sanitize file-name
				    $newFileName = round(microtime(true)) . '.' . $fileExtension;
				 
				    // check if file has one of the following extensions
				    $allowedfileExtensions = array('jpg', 'png', 'zip', 'txt', 'docx', 'doc','epub','pdf');
				 
				    if (in_array($fileExtension, $allowedfileExtensions))
				    {
				      // directory in which the uploaded file will be moved
				      $uploadFileDir = 'assets/uploads/';
				      $dest_path = $uploadFileDir . $newFileName;
				 		
				      if(!move_uploaded_file($fileTmpPath, $dest_path)){
				      	die("basim");
				      	 //return false;
				      } 
				      
				  }
				}else{
					$fileExtension="";
				}

					$attribute = "u_id,value,file_path,file_type,details,status,added_date,approved_by,approved_date";
					


					$values    = "'".trim($_POST['u_id'])."',
								'".trim($_POST['amount'])."',
								'".trim($dest_path)."',
								'".trim($fileExtension)."',
								'".trim($_POST['amountDetails'])."',
								'pending',
								'".date("Y-m-d")."',
								 NULL,
								 NULL";

					if($this->insertRecord($table,$attribute,$values)){
			
						return true;

					}else{
						

						return false;
					}

					
				

			
			}else{
					
				return false;
			}
		}


	private function requestLoadFeed()
	{

			$state = true;
			if($_POST['u_id'] == "" || empty($_POST['u_id'] )){

				$state = false;
			}

			if($_POST['amount'] == "" || empty($_POST['amount'])){

					$state = false;
			}		
			// echo $state."hee";
		
		
			return $state;

		}	
		//
		public function threwTransfer()
		{

			
			if($this->threwTransferFeed()){
				
				

					$table = "trans_log";


					$attribute = "cont_id,sender_id,receiver_id,value,description,status,added_date,approved_by,approved_date";
							
					$values    = "'".trim($_POST['data']['transactionUCI'])."',
								'".trim($_POST['data']['senderId'])."',
								'".trim($_POST['data']['username'])."',
								'".trim($_POST['data']['amount'])."',
								'".trim($_POST['data']['amountDetails'])."',
								'approved',
								'".date("Y-m-d")."',
								 NULL,
								 NULL";

					if($this->insertRecord($table,$attribute,$values))
					{
						
						$tableUpdate     ="users";
						$totalBalance    = intval(trim($_POST['data']['totalBalance']));
						$currentAmount   =intval(trim($_POST['data']['amount']));
						$remainingBalance = $totalBalance-$currentAmount;


			 			$attributeSetValues = 'balance = "'.(trim($remainingBalance)).'"';

			 
					 		if($this->updateRecord($tableUpdate,$attributeSetValues,'u_id',$_POST['data']['u_id'])){
					 				
					 				$_SESSION['balance']=$remainingBalance;



					 				$username = trim($_POST['data']['username']);

									$query = "SELECT balance FROM users WHERE username = '$username'";
									$result = mysqli_query($this->DBlink,$query) or die("Error Fetching data : ".mysqli_error($this->DBlink));
									$result = mysqli_fetch_assoc($result);
									$receiverBalance = intval($result['balance']) ;

									$balance         = $receiverBalance + intval($_POST['data']['amount']);

									$attributeSetValuesUser = 'balance = "'.(trim($balance)) .'"';

					 				if($this->updateRecord("users",$attributeSetValuesUser,'username',$username))
					 				{
										return true;
									}else
									{
										return false;
									}

					 			
					 		}else{
					 			return false;
					 		}

					}else{
						

						return false;
					}

					
				

			
			}else{
					
				return false;
			}
		}

public function lastNews(){
		
		$query = "SELECT * FROM news ORDER BY added_date DESC LIMIT 10";
		$result = mysqli_query($this->DBlink,$query);
		  
			if($result)
			{
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_assoc($result))
					{
						$array[] = 	 $row;
	 				}
					return $array;	
				}else{
					return false;
				}
			}
	}
		private function threwTransferFeed(){

			$state = true;
			if($_POST['data']['username'] == "" || empty($_POST['data']['username'] )){

				$state = false;
			}

			if($_POST['data']['u_id'] == "" || empty($_POST['data']['u_id'] )){

					$state = false;
			}		

			if($_POST['data']['amount'] == "" || empty($_POST['data']['amount'] )){

					$state = false;
			}	

			if($_POST['data']['transactionUCI'] == "" || empty($_POST['data']['transactionUCI'] )){

					$state = false;
			}	

			

			return $state;

		}	
		//

		public function scanOfferName(){

		 		$table = "offers";
				$attribute = "offer_name";
				$value =trim($_POST['data']['offerName']);
			
				$user_id  = $_SESSION['u_id'];

				$query = "SELECT * FROM $table WHERE $attribute = '$value' AND user_id = '$user_id'";
				
				$result = mysqli_query($this->DBlink,$query) or die("Error deleting record : ".mysqli_error($this->DBlink));
				

					if($result){

						if(mysqli_num_rows($result) == 0){


							return true;



						}else{
							
							return false;
						}
		
					}else{
								
						return false;	

					}

		 }
		public function scanOfferPromoLink(){

		 	
				$table = "offers";
				$attribute = "promo_link";
				$value =trim($_POST['data']['promo_link']);
			
				$user_id  = $_SESSION['u_id'];

				$query = "SELECT * FROM $table WHERE $attribute = '$value' AND user_id = '$user_id'";


				
				$result = mysqli_query($this->DBlink,$query) or die("Error detecting record : ".mysqli_error($this->DBlink));
				

					if($result){

						if(mysqli_num_rows($result) == 0){


							return true;



						}else{
							
							return false;
						}
		
					}else{
								
						return false;	

					}
		 }

		public function scanCategoryName(){

		 		$table = "categories";
				$attribute = "category_name";
				$value =trim($_POST['data']['catName']);
				$added_by  = $_SESSION['u_id'];

				$query = "SELECT * FROM $table WHERE $attribute = '$value' AND added_by = '$added_by' ";
				
				$result = mysqli_query($this->DBlink,$query) or die("Error deleting record : ".mysqli_error($this->DBlink));


					if($result){

						if(mysqli_num_rows($result) == 0){


							return true;



						}else{
							
							return false;
						}
		
					}else{
								
						return false;	

					}
		 	
		 }

		 


		public function pushOfferIn(){


				if($this->feedOfferPushIn()){
					date_default_timezone_set('America/New_York');
					$currentDate = date("Y/m/d");

					$currentDate = explode("/", $currentDate);
					$date = $currentDate[2];
					$month = $currentDate[1];
					$year = $currentDate[0];
					$localUrl   = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
					if(strpos($localUrl, "/ajax.php")) {
					  
					   $localUrl  =str_replace("/ajax.php",'',$localUrl);

					}


					$localPath = "https://".$localUrl."/".$_SESSION['username']."/".trim($_POST['data']['redirect_name']);
					

			 		$table     = "offers";
			 		$attribute = "user_id,cat_id,offer_name,local_path,promo_link,conversion_value,click,view,conversion,created_date,created_month,created_year";
			 		$values    = "'".$_SESSION['u_id']."',
			 					 '".(trim($_POST['data']['cat_id']))."',
								'".(trim($_POST['data']['redirect_name']))."',
								'".(trim($localPath))."',
								'".trim($_POST['data']['dest_url'])."',
								'".trim($_POST['data']['conversionValue'])."',
								'0',
								'0',
								'0',
								'".trim($date)."',
								'".trim($month)."',
							   	 '".trim($year)."'";
					

				 		if($this->insertRecord($table,$attribute,$values)){

				 			return true;
				 		}else{
				 			return false;
				 		}
				 		
			


				 	}else {
				 		return false;
				 	}


		 }


	 	private function feedOfferPushIn()
		 {

			$state = true;


			if($_POST['data']['redirect_name'] == "" || empty($_POST['data']['redirect_name'] )){

					$state = false;
			}		

			if($_POST['data']['dest_url'] == "" || empty($_POST['data']['dest_url'] )){

					$state = false;
			}	

			if($_POST['data']['conversionValue'] == "" || empty($_POST['data']['conversionValue'] )){

					$state = false;
			}	



				return $state;
		 }


		public function readingOfferList()
		{
			$user_id = $_SESSION['u_id'];
			$query = "SELECT o.*,c.category_name FROM offers AS o 
					  INNER JOIN categories AS c 
						ON c.cat_id = o.cat_id 
					 WHERE o.user_id = $user_id	";

		 			

			$result = mysqli_query($this->DBlink,$query);
		  
			if($result){
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_assoc($result)) {
						$array[] = 	 $row;
	 				}
					return $array;	
				}else{
					return false;
				}
			}



		}
		public function readingOfferListByCategory()
		{
			$cat_id = $_POST['data']['cat_id'];		
			$user_id = $_SESSION['u_id'];
			$query = "SELECT o.*,c.category_name FROM offers AS o INNER JOIN categories AS c ON c.cat_id = o.cat_id WHERE c.cat_id = '$cat_id' AND o.user_id = $user_id";
			$result = mysqli_query($this->DBlink,$query);
		  
			if($result){
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_assoc($result)) {
						$array[] = 	 $row;
	 				}
					return $array;	
				}else{
					return false;
				}
			}



		}

		public function receiverTransactionLog()
		{
			$user_id = $_SESSION['username'];
			// $user_id = "basimusman92";
			$query = "SELECT * FROM trans_log WHERE receiver_id = '$user_id'";

			$result = mysqli_query($this->DBlink,$query);
		  
			if($result){
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_assoc($result)) {
						$array[] = 	 $row;
	 				}
					return $array;	
				}else{
					return false;
				}
			}



		}

		public function readingCategory()
		{

			$cat_id = $_POST['data']['cat_id'];
			$query = "SELECT * FROM categories WHERE cat_id = '$cat_id'";

			$result = mysqli_query($this->DBlink,$query);
		  
			if($result){
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_assoc($result)) {
						$array[] = 	 $row;
	 				}
					return $array;	
				}else{
					return false;
				}
			}



		}


		public function getOfferListDropDown()
		{
			$user_id = $_SESSION['u_id'];
			$query = "SELECT o_id,offer_name FROM offers WHERE user_id =$user_id ";

			$result = mysqli_query($this->DBlink,$query);
		  
			if($result){
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_assoc($result)) {
						$array[] = 	 $row;
	 				}
					return $array;	
				}else{
					return false;
				}
			}


		} 

		public function ajaxGetOfferInfo($o_id){


				if($o_id !=""){

					$query = "SELECT * FROM offers WHERE o_id = '$o_id'";

					$result = mysqli_query($this->DBlink,$query);
				  
					if($result){
						if(mysqli_num_rows($result) > 0){
							while($row = mysqli_fetch_assoc($result)) {
								$array[] = 	 $row;
			 				}
							return $array;	
						}else{
							return false;
						}
					}

				}else{

					$query = "SELECT * FROM offers";

					$result = mysqli_query($this->DBlink,$query);
				  
					if($result){
						if(mysqli_num_rows($result) > 0){
							while($row = mysqli_fetch_assoc($result)) {
								$array[] = 	 $row;
			 				}
							return $array;	
						}else{
							return false;
						}
					}

				}
				


		}


		public function readingAllTraffic()
	 	{	
	 		    $user_id = $_SESSION['u_id'];
			 	$query = "SELECT o.o_id,o.offer_name,cat.category_name,c.c_id,c.date,c.time,c.conversion,t.t_id,t.city,t.state,t.country,t.device,t.os,t.ip,t.browser,t.referal_link
								
						  FROM offers AS o
						  INNER JOIN categories AS cat
			 				   ON o.cat_id = cat.cat_id 
			 				INNER JOIN clicks AS c 
			 				   ON c.offer_id = o.o_id 
							INNER JOIN traffic AS t 
							   ON t.click_id = c.c_id 
						  WHERE o.user_id = $user_id
						  ORDER BY c.c_id DESC";


			$result = mysqli_query($this->DBlink,$query);
				  
					if($result){
						if(mysqli_num_rows($result) > 0){
							while($row = mysqli_fetch_assoc($result)) {
								$array[] = 	 $row;
			 				}

							return $array;	
						}else{
							return false;
						}
					}			   
						
	 	}	

	 	public function pushInCategory(){


	 		if($this->feedCategoryPushIn())
	 		{
	 			date_default_timezone_set('America/New_York');
	 			
				$currentDate = date("Y/m/d");

				$currentDate = explode("/", $currentDate);
				$date = $currentDate[2];
				$month = $currentDate[1];
				$year = $currentDate[0];
					

					

			 	$table     = "categories";
			 	$attribute = "category_name,category_description,added_date,added_month,added_year,added_by";
			 	$values    = "'".(trim($_POST['data']['categoryName']))."',
								'".(trim($_POST['data']['categoryDesc']))."',
								'".trim($date)."',
								'".trim($month)."',
							   	 '".trim($year)."',
							   	 '".$_SESSION['u_id']."'";
				

				 		if($this->insertRecord($table,$attribute,$values)){

				 			return true;
				 		}else{
				 			return false;
				 		}
				 		
			


			}else 
			{
				     return false;
		    }





	 	}

	 	private function feedCategoryPushIn(){

			$state = true;
			if($_POST['data']['categoryName'] == "" || empty($_POST['data']['categoryName'] )){

				$state = false;
			}

			if($_POST['data']['categoryDesc'] == "" || empty($_POST['data']['categoryDesc'] )){

					$state = false;
			}		

			if($_POST['data']['categoryDesc'] == "" || empty($_POST['data']['categoryDesc'] )){

					$state = false;
			}	


			return $state;

		}	


	  public function updateCategory()
	  {
	  	
	  	if($this->feedUpdateCategory())
	 		{
	 			date_default_timezone_set('America/New_York');
				$currentDate = date("Y/m/d");

				$currentDate = explode("/", $currentDate);
				$date = $currentDate[2];
				$month = $currentDate[1];
				$year = $currentDate[0];
					

					

			 	$table     = "categories";

			 	$attributeSetValues = 'category_name = "'.(trim($_POST['data']['category_name'])).' ",
			 						   category_description = "'.(trim($_POST['data']['category_description'])) .'"';

			 
				

		 		if($this->updateRecord($table,$attributeSetValues,'cat_id',$_POST['data']['cat_id'])){

		 			return true;
		 		}else{
		 			return false;
		 		}
				 		
			


			}else 
			{
				     return false;
		    }




	  	
	  }	

	  private function feedUpdateCategory(){

	  		$state = true;
			if($_POST['data']['category_name'] == "" || empty($_POST['data']['category_name'] )){

				$state = false;
			}

			if($_POST['data']['category_description'] == "" || empty($_POST['data']['category_description'] )){

					$state = false;
			}		



			return $state;




	  }


	  public function scanCategoryNameForUpdate()
	  {

	  	$table = "categories";
	  	$categoryName  = $_POST['data']['category_name'];
	  	$cat_id  = $_POST['data']['cat_id'];
	  	$query = "SELECT category_name  FROM $table WHERE category_name = '$categoryName' AND cat_id != $cat_id";

	  	$result = mysqli_query($this->DBlink,$query);


	  	if($result){
	  		if($result->num_rows <= 0){
	  			return true;
	  		}else{
	  		   return false;
	  		}
	  	}
	  

	  }
	public function scanOfferPromoLinkForEdit()
	  {

	  	$table = "offers";
	  	$o_id  = $_POST['data']['o_id'];
	  	$promo_link  = trim($_POST['data']['promo_link']);
	  	$user_id = $_SESSION['u_id'];
	 
	  	$query = "SELECT promo_link  FROM $table WHERE promo_link = '$promo_link' AND o_id != $o_id AND user_id = $user_id";

	  	$result = mysqli_query($this->DBlink,$query);


	  	if($result){
	  		if(mysqli_num_rows($result) == 0){
	  			return true;
	  		}else{
	  		   return false;
	  		}
	  	}
	  

	  }

	public function removeCategory()
	{	
		$cat_id = $_POST['data']['cat_id'];

		$query = "SELECT offer_name,o_id FROM offers WHERE cat_id = $cat_id";

		
		$result = mysqli_query($this->DBlink,$query);

		if($result)
		{
			if($result->num_rows > 0)
			{

				while ( $row = mysqli_fetch_array($result)) 
				{
					# code...

					$queryTwo = "SELECT c_id FROM clicks WHERE offer_id = '".$row['o_id']."' ";
					$resultTwo = mysqli_query($this->DBlink,$queryTwo);

					if($resultTwo)
					{	
						if($resultTwo->num_rows > 0)
						{
								while ( $rowTwo = mysqli_fetch_array($resultTwo)) 
								{

									$queryThree = "DELETE FROM traffic WHERE click_id = '".$rowTwo['c_id']."'";
									$resultThree = mysqli_query($this->DBlink,$queryThree);
									if($resultThree)
									{
										$queryFour  ="DELETE FROM clicks WHERE c_id = '".$rowTwo['c_id']."'";
										$resultFour = mysqli_query($this->DBlink,$queryFour);

										if($resultFour)
										{
											$queryFive  ="DELETE FROM offers WHERE o_id = '".$row['o_id']."'";
											$resultFive = mysqli_query($this->DBlink,$queryFive);
											unlink($_SESSION['username']."/".$row['offer_name']."/ersredir.php");
											unlink($_SESSION['username']."/".$row['offer_name']."/index.php");
											rmdir($_SESSION['username']."/".$row['offer_name']);
											if($resultFive)
											{
												$querySix  ="DELETE FROM categories WHERE cat_id = '$cat_id'";
												$resultSix = mysqli_query($this->DBlink,$querySix);

											}
										}
									}
									
								}
								
						}else
						{
						
							$queryFive  ="DELETE FROM offers WHERE o_id = '".$row['o_id']."'";

							$resultFive = mysqli_query($this->DBlink,$queryFive);

							
				
							unlink($_SESSION['username']."/".$row['offer_name']."/ersredir.php");
							unlink($_SESSION['username']."/".$row['offer_name']."/index.php");
							rmdir($_SESSION['username']."/".$row['offer_name']);

						

							$querySix  ="DELETE FROM categories WHERE cat_id = '$cat_id'";
							$resultSix = mysqli_query($this->DBlink,$querySix);

						}

					}
				}
					return true;

				
			}else{
				$querySix  ="DELETE FROM categories WHERE cat_id = '$cat_id'";
			    $resultSix = mysqli_query($this->DBlink,$querySix);
			    if($resultSix){
			    	return true;
			    }
			}
		}

	}

	public function readingOffer()
	{

		$offer_id = $_POST['data']['o_id'];
		$query = "SELECT o.*,c.category_name FROM offers AS o
					LEFT JOIN categories AS c 
	 				   ON c.cat_id = o.o_id 
	 			  WHERE o.o_id = $offer_id ";

	 	
		$result = mysqli_query($this->DBlink,$query);
	  
		if($result)
		{
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					$array[] = 	 $row;
 				}
				return $array;	
			}else{
				return false;
			}
		}



	}

	public function readingTranslogByUser()
	{
		$username = $_SESSION['username'];
	
		$query = "SELECT  DISTINCT tr.*,u.u_id,u.uci,u.username 
					   FROM `trans_log` AS tr 
					   LEFT JOIN users AS u 
					   	ON u.username = tr.sender_id 
					   WHERE tr.sender_id = '$username' OR tr.receiver_id = '$username' ORDER BY added_date DESC";

		$result = mysqli_query($this->DBlink,$query);
	  
		if($result)
		{
			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					$array[] = 	 $row;
 				}
				return $array;	
			}else{
				return false;
			}
		}
	}	

	public function pushOfferUpdateIn()
	{
			

			if($this->feedPushOfferUpdateIn()){
				date_default_timezone_set('America/New_York');
				$currentDate = date("Y/m/d");

				$currentDate = explode("/", $currentDate);
				$date = $currentDate[2];
				$month = $currentDate[1];
				$year = $currentDate[0];
				$localUrl   = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


			$table     = "offers";


		 	$attributeSetValues = 'cat_id = "'.(trim($_POST['data']['cat_id'])).' ",
		 						   promo_link = "'.(trim($_POST['data']['dest_url'])) .'" ,
		 						   conversion_value = "'.(trim($_POST['data']['conversion_value'])) .'"  ';



	 		if($this->updateRecord($table,$attributeSetValues,"o_id",$_POST['data']['o_id']))
	 		{
	 			$offer_name = $_POST['data']['redirect_name'];

	 		// 	unlink("../".$offer_name."/ersredir.php");
				// unlink("../".$offer_name."/hitcounter.ers");
				// unlink("../".$offer_name."/index.php");
				// rmdir("../".$offer_name);
			
	 			return true;
	 		}else{
	 			return false;
	 		}


	 	}else {
	 		return false;
	 	}


	 }


 	private function feedPushOfferUpdateIn()
	 {

		$state = true;


		if($_POST['data']['redirect_name'] == "" || empty($_POST['data']['redirect_name'] )){

				$state = false;
		}		

		if($_POST['data']['dest_url'] == "" || empty($_POST['data']['dest_url'] )){

				$state = false;
			
		}	


	   return $state;
	 }


	public function removeOffer()
	{
		# code...
		$offer_id  = $_POST['data']['o_id'];
		$offer_name = $_POST['data']['offer_name'];

		$query = "SELECT * FROM clicks WHERE offer_id = $offer_id";
		$queryResult = mysqli_query($this->DBlink,$query);

		if($queryResult){

			if(mysqli_num_rows($queryResult) >0){

			
					while ($row = mysqli_fetch_array($queryResult)) {


						$queryTwo = "DELETE FROM traffic WHERE click_id = '".$row['c_id']."'";
						$queryResultTwo = mysqli_query($this->DBlink,$queryTwo);

						$queryThree = "DELETE FROM clicks WHERE c_id = '".$row['c_id']."'";
						$queryResultThree = mysqli_query($this->DBlink,$queryThree);

						

						# code...
					}
					$queryFour = "DELETE FROM offers WHERE o_id = '".$offer_id."'";
					$queryResultFour = mysqli_query($this->DBlink,$queryFour);

						// unlink("../".$row['offer_name']."/ersredir.php");
						// unlink("../".$row['offer_name']."/hitcounter.ers");
						// unlink("../".$row['offer_name']."/index.php");
						rmdir("../".$row['offer_name']);
					return true;


			}else{
				
					$queryFour = "DELETE FROM offers WHERE o_id = '".$offer_id."'";
					$queryResultFour = mysqli_query($this->DBlink,$queryFour);

						// 	unlink("../".$row['offer_name']."/ersredir.php");
						// //	unlink("../".$row['offer_name']."/hitcounter.ers");
						// 	unlink("../".$row['offer_name']."/index.php");
						// 	rmdir("../".$row['offer_name']);

							return true;

			}

		}
	}

	public function fireBack()
	 {
	 


	 	$promo_link  = trim($_POST['data']['url']);
	 	$ip  = trim($_POST['data']['ip']);
	 	$offer_name  = trim($_POST['data']['offer_name']);
	 	$username  = trim($_POST['data']['username']);
	 	
	 	$userQuery = "SELECT * FROM users WHERE username = '$username'";
	 

	 	$userQueryResult = mysqli_query($this->DBlink,$userQuery);
	 	
	 	if($userQueryResult)
	 	{
	 		if(mysqli_num_rows($userQueryResult) > 0)
	 		{	
	 			$userData = mysqli_fetch_assoc($userQueryResult);
	 			$user_id  = $userData['u_id'];
	 			$query = "SELECT * FROM offers WHERE offer_name = '$offer_name' AND user_id = $user_id";

	 	
				$queryResult = mysqli_query($this->DBlink,$query);

			 	if ($queryResult) 
			 	{

			 		if(mysqli_num_rows($queryResult) > 0)
					{
						$offerData = mysqli_fetch_assoc($queryResult);
						$offer_id = $offerData['o_id'];
						$queryTwo= "SELECT * FROM clicks AS c
									INNER JOIN traffic AS t
										ON t.click_id = c.c_id
						 			WHERE offer_id = '$offer_id'
						 			AND conversion = 'false'
						 			AND t.ip ='$ip'";

						$queryResultTwo = mysqli_query($this->DBlink,$queryTwo);

			 			if($queryResultTwo)
			 			{
			 				if(mysqli_num_rows($queryResultTwo) >0)
			 				{

			 			
			 					while ( $queryTwoData  =mysqli_fetch_array($queryResultTwo)) 
			 					{
			 						# code...
			 						
			 						$click_id = $queryTwoData['c_id'];
			 						$queryThree = "UPDATE clicks SET conversion = 'true' WHERE c_id = '$click_id'";
			 						
									$queryResultThree = mysqli_query($this->DBlink,$queryThree);
			 						if($queryResultThree)
			 						{

			 							$conversion =$offerData['conversion']+1;
				 						$queryFour = "UPDATE offers SET conversion = '$conversion' WHERE o_id = '$offer_id'";

				 						$queryResultFour = mysqli_query($this->DBlink,$queryFour); 					

			 						}

										    
			 					}
			 					return true;

			 				}else{
			 					//no record 
			 					return false;
			 				}
			 			}else{
			 				//mysqli eroror
			 				return false;
			 			}



					}else
					{	
						//no record 
							return false;
					}

			 		# code...
			 	}else{
			 	//	echo "mysqliErrir";
			 		return false;
			 	}

	 		}else
	 		{
	 			return false;
	 		}
	 	}else
	 	{
	 		return false;
	 	}


	 }

	public function getChartDataOfCountry(){

		$offer_id = $_POST['data']['o_id'];
		$user_id = $_SESSION['u_id'];
		$query ="SELECT t.country,count(*) as CountryCount  FROM offers AS o 
				INNER JOIN clicks AS c 
					ON c.offer_id = o.o_id 
				INNER JOIN traffic AS t 
				ON t.click_id = c.c_id 
				WHERE c.conversion = 'true'
					AND o.o_id = '$offer_id' 
					AND o.user_id = $user_id
	            GROUP BY t.country";

		$result = mysqli_query($this->DBlink,$query);	


		if($result){
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_assoc($result)) {
						$array[] = 	 $row;
	 				}
					return $array;	
				}else{
					return false;
				}
			}	
	}
	public function getChartDataOfDevice(){

		$offer_id = $_POST['data']['o_id'];
		$user_id = $_SESSION['u_id'];
		$query ="SELECT t.device,count(*) as DeviceCount  FROM offers AS o 
				INNER JOIN clicks AS c 
					ON c.offer_id = o.o_id 
				INNER JOIN traffic AS t 
				ON t.click_id = c.c_id 
				WHERE c.conversion = 'true'
					AND o.o_id = '$offer_id' 
					AND o.user_id = $user_id
	            GROUP BY t.device";
	           
		$result = mysqli_query($this->DBlink,$query);	


		if($result){
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_assoc($result)) {
						$array[] = 	 $row;
	 				}
	 			
					return $array;	
				}else{
					return false;
				}
			}	
	}
	public function getChartDataOfOs()
	{
		$offer_id = $_POST['data']['o_id'];
		$user_id = $_SESSION['u_id'];
		$query ="SELECT t.os,count(*) as OsCount  FROM offers AS o 
				INNER JOIN clicks AS c 
					ON c.offer_id = o.o_id 
				INNER JOIN traffic AS t 
				ON t.click_id = c.c_id 
				WHERE c.conversion = 'true'
					AND o.o_id = '$offer_id' 
			     	AND o.user_id = $user_id
	            GROUP BY t.os";

		$result = mysqli_query($this->DBlink,$query);	


		if($result){
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_assoc($result)) {
						$array[] = 	 $row;
	 				}
					return $array;	
				}else{
					return false;
				}
			}	
	}
	public function getChartDataOfIP()
	{
		$offer_id = $_POST['data']['o_id'];
		$user_id = $_SESSION['u_id'];
		$query ="SELECT t.ip,count(*) as IpCount  FROM offers AS o 
				INNER JOIN clicks AS c 
					ON c.offer_id = o.o_id 
				INNER JOIN traffic AS t 
				ON t.click_id = c.c_id 
				WHERE c.conversion = 'true'
					AND o.o_id = '$offer_id' 
					AND o.user_id = $user_id	
	            GROUP BY t.ip";

		$result = mysqli_query($this->DBlink,$query);	


		if($result){
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_assoc($result)) {
						$array[] = 	 $row;
	 				}
					return $array;	
				}else{
					return false;
				}
			}	
	}
	public function getChartDataOfReferer()
	{
		$offer_id = $_POST['data']['o_id'];
		$user_id = $_SESSION['u_id'];
		$query ="SELECT t.referal_link,count(*) as RefererCount  FROM offers AS o 
				INNER JOIN clicks AS c 
					ON c.offer_id = o.o_id 
				INNER JOIN traffic AS t 
				ON t.click_id = c.c_id 
				WHERE c.conversion = 'true'
					AND o.o_id = '$offer_id' 
					AND o.user_id = $user_id	
	            GROUP BY t.referal_link";

		$result = mysqli_query($this->DBlink,$query);	


		if($result){
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_assoc($result)) {
						$array[] = 	 $row;
	 				}
					return $array;	
				}else{
					return false;
				}
			}	
	}
	public function getChartDataOfBrowser()
	{
		$offer_id = $_POST['data']['o_id'];
		$user_id = $_SESSION['u_id'];
		$query ="SELECT t.browser,count(*) as BrowserCount  FROM offers AS o 
				INNER JOIN clicks AS c 
					ON c.offer_id = o.o_id 
				INNER JOIN traffic AS t 
				ON t.click_id = c.c_id 
				WHERE c.conversion = 'true'
					AND o.o_id = '$offer_id' 
					AND o.user_id = $user_id	
	            GROUP BY t.browser";

	          

		$result = mysqli_query($this->DBlink,$query);	


		if($result){
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_assoc($result)) {
						$array[] = 	 $row;
	 				}
					return $array;	
				}else{
					return false;
				}
			}	
	}

	public function getActivityGraph()
	{

		$days = intval($_POST['data']['days']);
		$length = $days;
		$number  = $length-1;

		// $length = 7;
		// s$number  = 6;
		
		$offer_id = $_POST['data']['o_id'];
	
		$dateFrom = $_POST['data']['dateFrom'];
		$dateFromExplode = explode('/', $dateFrom);
		$newDateFromDate = $dateFromExplode[1];

		$dateTo = $_POST['data']['dateTo'];

		$dateToExplode = explode('/', $dateFrom);
		$newDateToDate = $dateFromExplode[1];
		date_default_timezone_set('America/New_York');
		$currentDate = date("Y/m/d");

		$state = false;
		
		for ($i=0; $i < $length; $i++) 
		{ 
			$oldDate = date("m/d/Y",strtotime($currentDate."-".$number." day"));


			
			$searchDate = explode("/", $oldDate);

			$searchDate = $searchDate[2]."-".$searchDate[0]."-".$searchDate[1];
			$user_id = $_SESSION['u_id'];
			// $query ="SELECT date , COUNT(*) AS ClicksCount FROM clicks WHERE date = '$searchDate' AND offer_id = '$offer_id'";
			$query ="SELECT c.date , COUNT(*) AS ClicksCount FROM clicks AS c INNER JOIN offers AS o ON c.offer_id = o.o_id WHERE c.date = '$searchDate' AND c.offer_id = '$offer_id' AND o.user_id = $user_id";
			
			$result = mysqli_query($this->DBlink,$query);
			
			if(mysqli_num_rows($result)>0)
			{
					while ($row = mysqli_fetch_assoc($result)) {
						# code...

							$row['ClicksCount']= intval($row['ClicksCount']);
							$newFormat = explode("/", $oldDate);
							if($days == 90){

								$row['date']= date("F", strtotime($oldDate));
							}else if($days == 30) {
								
								$row['date'] = 	$newFormat[1]."-".date('F', strtotime($oldDate));

							}else {
									$row['date']=  $newFormat[1]."-".date("F", strtotime($oldDate))."-".$newFormat[2];
									
							}
						
						
					
						
						$array[] =$row ;
					}

					// $coversionQuery = "SELECT date , COUNT(*) AS ConversionCount FROM clicks WHERE date = '$searchDate' AND offer_id = '$offer_id' AND conversion = 'true'";

					$coversionQuery = "SELECT c.date , COUNT(*) AS ConversionCount FROM clicks AS c INNER JOIN offers AS o ON c.offer_id = o.o_id WHERE c.date = '$searchDate' AND c.offer_id = '$offer_id' AND c.conversion = 'true' AND o.user_id = $user_id";
					$conversionResult = mysqli_query($this->DBlink,$coversionQuery);
				//	echo $query;

					while ($row2 = mysqli_fetch_assoc($conversionResult)) {
						# code...

							$row2['ConversionCount']= intval($row2['ConversionCount']);
							$newFormat = explode("/", $oldDate);
							if($days == 90){

								$row2['date']= date("F", strtotime($oldDate));
							}else if($days == 30) {
								
								$row2['date'] = 	$newFormat[1]."-".date('F', strtotime($oldDate));

							}else {
									$row2['date']= $newFormat[1]."-".date("F", strtotime($oldDate))."-".$newFormat[2];
							}
						
					
						
						$array2[] =$row2 ;
					}


					// $coversionRevenueQuery = "SELECT c.date , COUNT(*) AS ClicksCount , o.conversion_value FROM clicks AS c INNER JOIN offers AS o ON c.offer_id = o.o_id WHERE c.date = '$searchDate' AND c.offer_id = '$offer_id' AND c.conversion = 'true' ";

					$coversionRevenueQuery  = "SELECT c.date , COUNT(*) AS ClicksCount , o.conversion_value FROM clicks AS c 
													INNER JOIN offers AS o 
														ON c.offer_id = o.o_id 
												WHERE c.date = '$searchDate' AND c.offer_id = '$offer_id' AND c.conversion = 'true' AND o.user_id =$user_id";
					
											
					$conversionRevenueResult = mysqli_query($this->DBlink,$coversionRevenueQuery);
					

					while ($row3 = mysqli_fetch_assoc($conversionRevenueResult)) {
						# code...

							$row3['realConversions'] = intval($row3['ClicksCount']) * intval($row3['conversion_value']);
							$newFormat = explode("/", $oldDate);
							if($days == 90){

								$row3['date']= date("F", strtotime($oldDate));
							}else if($days == 30) {
								
								$row3['date'] = 	$newFormat[1]."-".date('F', strtotime($oldDate));

							}else {
									$row3['date']=$newFormat[1]."-".date("F", strtotime($oldDate))."-".$newFormat[2];
							}
						
					
						
						$array3[] =$row3 ;
					}

				}else{
					       
							$oldDate = explode("/", $oldDate);
							$oldDate = $newFormat[1]."-".$newFormat[0]."-".$newFormat[2];

							$array[$i] =array("date" => $oldDate , "ClicksCount" => 0) ;
							$array2[$i] =array("date" => $oldDate , "ConversionCount" => 0) ;
							$array3[$i] =array("date" => $oldDate , "ClicksCount" => 0,"conversion_value" => 0,"realConversions" => 0) ;
				}


			$number--;



		}

		
		
		$arrayName = array('clicks' => $array, 'conversion' =>$array2,'conversionRevenue' =>$array3 );



		return $arrayName;

	}


}
?>