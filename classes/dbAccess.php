<?php 

class DbAccess  {

		

		var $DBlink; // variable $DBlink use linked in DB 

		var $result; // variable $result use perform all results 

	
		var $servername = "localhost";
		var	$username   = "apkuser";
		var	$password   = "apk123";
		var	$database   = "schooldb";
		// var $servername = "localhost";
		// var	$username   = "mediapoi_apkuser";
		// var	$password   = "h&A,+%r}QR5I";
		// var	$database   = "mediapoi_schooldb";

				

		// constructor of the class

		public function __construct()

		{
			

				// Create connection


			$this->DBlink = mysqli_connect($this->servername,$this->username,$this->password,$this->database);
				// Create connection

				if(!$this->DBlink){

					die('Error connecting to database: '.mysqli_error($this->DBlink));

				}// end dblink

		}// end function 

			

		public function getRecord($table = NULL, $selectattribute = NULL, $attribute = NULL, $value = NULL, $condAttr = NULL, $condAttVal = NULL,$conOperator = NULL, $all = false)

		{

			if($table == NULL)

			return false;		// if table value not provided then automatically return false.



			//echo $table.' '.$selectattribute.' '.$attribute.' '.$value.' '.$condAttr.' '.$conOperator.' '.$condAttVal.' '.$all.'<br/><br/><br/>';

			if($selectattribute != NULL and $attribute != NULL and $value != NULL and $condAttr != NULL and $condAttVal != NULL and $conOperator != NULL and $all == false  ){

				//select company_email from company where company_name = $_POST['c_n'] AND c_id != 1

				 $query = "SELECT $selectattribute FROM $table WHERE $attribute = '$value' AND $condAttr $conOperator '$condAttVal'";

				 
					

			}elseif($all != false and $selectattribute == NULL and $attribute != NULL and $value != NULL){

				// select * from company where company_name = bla 

				$query = "SELECT * FROM $table WHERE $attribute = '$value'";

			

			}elseif($all != false and $attribute != NULL and $value != NULL and $condAttr != NULL and $conOperator != NULL and $condAttVal != NULL){

				// select * from company where company_name = bla and c_id != 45

				$query = "SELECT * FROM $table WHERE $attribute = '$value' AND $condAttr $conOperator '$condAttVal'";

				

			}elseif($table !=NULL and $attribute != NULL and $value != NULL and $condAttr != NULL and $condAttVal != NULL and $conOperator != NULL and $all != false ){

				// select * from company where name = bla and email != bla

				$query = "SELECT * FROM $table WHERE $attribute = '$value' AND $condAttr $conOperator '$condAttVal'";	

				

			}else if ($all != false and $selectattribute == NULL and $attribute != NULL and $value != NULL and $condAttr == NULL and $condAttVal == NULL and $conOperator == NULL){

				// select * from company where name = bla and email != bla

				$query = "SELECT * FROM $table WHERE $attribute = '$value' ";

				

			}else if ($all == false and $selectattribute != NULL and $attribute == NULL and $value == NULL and $condAttr == NULL and $condAttVal == NULL and $conOperator == NULL){

				

				$query = "SELECT $selectattribute FROM $table Order by $selectattribute ASC";

				

			}elseif ( $all != false and $selectattribute == NULL and $attribute == NULL and $value == NULL and $condAttr == NULL and $condAttVal == NULL and $conOperator == NULL){

				

				$query = "SELECT * FROM $table ";		

			}elseif ( $all != false and $selectattribute != NULL and $attribute == NULL and $value == NULL and $condAttr == NULL and $condAttVal == NULL and $conOperator == NULL){

				

				$query = "SELECT * FROM $table ORDER BY $selectattribute ASC ";		

			}elseif ( $all == false and $selectattribute != NULL and $attribute != NULL and $value != NULL and $condAttr == NULL and $condAttVal == NULL and $conOperator == NULL){

				

				$query = "SELECT $selectattribute FROM $table WHERE $attribute = '$value' ";		

				
				
			}


			
				 

			//die($query);

		$this->Result = mysqli_query($this->DBlink,$query) or die("Error fetching data in get record function  : ".mysqli_error($this->DBlink));


			if($this->Result)

				return $this->Result;

			else

			return NULL;

						

		}// end function get record


