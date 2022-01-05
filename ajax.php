<?php 
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Headers: *");
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE); 
session_start();
include_once("classes/admin.php");
include_once("classes/users.php");
include_once("classes/students.php");
include_once("classes/teachers.php");
include_once("classes/guardians.php");

$admin = new Admin();
$users = new Users();
$student = new Students();
$teacher = new Teachers();
$guardian = new Guardians();

switch ($_POST['function_to_run']) {

       case 'scanUsernameStudent': 
                        
            $result = $student->scanUsernameStudent();

            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }
        break;
        case 'scanStudentMail': 
             
            $result = $student->scanStudentMail();
           
            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }       
        break;
        case 'registerStudent': 
            $result = $student->studentLetMeIn();
     
            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }         
        break;
        case 'studentLogin': 
            $result = $student->studentPushIn();

            if($result)
            {
                echo  json_encode(array("data" => "true"));

            }else{

                  echo  json_encode(array("data" => "false"));

            }
        break;
        case 'bookSchedule': 
            $result = $student->bookSchedule();
            
            if($result['state'] == 'true')
            { 
                echo  json_encode(array("data" => "true","error" => $result['error']));
            }else{

                echo  json_encode(array("data" => "false","error" => $result['error']));
            }     
        break;
        case 'bookScheduleCheckAvailablity': 

             $result = $student->bookScheduleCheckAvailablity();
            
      
            if($result['state'] == 'true')
            { 
                echo  json_encode(array("data" => "true","error" => $result['error']));
            }else{

                echo  json_encode(array("data" => "false","error" => $result['error'],"slots" => $result['slots']));
            }     
        break;
        
        case 'reBookSchedule': 
            $result = $student->reBookSchedule();
            
            if($result['state'] == 'true')
            { 
                echo  json_encode(array("data" => "true","error" => $result['error']));
            }else{

                echo  json_encode(array("data" => "false","error" => $result['error']));
            }     
        break;
        /* TEACHERS FUNCTIONS*/
        case 'scanUsernameTeacher': 
                        
            $result = $teacher->scanUsernameTeacher();

            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }
        break;
        case 'scanTeacherMail': 
             
            $result = $teacher->scanTeacherMail();
           
            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }       
        break;
        case 'registerTeacher': 
            $result = $teacher->teacherLetMeIn();
     
            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }         
        break;
        case 'teacherLogin': 
            $result = $teacher->teacherPushIn();

            if($result)
            {
                echo  json_encode(array("data" => "true"));
            }else{
                echo  json_encode(array("data" => "false"));
            }     
        break;
        /* END TEACHERS*/
         case 'adminLogin': 
            $result = $admin->AdminPushIn();

            if($result)
            {
                echo  json_encode(array("data" => "true"));
            }else{
                echo  json_encode(array("data" => "false"));
            }     
        break;
        case 'registerAdmin': 
            $result = $admin->registerAdmin();

            if($result)
            {
                echo  json_encode(array("data" => "true"));
            }else{
                echo  json_encode(array("data" => "false"));
            }     
        break;
        
        case 'addNews': 
            $result = $admin->addNews();

            if($result)
            {
                echo  json_encode(array("data" => "true"));
            }else{
                echo  json_encode(array("data" => "false"));
            }     
        break;
        
        case 'scanUsernameTeacher': 
                        
            $result = $teacher->scanUsernameTeacher();

            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }
        break;
        case 'scanTeacherMail': 
             
            $result = $teacher->scanTeacherMail();
           
            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }       
        break;
        case 'registerTeacher': 
            $result = $teacher->teacherLetMeIn();
     
            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }         
        break;
        case 'teacherLogin': 
            $result = $teacher->teacherPushIn();

            if($result)
            {
                echo  json_encode(array("data" => "true"));
            }else{
                echo  json_encode(array("data" => "false"));
            }     
        break;
        case 'setSchedule': 
            $result = $teacher->setSchedule();
            
            if($result['state'] == 'true')
            { 
                echo  json_encode(array("data" => "true","error" => $result['error']));
            }else{

                echo  json_encode(array("data" => "false","error" => $result['error']));
            }     
        break;
        case 'addChatLink': 
            $result = $teacher->addChatLink();
            
            if($result['state'] == 'true')
            { 
                echo  json_encode(array("data" => "true","error" => $result['error']));
            }else{

                echo  json_encode(array("data" => "false","error" => $result['error']));
            }     
        break;
        case 'updateStatusOfBooking': 
            $result = $teacher->updateStatusOfBooking();
            
            if($result['state'] == 'true')
            { 
                echo  json_encode(array("data" => "true","error" => $result['error']));
            }else{

                echo  json_encode(array("data" => "false","error" => $result['error']));
            }     
        break;
        case 'updateSolution': 
            $result = $teacher->updateSolution();
            
            if($result['state'] == 'true')
            { 
                echo  json_encode(array("data" => "true","error" => $result['error']));
            }else{

                echo  json_encode(array("data" => "false","error" => $result['error']));
            }     
        break;
        case 'notificationMeeting': 

            if($_POST['data']['userType'] == 'student'){
                $result = $student->notificationMeeting();
            }else if($_POST['data']['userType'] == 'guardian'){
                $result = $guardian->notificationMeeting();
            }
           
            
            if($result['state'] == 'true')
            { 
                echo  json_encode(array("data" => "true","error" => $result['error']));
            }else{

                echo  json_encode(array("data" => "false","error" => $result['error']));
            }     
        break;        
        
        case 'endMeetingBeforeTime': 
            $result = $teacher->endMeetingBeforeTime();
            
            if($result['state'] == 'true')
            { 
                echo  json_encode(array("data" => "true","error" => $result['error']));
            }else{

                echo  json_encode(array("data" => "false","error" => $result['error']));
            }     
        break;       
        case 'endMeeting': 
            $result = $teacher->endMeeting();
            
            if($result['state'] == 'true')
            { 
                echo  json_encode(array("data" => "true","error" => $result['error']));
            }else{

                echo  json_encode(array("data" => "false","error" => $result['error']));
            }     
        break;          
        
        
        /* GUARDIANS FUNCTIONS*/
        case 'scanUsernameGuardian': 
                        
            $result = $guardian->scanUsernameGuardian();

            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }
        break;
        case 'scanGuardianMail': 
             
            $result = $guardian->scanGuardianMail();
           
            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }       
        break;
        case 'scanKidMail': 
             
            $result = $guardian->scanKidMail();
           
            if($result)
            {
                if($result['state'] == 'true')
                { 
                        echo  json_encode(array("data" => "true","error" => $result['error'],"kidID" => $result['kidId']));
                }else{

                        echo  json_encode(array("data" => "false","error" => $result['error']));
                }     
                   

            }else{
                 echo  json_encode(array("data" => "false","error" => $result['error']));

            }       
        break;        
        case 'registerGuardian': 
            $result = $guardian->GuardianLetMeIn();
     
            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }         
        break;
        case 'guardianLogin': 
       
            $result = $guardian->guardianPushIn();

            if($result)
            {
                echo  json_encode(array("data" => "true"));
            }else{
                echo  json_encode(array("data" => "false"));
            }     
        break;
        case 'bookScheduleGuardian': 
            $result = $guardian->bookScheduleGuardian();
            
            if($result['state'] == 'true')
            { 
                echo  json_encode(array("data" => "true","error" => $result['error']));
            }else{

                echo  json_encode(array("data" => "false","error" => $result['error']));
            }     
        break;

        case 'bookScheduleCheckAvailablityGuardian': 

             $result = $guardian->bookScheduleCheckAvailablityGuardian();
            
      
            if($result['state'] == 'true')
            { 
                echo  json_encode(array("data" => "true","error" => $result['error']));
            }else{

                echo  json_encode(array("data" => "false","error" => $result['error'],"slots" => $result['slots']));
            }     
        break;
         /* END GUARDIANS*/
        case 'scanUsernameAdmin': 
                        
            $result = $admin->scanUsernameAdmin();

            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }
        break;
         case 'scanAdminMail': 
                        
            $result = $admin->scanAdminMail();

            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }
        break;       
        case 'cancelSchedule':

             $result = $student->cancelSchedule();
            
      
            if($result['state'] == 'true')
            { 
                echo  json_encode(array("data" => "true","error" => $result['error']));
            }else{

                echo  json_encode(array("data" => "false","error" => $result['error'],"slots" => $result['slots']));
            }     

        break;
        case 'scanUsernameUpdate': 
                        
                       
           
          //  $username = $_POST['data']['username'];

            $result = $users->scanUsernameUpdate();

            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }
                  
        break;

        case 'scanReceiverUsername': 
                        
                       
           
          //  $username = $_POST['data']['username'];

            $result = $users->scanReceiverUsername();
           
            if($result)
            { 
               if($result == "itself"){
            
                    echo  json_encode(array("data" => "itself"));
               }else{
                
                    echo  json_encode(array("data" => "true"));
               }       

            }else{
                  echo  json_encode(array("data" => "false"));

            }
                  
        break;
        case 'requestLoad': 
                        
                // print_r($_POST);
                // print_r($_FILES);
                 // die();

            $result = $users->requestLoad();

            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }
          

            
                    
        break;
        case 'readUniqueTrans': 
                        
                // print_r($_POST);
                // // print_r($_FILES);
                //  die();

            $result = $admin->readUniqueTrans();

            if($result){
                   
                    echo json_encode(array("data" => $result));

            }else{
                  echo  json_encode(array("data" => "false"));

            }
          

            
                    
        break;       

        case 'updateRequest': 
                        
           

            $result = $admin->updateRequest();

            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }
          

            
                    
        break;
        case 'scanValidRequestTrue': 
                        
            echo  json_encode(array("data" => "true"));

         
          

            
                    
        break;

        
        
       
        case 'scanMail': 
                        
                       
           
          //  $username = $_POST['data']['username'];

            $result = $users->scanMail();

            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }
          

            
                    
        break;
        case 'scanMailUpdate': 
                        
                       
           
          //  $username = $_POST['data']['username'];

            $result = $users->scanMailUpdate();

            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }
          

            
                    
        break;                
        case 'scanValidUserUCI': 
                        

          //  $username = $_POST['data']['username'];

            $result = $users->scanValidUserUCI();
 // print_r($_POST);
 //           die(" i am in ");
            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }
          

            
                    
        break;

        case 'scanValidRequestUCI': 
                        

          //  $username = $_POST['data']['username'];

            $result = $admin->scanValidRequestUCI();
 // print_r($_POST);
 //           die(" i am in ");
            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }
          

            
                    
        break;

       case 'threwTransfer': 
                        

          //  $username = $_POST['data']['username'];

            $result = $users->threwTransfer();
  
            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }
          

            
                    
        break;        
        
        case 'scanValidTransactionUCI': 
                        



            $result = $users->scanValidTransactionUCI();

            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }
          

            
                    
        break;

        
        case 'scanOfferName': 
                        
                       
           
          //  $username = $_POST['data']['OfferName'];

            $result = $users->scanOfferName();

            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }
          

            
                    
        break;
        case 'scanOfferPromoLink': 
                        
                       
           
          //  $username = $_POST['data']['OfferName'];

            $result = $users->scanOfferPromoLink();

            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }
          

            
                    
        break;
        case 'scanOfferPromoLinkForEdit': 
                        
                       
           
          //  $username = $_POST['data']['OfferName'];

            $result = $users->scanOfferPromoLinkForEdit();

            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }
          

            
                    
        break;

        case 'scanCategoryName': 
                        
                       
           
          //  $username = $_POST['data']['OfferName'];

            $result = $users->scanCategoryName();


            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }
        break;
            
         case 'scanCategoryNameForUpdate': 
                        
                       
           
          //  $username = $_POST['data']['OfferName'];

            $result = $users->scanCategoryNameForUpdate();

            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }         

            
                    
        break;

        
        case 'register': 
                        
                  

         

            $result = $users->letMeIn();
     
            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }
          

            
                    
        break;

        case 'updateUserDetial': 
                        
                  
       

            $result = $users->userUpdateDetail();
     
            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }
          

            
                    
        break;   
        case 'updateTransaction': 
                        
            $result = $admin->updateTransaction();
     
            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }
                 
        break;           
        
        case 'updateUser': 
                  // print_r($_POST);
                  // die();      
                  
       

            $result = $admin->updateUser();
     
            if($result){
                    echo  json_encode(array("data" => "true"));

            }else{
                  echo  json_encode(array("data" => "false"));

            }
          

            
                    
        break;             
        
        case 'login': 

 
          
            $username = $_POST['data']['username'];
            $password = md5(trim($_POST['data']['password']));

            $result = $users->pushIn();

            if($result){

                if($result=='pending'){
                 
                     echo  json_encode(array("data" => "pending"));
                }else if($result=='banned'){
                 
                     echo  json_encode(array("data" => "banned"));
                }else if($result=='delete'){
                 
                     echo  json_encode(array("data" => "delete"));
                }else{
                    
                    echo  json_encode(array("data" => "true"));
                }            

            }else{

                  echo  json_encode(array("data" => "false"));

            }

          
       
                    
        break;
           case 'alogin': 
         
 
            $username = $_POST['data']['username'];
            $password = md5(trim($_POST['data']['password']));

            $result = $admin->pushIn();

         

            if($result){
                
         
                    echo  json_encode(array("data" => "true"));

            }else{
                
                  echo  json_encode(array("data" => "false"));

            }

          
       
                    
        break;
      
        case 'logout': 
                
            session_unset();
            session_destroy();
         
            echo "true";
                    
        break;
        case 'admin_logout': 
                    
        

            unset($_SESSION['islogin']);
            unset($_SESSION['username']);
            unset($_SESSION['u_type']);
            unset($_SESSION['admin_id']);
            session_destroy();
         
            echo "true";
                    
        break;


        case 'createQuickRedirect': 
                    
           // print_r($_POST['data']);
           //  die();
            $offerResult  = $users->pushOfferIn();
            if($offerResult){

                $createResult = $ersAdmin->ajaxCreateStandardRedirect();


                if($createResult){
                    
                 echo json_encode(array("data" => $createResult));
                   

                }else{
                   
                    echo  json_encode(array("data" => "false"));
                }

             }else{
                echo  json_encode(array("data" => "false"));
             }


  
                    
        break;

        case 'ajaxGetOfferInfo':
        
            $offerResult = $users->ajaxGetOfferInfo($_POST['data']['offer_id']);
            
            if($offerResult){
                
                
                echo json_encode(array("data" => $offerResult));
                    

            }else{
                
               echo  json_encode(array("data" => "false"));
                }
            break;
            
        case 'ajaxFetchTraffic':
        
            $trafficResult = $users->readingAllTraffic();
            
            if($trafficResult){

                echo json_encode(array("data" => $trafficResult));
                    

            }else{
                
               echo  json_encode(array("data" => "false"));
                }
            break;        
        
        case 'createCategory':
          
            $createResult = $users->pushInCategory();
           
            if($createResult){
                
               
                echo json_encode(array("data" => "true"));
                  
   
               }else{
               
                   echo  json_encode(array("data" => "false"));
               }
            break;


        case 'removeUser': 
               
            

            $createResult = $admin->removeUser();
           

            if($createResult){
                
           
                echo json_encode(array("data" => "true"));
               

            }else{
              
               
                echo  json_encode(array("data" => "false"));
            }
                    
        break;
        case 'ajaxRemoveRedirectLink': 
               


            $createResult = $ersAdmin->ajaxRemoveRedirectLink();
           

            if($createResult){
                
           
                echo json_encode(array("data" => $createResult));
               

            }else{
              
               
                echo  json_encode(array("data" => "false"));
            }
                    
        break;
        
        case 'ajaxGetRedirectInfo': 
               


            $createResult = $ersAdmin->ajaxGetRedirectInfo();
           

            if($createResult){
                
           
                echo json_encode(array("data" => $createResult));
               

            }else{
              
               
                echo  json_encode(array("data" => "false"));
            }
                    
        break;       

         case 'updateOffer': 
                   
                   //
         //   $offerResult  = $users->pushOfferIn();

                $offer_name = $_POST['data']['redirect_name'];

                unlink($_SESSION['username']."/".$offer_name."/ersredir.php");
            
                unlink($_SESSION['username']."/".$offer_name."/index.php");
                rmdir($_SESSION['username']."/".$offer_name);
                


            $offerResult  = $users->pushOfferUpdateIn();

           
            if($offerResult){

                $createResult = $ersAdmin->ajaxCreateStandardRedirect();


                if($createResult){
                    
                 echo json_encode(array("data" => $createResult));
                   

                }else{
                   
                    echo  json_encode(array("data" => "false"));
                }

             }else{
                echo  json_encode(array("data" => "false"));
             }


                    
        break; 

        case 'removeOffer': 
                   
                   //
         //   $offerResult  = $users->pushOfferIn();
                $offer_name = $_POST['data']['offer_name'];
           
            

            $offerResult  = $users->removeOffer();

           
            if($offerResult){

            
                unlink($_SESSION['username']."/".$offer_name."/ersredir.php");
                     //   unlink($offer_name."/hitcounter.ers");
                unlink($_SESSION['username']."/".$offer_name."/index.php");
                rmdir($_SESSION['username']."/".$offer_name);
              
                echo  json_encode(array("data" => "true"));
             

             }else{
                echo  json_encode(array("data" => "false"));
             }


                    
        break; 

        case 'updateCategory': 
               
            $createResult = $users->updateCategory();
           

            if($createResult){
                
           
                echo json_encode(array("data" => $createResult));
               

            }else{
              
               
                echo  json_encode(array("data" => "false"));
            }
                    
        break; 
        case 'ajaxEditOfferInfo':
        
            $offerResult = $users->readingOffer();


          

            
            if($offerResult){

                echo json_encode(array("data" => $offerResult));
                    

            }else{
                
               echo  json_encode(array("data" => "false"));
                }
            break;       

            case 'ajaxRemoveOffer': 
                           
                   

            $createResult = $users->removeOffer();
           

            if($createResult){
                
           
                echo json_encode(array("data" => "true"));
               

            }else{
              
               
                echo  json_encode(array("data" => "false"));
            }
                    
        break;
        case 'fireBack': 
                           
                  

            $createResult = $users->fireBack();
           
 
            if($createResult){
                
           
                echo json_encode(array("data" => "true"));
               

            }else{
              
               
                echo  json_encode(array("data" => "false"));
            }
                    
        break;
        case 'getChartDataOfCountry': 
                           
                  

            $createResult = $users->getChartDataOfCountry();
        
 
            if($createResult){
                
           
                echo json_encode(array("value" => $createResult));
               

            }else{
              
               
                echo  json_encode(array("value" => "false"));
            }
                    
        break;  
        case 'getChartDataOfDevice': 
                           
                  

            $createResult = $users->getChartDataOfDevice();
        
 
            if($createResult){
                
           
                echo json_encode(array("value" => $createResult));
               

            }else{
              
               
                echo  json_encode(array("value" => "false"));
            }
                    
        break;                 
        case 'getChartDataOfOs': 
                           
                  

            $createResult = $users->getChartDataOfOs();
        
 
            if($createResult){
                
           
                echo json_encode(array("value" => $createResult));
               

            }else{
              
               
                echo  json_encode(array("value" => "false"));
            }
                    
        break; 
        case 'getChartDataOfIP': 
                           
                  

            $createResult = $users->getChartDataOfIP();
        
 
            if($createResult){
                
           
                echo json_encode(array("value" => $createResult));
               

            }else{
              
               
                echo  json_encode(array("value" => "false"));
            }
                    
        break; 
        case 'getChartDataOfReferer': 
                           
                  

            $createResult = $users->getChartDataOfReferer();
        
 
            if($createResult){
                
           
                echo json_encode(array("value" => $createResult));
               

            }else{
              
               
                echo  json_encode(array("value" => "false"));
            }
                    
        break; 
        case 'getChartDataOfBrowser': 
                           
                  

            $createResult = $users->getChartDataOfBrowser();
        
 
            if($createResult){
                
           
                echo json_encode(array("value" => $createResult));
               

            }else{
              
               
                echo  json_encode(array("value" => "false"));
            }
                    
        break;         
        
        case 'getActivityGraph': 
                           
                  

            $createResult = $users->getActivityGraph();

      
            if($createResult){
                
           
                echo json_encode(array("value" => $createResult));
               

            }else{
              
               
                echo  json_encode(array("value" => "false"));
            }
                    
        break; 

        case 'readingOfferListByCategory': 
                           
                  

            $createResult = $users->readingOfferListByCategory();

      
            if($createResult){
                
           
                echo json_encode(array("value" => $createResult));
               

            }else{
              
               
                echo  json_encode(array("value" => "false"));
            }
                    
        break;        
         
        case 'readingOfferList': 
                           
                  

            $createResult = $users->readingOfferList();

      
            if($createResult){
                
           
                echo json_encode(array("value" => $createResult));
               

            }else{
              
               
                echo  json_encode(array("value" => "false"));
            }
                    
        break;        



        
   default : 
}



?>          