		public function insertRecord($table = NULL, $attribute = NULL, $values = NULL)

		{		

			if($table != NULL and $attribute != NULL and $values != NULL){

				

				$query = "INSERT INTO $table ($attribute) VALUES ($values)";
				// die($query);
				$this->Result = mysqli_query($this->DBlink,$query) or die("Error innserting data : ".mysqli_error($this->DBlink));

				

				if($this->Result){

					

					return true;

					

				}else{

					return false;	

				}

			}else{

				return false;	

			}

		}//end function insertRecord

		

		public function insertRecordAndReturnId($table = NULL, $attribute = NULL, $values = NULL)

		{

			if($table != NULL and $attribute != NULL and $values != NULL){

				

				$query = "INSERT INTO $table ($attribute) VALUES ($values)";

				
				

				$this->Result = mysqli_query($this->DBlink,$query) or die("Error innserting data : ".mysqli_error($this->DBlink));

				

				if($this->Result){

				

					return mysqli_insert_id($this->DBlink);

					

				}else{

					return NULL;	

				}

			}else{

				return NULL;	

			}

		}//end function insertRecordAndReturnId

		

		public function updateRecord($table = NULL, $updateContent = NULL, $condAtt = NULL, $condVal = NULL)

		{

			if($table != NULL and $updateContent != NULL and $condAtt != NULL and $condVal != NULL){

				

				 $query = "UPDATE $table SET $updateContent WHERE $condAtt = '$condVal' ";
				 // die($query);
				$this->Result = mysqli_query($this->DBlink,$query) or die("Error updating record : ".mysqli_error($this->DBlink));

				

				if($this->Result){

					

					return true;

					

				}else{

					return false;	

				}

			}else{

				

				return false;	

			}

		}//end function insertRecord

		

		public function RecordsInQuery($query)

		{

			$this->Result = mysqli_query ($this->DBlink,$query);

			 if ( ! $this->Result )

				return false;

			 return mysqli_num_rows( $this->Result );

			 

		}// end function RecordsInQuery

		

		public function deleteRecord($table = NULL, $condAtt = NULL, $condVal = NULL)

		{

			if($table != NULL and $condAtt != NULL and $condVal != NULL){

				

				$query = "DELETE FROM $table WHERE $condAtt = '$condVal' ";

				
				//die($query);
				$this->Result = mysqli_query($this->DBlink,$query) or die("Error deleting record : ".mysqli_error($this->DBlink));

				

				if($this->Result){

					

					return true;

					

				}else{

					return false;	

				}

			}else{

				

				return false;	

			}

		}//end function deleteRecord
	
	public function scanningData($table,$condAtt,$condVal)

	{

			if($table != NULL and $condAtt != NULL and $condVal != NULL){

				

				$query = "SELECT  $condAtt FROM $table WHERE $condAtt = '$condVal'";

				$this->Result = mysqli_query($this->DBlink,$query) or die("Error deleting record : ".mysqli_error($this->DBlink));

				

				if($this->Result){

					if($this->Result->num_rows <= 0){


					
						return true;

					}else{
						
						return false;
					}
	
				}else{
							
					return false;	

				}
					

			}else{

				

				return false;	

			}

			mysql_close($this->DBlink);



		}//end function 

	
	public function scanningDataException($table,$condAtt,$condVal,$conAttSecond,$condValSecond)

	{

			if($table != NULL and $condAtt != NULL and $condVal != NULL){

				

				$query = "SELECT  $condAtt FROM $table WHERE $condAtt = '$condVal' AND $conAttSecond <> $condValSecond ";
				 die($query);
				$this->Result = mysqli_query($this->DBlink,$query) or die("Error deleting record : ".mysqli_error($this->DBlink));

				

				if($this->Result){

					if($this->Result->num_rows <= 0){


					
						return true;

					}else{
						
						return false;
					}
	
				}else{
							
					return false;	

				}
					

			}else{

				

				return false;	

			}

			mysql_close($this->DBlink);



		}//end function 		

		public function DBDisconnect()

		{

			mysql_close($this->DBlink);



		}//end function dDBDisconnect



}// end class		

?>