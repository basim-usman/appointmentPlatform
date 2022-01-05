/*STUDENT START */
function scanUsernameStudent (){

  const username = $("#username").val();

  if(username!=""){
    $("#usernameerror").hide();


      var json_data = {
      username: username,

       }; // end json_data

      $.post(
            "../ajax.php",
            {
              function_to_run: "scanUsernameStudent",
              data: json_data,
            },
            function (response) {
              var res = JSON.parse(response);

              if (res.data == "true") {

                 $("#usernameerror").text("");
                 $("#usernameerror").hide();
                 $("#reg_btn").removeAttr("disabled");
              
                
               
              } else if (res.data == "false" ) {

                $("#usernameerror").text(username+" Already Exist");
                $("#usernameerror").show();
                $("#reg_btn").attr("disabled", true);
      
              
              }
            }
          );
    }else {
       $("#usernameerror").text("Provide Username");
        $("#usernameerror").show();    
    }
}
function scanStudentMail(){
  var email =  $("#email").val();

  if (/@calamba\.sti\.edu\.ph/.test(email)) 
  {
     $("#emailerror").text("");
     $( "#reg_btn" ).prop( "disabled", false );

          var json_data = {email : email }; // end json_data

                $.post(
                 "../ajax.php",
                {
                  function_to_run: "scanStudentMail",
                  data: json_data,
                },
                function (response) {
                  var res = JSON.parse(response);
                 
                   if (res.data == "true")
                    {

                       $("#emailerror").text("");
                       $("#emailerror").hide();
                       $("#reg_btn").removeAttr("disabled");

                             
                    } else if (res.data == "false" ) {

                       $("#emailerror").text(email+" Already exist");
                       $("#emailerror").show();
                        $("#reg_btn").attr("disabled", true);
            
                    
                    }
                }
              );
  }else{

      $("#emailerror").text("Please provide your school valid email (calamba.sti.edu.ph)");
      $( "#reg_btn" ).prop( "disabled", true );

  }
}

function studentValidate(){

  var fname        = $("#first_name").val();
  var lname        = $("#last_name").val();
  var username     = $("#username").val();
  var email        = $("#email").val();
  var password     = $("#password").val();
  var phone_number = $("#phone_number").val();
  var cpassword    = $("#cpassword").val();
  var address      = $("#address").val();
  var status       = "open";
    $("#firstnameerror").hide(); 
    $("#lastnameerror").hide(); 
    $("#usernameerror").hide();
    $("#emailerror").hide(); 
    $("#addresserror").hide(); 
    $("#phoneerror").hide();
    $("#passworderror").hide();
    $("#confirmpassworderror").hide();
  
  if (fname != "" && lname != "" && username != ""  && email!= ""  && phone_number!= ""  && address != "" && password != "" && cpassword != ""  ) 
  {
    $("#firstnameerror").hide(); 
    $("#lastnameerror").hide(); 
    $("#usernameerror").hide();
    $("#emailerror").hide(); 
    $("#addresserror").hide(); 
    $("#phoneerror").hide();
    $("#passworderror").hide();
    $("#confirmpassworderror").hide();

    // $("#loginerror").hide();
       $("#process").show();

     studentRegister(fname,lname,username,email,phone_number,address,password,status);

  } else if(fname == ""){
    $("#firstnameerror").text("Provide Valid First Name");
    $("#firstnameerror").show(); 
  }else if(lname == ""){
    $("#lastnameerror").text("Provide Valid Last Name");
    $("#lastnameerror").show(); 
  }else if(username == ""){
    $("#usernameerror").text("Provide Valid Username/StudentID");
    $("#usernameerror").show(); 
  }else if(email == ""){
    $("#emailerror").text("Provide Valid Email");
    $("#emailerror").show(); 
  }else if(address == ""){
    $("#addresserror").text("Provide Valid Address");
    $("#addresserror").show(); 
  }else if(phone_number == ""){
    $("#phoneerror").text("Provide Valid Mobile#");
    $("#phoneerror").show();
  }else if(password =="") {
    $("#passworderror").text("Provide Valid Password");
    $("#passworderror").show();

  }else if(cpassword == ""){
    $("#confirmpassworderror").text("Provide Valid Confirm Password");
    $("#confirmpassworderror").show();

  }
}

function studentRegister(fname,lname,username,email,phone_number,address,password,status) {
  // body...
  var json_data = { first_name   : fname,
                    last_name    : lname,
                    username     : username,
                    email        : email,
                    phone_number : phone_number,
                    address      : address,
                    password     : password,
                    status       : status
                  }; // end json_data

                 $.post(
                        "../ajax.php",
                        {
                          function_to_run: "registerStudent",
                          data: json_data,
                        },
                        function (response) {
                          var res = JSON.parse(response);
                         
                         $("#process").hide(); 
                          if (res.data == "true") {
  
                             $("#success").show();
                              setTimeout(function() {
                                    $("#success").hide('blind', {}, 300)
                                }, 3000);
                                 window.location.href = "index.php";
                           
                            } else if (res.data == "false") {
                           
                              $("#fail").show();
                              setTimeout(function() {
                                    $("#fail").hide('blind', {}, 300)
                                }, 3000);
                          }
                        }
                      );                      
                    
}


function studentAuth() {

  var username = $("#username").val();
  var password = $("#password").val();

  if (username !== "" && password !== "") {

    $("#loginerror").hide();
    $("#process").show();
    var json_data = {
      username: username,
      password: password,
    }; // end json_data

    $.post(
      "../ajax.php",
      {
        function_to_run: "studentLogin",
        data: json_data,
      },
      function (response) {
        var res = JSON.parse(response);

        if (res.data == "true") {

           $("#process").hide();
           $("#success").show();

            setTimeout(function() {
                  $("#success").hide('blind', {}, 300)
              }, 3000);

          window.location.href = "sdashboard.php";
        } else if (res.data == "false") {

          $("#loginerror").show();
          $("#loginerror").text("Invalid Username/StudentID or Password");
          $("#process").hide();
          $("#responseerror").text("");
          $("#responseerror").text("Try Again ! Login Failed ");
           $("#fail").show();
           
            setTimeout(function() {
                  $("#fail").hide('blind', {}, 300)
              }, 3000);
        }
      }
    );
  } else {
    $("#loginerror").text("Wrong Credentials ! Try Again");
    $("#loginerror").show();
  }
}
function cancelSchedule(param){
  var json_data ={b_id:param,status:"cancelled"};

   $.post(
      "../ajax.php",
      {
        function_to_run: "cancelSchedule",
        data: json_data,
      },
      function (response) {
        var res = JSON.parse(response);
       
        if(res.data == 'true')
        {

             // $("#process").hide();
             $("#successTextTime").text(res.error);
             $("#successNotificationTime").show();
             window.location.href="allBookings.php";

        }else if(res.data == 'false'){
         
            $("#successNotificationTime").hide();
            $("#successTextTime").text(res.error);
            $("#process").hide();
            $("#failedNotificationTime").show();
            $("#failedTextTime").text(res.error+"..!"+res.slots);
            $("#responseerror").text(""); 
            $("#responseerror").text(res.error +"\n"+"..! "+res.slots);
            $("#fail").show();
           
            setTimeout(function() {
                  $("#fail").hide('blind', {}, 300)
              }, 3000);
        }
      }
    );
}
function validateAppointmentTime()
{
    //  7am  - 8pm
    var hourArray = ["00","01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20"];
    var realStart = $("#timestart").val();
    var start     = $("#stimestart").val();
    start         = convertTo24Hour(start.toLowerCase());
    realStart     = convertTo12Hour(realStart.trim());
   
    var sHr       = start.split(":");
    sHr           = sHr[0];

    var end       = $("#stimeend").val();
    var realEnd   =$("#timeend").val();
     
        end       = convertTo24Hour(end.toLowerCase());
        realEnd   = convertTo12Hour(realEnd.trim());
       
    var eHr       = end.split(":");
    eHr           = eHr[0];
    if(hourArray.indexOf(sHr) !== -1){
   
          $("#failedNotificationTime").hide();
          $("#failedNotificationTime").css('display','none');
          $("#reg_btn").attr('disabled',false);
           SumHours(start,end);
           
      }else{
       $("#failedTextTime").text("Appointment Availiabilty : "+realStart+" - "+realEnd);
        $("#reg_btn").attr('disabled',true);
       $("#failedNotificationTime").show();
      }

     if(hourArray.indexOf(eHr) !== -1){
          $("#failedNotificationTime").hide();
          $("#failedNotificationTime").css('display','none');
          $("#reg_btn").attr('disabled',false);
           SumHours(start,end);
      } else{
        $("#failedTextTime").text("Appointment Availiabilty : "+realStart+" - "+realEnd);
          $("#reg_btn").attr('disabled',true);
          $("#failedNotificationTime").show();
      }

     setTimeout(function(){ validateAppointmentTime(); }, 3000);
   
}
function validateAppointmentTimeGuardian()
{
    //  7am  - 8pm
    var hourArray = ["00","01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20"];
    var realStart = $("#timestart").val();
   
    var loopStart = realStart.split(":");
  
    loopStart      = parseInt(loopStart[0]); 
   
    var start     = $("#stimestart").val();
    start         = convertTo24Hour(start.toLowerCase());
    realStart     = convertTo12Hour(realStart.trim());
   
    var sHr       = start.split(":");
    sHr           = sHr[0];

    var end       = $("#stimeend").val();
    var realEnd   =$("#timeend").val();
    var loopEnd = realEnd.split(":");
    loopEnd     = parseInt(loopEnd[0]);
     
        end       = convertTo24Hour(end.toLowerCase());
        realEnd   = convertTo12Hour(realEnd.trim());
       
    var eHr       = end.split(":");
    eHr           = eHr[0];
    var hourArray1 = [];
    var differLoop = loopEnd-loopStart;
    
     for(var i = 0; i<=differLoop;i++ ){
        if(loopStart<10){
          hourArray1[i]= "0"+loopStart;
        }else{
           hourArray1[i]= loopStart;
        }
        
        loopStart++;

     }
  
    if(hourArray1.indexOf(sHr) !== -1){
   
          $("#failedNotificationTime").hide();
          $("#failedNotificationTime").css('display','none');
          $("#reg_btn").attr('disabled',false);
           SumHours(start,end);
           
      }else{
       $("#failedTextTime").text("Appointment Availiabilty : "+realStart+" - "+realEnd);
        $("#reg_btn").attr('disabled',true);
       $("#failedNotificationTime").show();
      }

     if(hourArray1.indexOf(eHr) !== -1){
          $("#failedNotificationTime").hide();
          $("#failedNotificationTime").css('display','none');
          $("#reg_btn").attr('disabled',false);
           SumHours(start,end);
      } else{
        $("#failedTextTime").text("Appointment Availiabilty : "+realStart+" - "+realEnd);
          $("#reg_btn").attr('disabled',true);
          $("#failedNotificationTime").show();
      }

     setTimeout(function(){ validateAppointmentTimeGuardian(); }, 3000);
   
}

function SumHours(smon,fmon) {
  // console.log(smon+"smon");
  //  console.log(fmon+"fmon");
  var diff = 0 ;
  if (smon && fmon) 
  {
    smon = ConvertToSeconds(smon);
    fmon = ConvertToSeconds(fmon);
    diff = Math.abs( fmon - smon ) ;
   
    if(diff < 900){
        // $("#failedText").text("");
        $("#failedTextTime").text("Appointment Minimum Time : 15 Mins");
        $("#failedNotificationTime").show();
        $("#reg_btn").attr('disabled',true);

    }else if(diff > 900 &&diff < 1800){
        // $("#failedText").text("");
        $("#failedTextTime").text("Appointment Proper Time : 30 Mins");
        $("#failedNotificationTime").show();
        $("#reg_btn").attr('disabled',true);

    }else if(diff > 1800 &&diff < 2700){
        // $("#failedText").text("");
        $("#failedTextTime").text("Appointment Proper Time : 45 Mins");
        $("#failedNotificationTime").show();
        $("#reg_btn").attr('disabled',true);

    }else if(diff > 2700 && diff <3600){
       $("#failedTextTime").text("Appointment Maximum Time : 1 Hour");
        $("#failedNotificationTime").show();
        $("#reg_btn").attr('disabled',true);

    }else if(diff >3600){
       $("#failedTextTime").text("Appointment Maximum Time : 1 Hour");
        $("#failedNotificationTime").show();
        $("#reg_btn").attr('disabled',true);

    }else{
         $("#failedNotificationTime").hide();
          $("#failedNotificationTime").css('display','none');
          $("#reg_btn").attr('disabled',false);
      }

    }
  }

  function ConvertToSeconds(time) {
    var splitTime = time.split(":");
    return splitTime[0] * 3600 + splitTime[1] * 60;
  }

  function secondsTohhmmss(secs) {
    var hours = parseInt(secs / 3600);
    var seconds = parseInt(secs % 3600);
    var minutes = parseInt(seconds / 60) ;
    return hours + "hours : " + minutes + "minutes ";
  }

    setTimeout(function(){ validateAppointmentTime("start"); }, 3000);

function convertTo24Hour(time) {
    var hours = parseInt(time.substr(0, 2));
    if(time.indexOf('am') != -1 && hours == 12) {
        time = time.replace('12', '0');
    }
    if(time.indexOf('pm')  != -1 && hours < 12) {
        time = time.replace(hours, (hours + 12));
    }
    return time.replace(/(am|pm)/, '');
}
function convertTo12Hour (time) {
  // Check correct time format and split into components

  time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

  if (time.length > 1) { // If time format correct
    time = time.slice (1);  // Remove full string match value
    time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM
    time[0] = +time[0] % 12 || 12; // Adjust hours
  }
  return time.join (''); // return adjusted time or original string
}
  
function bookSchedule(param = null){
  var date         = $("#schedule_date").val();
  var sc_id        = $("#sc_id").val();
  var st_id        = $("#st_id").val();
  var mode         = $("#mode").val();
  var time_start   = $("#timestart").val();
  var time_end     = $("#timeend").val();
  var status       = $("#status").val();
  var total        = $("#total").val();
  var t_id         = $("#t_id").val();
  var stime_start   = $("#stimestart").val();
  var stime_end     = $("#stimeend").val();




  $("#descriptionerror").hide();
  

  if (date !== "" && sc_id !== ""&& st_id !== ""&& mode !== "" && status !== "" && total !== "" && t_id !== "") {

    $("#descriptionerror").hide();
  
    $("#process").show();
    var json_data = {
                      date: date,
                      time_start: time_start,
                      time_end: time_end,
                      sc_id: sc_id,
                      st_id: st_id,
                      mode: mode,
                      status:status,
                      total:total,
                      t_id:t_id
                    }; // end json_data

    if(param != null){
      var b_id = $("#b_id").val();
       var json_data1 = {
                      b_id:b_id,
                      date: date,
                      time_start: stime_start,
                      time_end: stime_end,
                      sc_id: sc_id,
                      st_id: st_id,
                      mode: mode,
                      status:status,
                      total:total,
                      t_id:t_id,
                      stat : "update"
                    }; // end json_data       

    }else{
       var json_data1 = {
                      date: date,
                      time_start: stime_start,
                      time_end: stime_end,
                      sc_id: sc_id,
                      st_id: st_id,
                      mode: mode,
                      status:status,
                      total:total,
                      t_id:t_id
                    }; // end json_data       
    }                
      



   $.post(
      "../ajax.php",
      {
        function_to_run: "bookScheduleCheckAvailablity",
        data: json_data1,
      },
      function (response) {
        var res = JSON.parse(response);
       
        if(res.data == 'true')
        {

             // $("#process").hide();
             $("#successTextTime").text(res.error);
             $("#successNotificationTime").show();

              $.post(
                "../ajax.php",
                {
                  function_to_run: "bookSchedule",
                  data: json_data1,
                },
                function (response) {
                  var res = JSON.parse(response);
                
                  if (res.data == "true") {

                     $("#process").hide();
                     $("#success").show();

                      setTimeout(function() {
                            $("#success").hide('blind', {}, 300)
                        }, 3000);

                    window.location.href = "allBookings.php";
                  } else if (res.data == "false") {

                    $("#descriptionerror").text(res.error);
                    $("#descriptionerror").show();
                    $("#process").hide();
                    $("#responseerror").text("");
                    $("#responseerror").text(res.error);
                     $("#fail").show();
                     
                      setTimeout(function() {
                            $("#fail").hide('blind', {}, 300)
                        }, 3000);
                  }
                }
              );
            


        }else if(res.data == 'false'){
          console.log(res);
             $("#successNotificationTime").hide();
             $("#successTextTime").text(res.error);
            $("#process").hide();
            $("#failedNotificationTime").show();
            $("#failedTextTime").text(res.error);
            $("#responseerror").text(""); 
            $("#responseerror").text(res.error +"\n"+"..! ");
            $("#responseerror1").text(res.slots);
            $("#fail").show();
           
            setTimeout(function() {
                  $("#fail").hide('blind', {}, 300)
              }, 3000);
        }
      }
    );

  }else if(mode == ""){
    $("#descriptionerror").text("Please Select Valid Mode");
    $("#descriptionerror").show(); 
  }


}

function rescheduleStudent(){

 var counts = $("#count").val();
 var sc_id =$("#sc_id-"+counts).val();
 var st_id =$("#st_id-"+counts).val();
    

    $("#fails").hide();
    $("#process").show(); 

    var json_data = {
                      sc_id: sc_id,
                      st_id: st_id,
                    }; // end json_data

    $.post(
      "../ajax.php",
      {
        function_to_run: "reBookSchedule",
        data: json_data,
      },
      function (response) {
        var res = JSON.parse(response);
      
        if (res.data == "true") {

           $("#process").hide();
           $("#success").show();

            setTimeout(function() {
                  $("#success").hide('blind', {}, 300)
              }, 3000);

          window.location.href = "allBookings.php";
        } else if (res.data == "false") {

          $("#descriptionerror").text(res.error);
          $("#descriptionerror").show();
          $("#process").hide();
          $("#responseerror").text("");
          $("#responseerror").text(res.error);
           $("#fail").show();
           
            setTimeout(function() {
                  $("#fail").hide('blind', {}, 300)
              }, 3000);
        }
      }
    );




}
/*STUDENT END */



/*TEACHER START */

function addChat(param){

  var link = prompt('Add Chat Valid Link here');
  var bar  = confirm('Confirm or Cancel');

  if(link!="" && bar == true){
   
    var json_data = {b_id:param,chat_link:link};

      
      $.post(
            "../ajax.php",
            {
              function_to_run: "addChatLink",
              data: json_data,
            },
            function (response) {
              var res = JSON.parse(response);

                if (res.data == "true") {

                 $("#success").show();
                  setTimeout(function() {
                        $("#success").hide('blind', {}, 300)
                    }, 3000);
                     window.location.href = "allBookings.php";
               
                } else if (res.data == "false") {
               
                  $("#fail").show();
                  setTimeout(function() {
                        $("#fail").hide('blind', {}, 300)
                    }, 3000);
              }
            }
          );

  }else{
    addChat(param);

  }

}
function startMeeting(param){

   var json_data = {b_id:param,status:"inprocess"};

      
      $.post(
            "../ajax.php",
            {
              function_to_run: "updateStatusOfBooking",
              data: json_data,
            },
            function (response) {
              var res = JSON.parse(response);

                if (res.data == "true") {

                 $("#success").show();
                  setTimeout(function() {
                        $("#success").hide('blind', {}, 300)
                    }, 3000);
                     window.location.href = "allBookings.php";
               
                } else if (res.data == "false") {
               
                  $("#fail").show();
                  setTimeout(function() {
                        $("#fail").hide('blind', {}, 300)
                    }, 3000);
              }
            }
          );

}

function updateSolution(){

   var b_id = $("#b_id").val();
   var reason = $("#problem").val();
   var solution = $("#solution").val();
   var json_data = {b_id:b_id,reason:reason,solution:solution};

      
      $.post(
            "../ajax.php",
            {
              function_to_run: "updateSolution",
              data: json_data,
            },
            function (response) {
              var res = JSON.parse(response);

                if (res.data == "true") {

                 $("#success").show();
                  setTimeout(function() {
                        $("#success").hide('blind', {}, 300)
                    }, 3000);
                     window.location.href = "allBookings.php";
               
                } else if (res.data == "false") {
               
                  $("#fail").show();
                  setTimeout(function() {
                        $("#fail").hide('blind', {}, 300)
                    }, 3000);
              }
            }
          );

}


function endMeeting(param1,param2,param3){
 
  var endMeetStartTime = $("#endMeetStartTime-"+param1).val();
  var endMeetEndTime   = $("#endMeetEndTime-"+param1).val();


var today = new Date();
var currentTime = today.getHours() + ":" + today.getMinutes() ;

 currentTime         = convertTo24Hour(currentTime.toLowerCase());
var currentTimeSeconds = ConvertToSeconds(currentTime);
var endMeetEndTimeSeconds = ConvertToSeconds(endMeetEndTime);
 
 if(currentTimeSeconds<endMeetEndTimeSeconds){
   var answer = confirm("You wanna end before time?");

   if(answer == true){

       var json_data ={b_id:param1,appoint_id:param2,u_type:param3,time_end:currentTime,status:"done"};
       $.post(
            "../ajax.php",
            {
              function_to_run: "endMeetingBeforeTime",
              data: json_data,
            },
            function (response) {
              var res = JSON.parse(response);

                if (res.data == "true") {

                 $("#success").show();
                  setTimeout(function() {
                        $("#success").hide('blind', {}, 300)
                    }, 3000);
                     window.location.href = "allBookings.php";
               
                } else if (res.data == "false") {
               
                  $("#fail").show();
                  setTimeout(function() {
                        $("#fail").hide('blind', {}, 300)
                    }, 3000);
              }
            }
          );

   }  
 }else{
   var answer = confirm("You wanna end ?");
   if(answer == true){
      var json_data ={b_id:param1,appoint_id:param2,u_type:param3,status:"done"};
       $.post(
            "../ajax.php",
            {
              function_to_run: "endMeeting",
              data: json_data,
            },
            function (response) {
              var res = JSON.parse(response);

                if (res.data == "true") {

                 $("#success").show();
                  setTimeout(function() {
                        $("#success").hide('blind', {}, 300)
                    }, 3000);
                     window.location.href = "allBookings.php";
               
                } else if (res.data == "false") {
               
                  $("#fail").show();
                  setTimeout(function() {
                        $("#fail").hide('blind', {}, 300)
                    }, 3000);
              }
            }
          );

   }

 }
}
function scanUsernameTeacher (){

  const username = $("#username").val();

  if(username!=""){
    $("#usernameerror").hide();


      var json_data = {
      username: username,

       }; // end json_data

      $.post(
            "../ajax.php",
            {
              function_to_run: "scanUsernameTeacher",
              data: json_data,
            },
            function (response) {
              var res = JSON.parse(response);

              if (res.data == "true") {

                 $("#usernameerror").text("");
                 $("#usernameerror").hide();
                 $("#reg_btn").removeAttr("disabled");
              
                
               
              } else if (res.data == "false" ) {

                $("#usernameerror").text(username+" Already Exist");
                $("#usernameerror").show();
                $("#reg_btn").attr("disabled", true);
      
              
              }
            }
          );
    }else {
       $("#usernameerror").text("Provide Username");
        $("#usernameerror").show();    
    }
}
function scanTeacherMail(){
  var email =  $("#email").val();

  if (/@gmail\.com$/.test(email)) 
  {
     $("#emailerror").text("");
     $( "#reg_btn" ).prop( "disabled", false );

          var json_data = {email : email }; // end json_data

                $.post(
                 "../ajax.php",
                {
                  function_to_run: "scanTeacherMail",
                  data: json_data,
                },
                function (response) {
                  var res = JSON.parse(response);
                 
                   if (res.data == "true")
                    {

                       $("#emailerror").text("");
                       $("#emailerror").hide();
                       $("#reg_btn").removeAttr("disabled");

                             
                    } else if (res.data == "false" ) {

                       $("#emailerror").text(email+" Already exist");
                       $("#emailerror").show();
                        $("#reg_btn").attr("disabled", true);
            
                    
                    }
                }
              );
  }else if(/@yahoo\.com$/.test(email)){
    $("#emailerror").text("");
     $( "#reg_btn" ).prop( "disabled", false );

          var json_data = {email : email }; // end json_data

                $.post(
                 "../ajax.php",
                {
                  function_to_run: "scanTeacherMail",
                  data: json_data,
                },
                function (response) {
                  var res = JSON.parse(response);
                 
                   if (res.data == "true")
                    {

                       $("#emailerror").text("");
                       $("#emailerror").hide();
                       $("#reg_btn").removeAttr("disabled");

                             
                    } else if (res.data == "false" ) {

                       $("#emailerror").text(email+" Already exist");
                       $("#emailerror").show();
                        $("#reg_btn").attr("disabled", true);
            
                    
                    }
                }
              );

  }else if(/@outlook\.com$/.test(email)){
    $("#emailerror").text("");
     $( "#reg_btn" ).prop( "disabled", false );

          var json_data = {email : email }; // end json_data

                $.post(
                 "../ajax.php",
                {
                  function_to_run: "scanTeacherMail",
                  data: json_data,
                },
                function (response) {
                  var res = JSON.parse(response);
                 
                   if (res.data == "true")
                    {

                       $("#emailerror").text("");
                       $("#emailerror").hide();
                       $("#reg_btn").removeAttr("disabled");

                             
                    } else if (res.data == "false" ) {

                       $("#emailerror").text(email+" Already exist");
                       $("#emailerror").show();
                        $("#reg_btn").attr("disabled", true);
            
                    
                    }
                }
              );

  }else{

      $("#emailerror").text("Please provide valid email (gmail,yahoo,outlook)");
      $( "#reg_btn" ).prop( "disabled", true );

  }
}


function teacherValidate(){

  var fname        = $("#first_name").val();
  var lname        = $("#last_name").val();
  var username     = $("#username").val();
  var email        = $("#email").val();
  var password     = $("#password").val();
  var phone_number = $("#phone_number").val();
  var cpassword    = $("#cpassword").val();
  var address      = $("#address").val();
  var status       = "available";
    $("#firstnameerror").hide(); 
    $("#lastnameerror").hide(); 
    $("#usernameerror").hide();
    $("#emailerror").hide(); 
    $("#addresserror").hide(); 
    $("#phoneerror").hide();
    $("#passworderror").hide();
    $("#confirmpassworderror").hide();
  
  if (fname != "" && lname != "" && username != ""  && email!= ""  && phone_number!= ""  && address != "" && password != "" && cpassword != ""  ) 
  {
    $("#firstnameerror").hide(); 
    $("#lastnameerror").hide(); 
    $("#usernameerror").hide();
    $("#emailerror").hide(); 
    $("#addresserror").hide(); 
    $("#phoneerror").hide();
    $("#passworderror").hide();
    $("#confirmpassworderror").hide();

    // $("#loginerror").hide();
       $("#process").show();

     teacherRegister(fname,lname,username,email,phone_number,address,password,status);

  } else if(fname == ""){
    $("#firstnameerror").text("Provide Valid First Name");
    $("#firstnameerror").show(); 
  }else if(lname == ""){
    $("#lastnameerror").text("Provide Valid Last Name");
    $("#lastnameerror").show(); 
  }else if(username == ""){
    $("#usernameerror").text("Provide Valid Username/TeacherID");
    $("#usernameerror").show(); 
  }else if(email == ""){
    $("#emailerror").text("Provide Valid Email");
    $("#emailerror").show(); 
  }else if(address == ""){
    $("#addresserror").text("Provide Valid Address");
    $("#addresserror").show(); 
  }else if(phone_number == ""){
    $("#phoneerror").text("Provide Valid Mobile#");
    $("#phoneerror").show();
  }else if(password =="") {
    $("#passworderror").text("Provide Valid Password");
    $("#passworderror").show();

  }else if(cpassword == ""){
    $("#confirmpassworderror").text("Provide Valid Confirm Password");
    $("#confirmpassworderror").show();

  }
}

function teacherRegister(fname,lname,username,email,phone_number,address,password,status) {
  // body...
  var json_data = { first_name   : fname,
                    last_name    : lname,
                    username     : username,
                    email        : email,
                    phone_number : phone_number,
                    address      : address,
                    password     : password,
                    status       : status
                  }; // end json_data

                 $.post(
                        "../ajax.php",
                        {
                          function_to_run: "registerTeacher",
                          data: json_data,
                        },
                        function (response) {
                          var res = JSON.parse(response);
                         
                         $("#process").hide(); 
                          if (res.data == "true") {
  
                             $("#success").show();
                              setTimeout(function() {
                                    $("#success").hide('blind', {}, 300)
                                }, 3000);
                                 window.location.href = "index.php";
                           
                            } else if (res.data == "false") {
                           
                              $("#fail").show();
                              setTimeout(function() {
                                    $("#fail").hide('blind', {}, 300)
                                }, 3000);
                          }
                        }
                      );                      
                    
}


function teacherAuth() {

  var username = $("#username").val();
  var password = $("#password").val();

  if (username !== "" && password !== "") {

    $("#loginerror").hide();
    $("#process").show();
    var json_data = {
      username: username,
      password: password,
    }; // end json_data

    $.post(
      "../ajax.php",
      {
        function_to_run: "teacherLogin",
        data: json_data,
      },
      function (response) {
        var res = JSON.parse(response);

        if (res.data == "true") {

           $("#process").hide();
           $("#success").show();

            setTimeout(function() {
                  $("#success").hide('blind', {}, 300)
              }, 3000);

          window.location.href = "tdashboard.php";
        } else if (res.data == "false") {

          $("#loginerror").show();
          $("#loginerror").text("Invalid Username/TeacherID or Password");
          $("#process").hide();
          $("#responseerror").text("");
          $("#responseerror").text("Try Again ! Login Failed ");
           $("#fail").show();
           
            setTimeout(function() {
                  $("#fail").hide('blind', {}, 300)
              }, 3000);
        }
      }
    );
  } else {
    $("#loginerror").text("Wrong Credentials ! Try Again");
    $("#loginerror").show();
  }
}
function adminAuth() {

  var username = $("#username").val();
  var password = $("#password").val();

  if (username !== "" && password !== "") {

    $("#loginerror").hide();
    $("#process").show();
    var json_data = {
      username: username,
      password: password,
    }; // end json_data

    $.post(
      "../ajax.php",
      {
        function_to_run: "adminLogin",
        data: json_data,
      },
      function (response) {
        var res = JSON.parse(response);

        if (res.data == "true") {

           $("#process").hide();
           $("#success").show();

            setTimeout(function() {
                  $("#success").hide('blind', {}, 300)
              }, 3000);

          window.location.href = "adashboard.php";
        } else if (res.data == "false") {

          $("#loginerror").show();
          $("#loginerror").text("Invalid Username or Password");
          $("#process").hide();
          $("#responseerror").text("");
          $("#responseerror").text("Try Again ! Login Failed ");
           $("#fail").show();
           
            setTimeout(function() {
                  $("#fail").hide('blind', {}, 300)
              }, 3000);
        }
      }
    );
  } else {
    $("#loginerror").text("Wrong Credentials ! Try Again");
    $("#loginerror").show();
  }
}

function setSchedule() {

  var date        = $("#schedule_date").val();
  var timeStart   = $("#timestart").val();
  var timeEnd     = $("#timeend").val();
  var teacherId   = $("#t_id").val();
  var status      = $("#status").val();
  var description = $("#description").val();
  $("#dateerror").hide(); 
  $("#timestarterror").hide(); 
  $("#timeenderror").hide();
  $("#descriptionerror").hide();
  

  if (date !== "" && timeStart !== ""&& timeEnd !== ""&& teacherId !== ""&& status !== "" && description  !== "") {

    $("#dateerror").hide(); 
    $("#timestarterror").hide(); 
    $("#timeenderror").hide();
    $("#descriptionerror").hide();
  
    $("#process").show();
    var json_data = {
                      date: date,
                      time_start: timeStart,
                      time_end: timeEnd,
                      t_id: teacherId,
                      status: status,
                      description: description
                    }; // end json_data

    $.post(
      "../ajax.php",
      {
        function_to_run: "setSchedule",
        data: json_data,
      },
      function (response) {
        var res = JSON.parse(response);
      
        if (res.data == "true") {

           $("#process").hide();
           $("#success").show();

            setTimeout(function() {
                  $("#success").hide('blind', {}, 300)
              }, 3000);

          window.location.href = "tdashboard.php";
        } else if (res.data == "false") {

          $("#descriptionerror").text(res.error);
          $("#descriptionerror").show();
          $("#process").hide();
          $("#responseerror").text("");
          $("#responseerror").text(res.error);
           $("#fail").show();
           
            setTimeout(function() {
                  $("#fail").hide('blind', {}, 300)
              }, 3000);
        }
      }
    );
  }else if(date == ""){
    $("#dateerror").text("Select Valid Date");
    $("#dateerror").show(); 
  }else if(timeStart == ""){
    $("#timestarterror").text("Select Valid Time");
    $("#timestarterror").show(); 
  }else if(timeEnd == ""){
    $("#timeenderror").text("Select Valid Time");
    $("#timeenderror").show(); 
  }else if(description == ""){
    $("#descriptionerror").text("Please Provide Details For Students/Guardians");
    $("#descriptionerror").show(); 
  }


}



/*TEACHER END */


/*GUARDIAN START */


function scanUsernameGuardian (){

  const username = $("#username").val();

  if(username!=""){
    $("#usernameerror").hide();


      var json_data = {
      username: username,

       }; // end json_data

      $.post(
            "../ajax.php",
            {
              function_to_run: "scanUsernameGuardian",
              data: json_data,
            },
            function (response) {
              var res = JSON.parse(response);

              if (res.data == "true") {

                 $("#usernameerror").text("");
                 $("#usernameerror").hide();
                 $("#reg_btn").removeAttr("disabled");
              
                
               
              } else if (res.data == "false" ) {

                $("#usernameerror").text(username+" Already Exist");
                $("#usernameerror").show();
                $("#reg_btn").attr("disabled", true);
      
              
              }
            }
          );
    }else {
       $("#usernameerror").text("Provide Username");
        $("#usernameerror").show();    
    }
}
function scanGuardianMail(){
  var email =  $("#email").val();

  if (/@gmail\.com$/.test(email)) 
  {
     $("#emailerror").text("");
     $( "#reg_btn" ).prop( "disabled", false );

          var json_data = {email : email }; // end json_data

                $.post(
                 "../ajax.php",
                {
                  function_to_run: "scanGuardianMail",
                  data: json_data,
                },
                function (response) {
                  var res = JSON.parse(response);
                 
                   if (res.data == "true")
                    {

                       $("#emailerror").text("");
                       $("#emailerror").hide();
                       $("#reg_btn").removeAttr("disabled");

                             
                    } else if (res.data == "false" ) {

                       $("#emailerror").text(email+" Already exist");
                       $("#emailerror").show();
                        $("#reg_btn").attr("disabled", true);
            
                    
                    }
                }
              );
  }else if(/@yahoo\.com$/.test(email)){
    $("#emailerror").text("");
     $( "#reg_btn" ).prop( "disabled", false );

          var json_data = {email : email }; // end json_data

                $.post(
                 "../ajax.php",
                {
                  function_to_run: "scanGuardianMail",
                  data: json_data,
                },
                function (response) {
                  var res = JSON.parse(response);
                 
                   if (res.data == "true")
                    {

                       $("#emailerror").text("");
                       $("#emailerror").hide();
                       $("#reg_btn").removeAttr("disabled");

                             
                    } else if (res.data == "false" ) {

                       $("#emailerror").text(email+" Already exist");
                       $("#emailerror").show();
                        $("#reg_btn").attr("disabled", true);
            
                    
                    }
                }
              );

  }else if(/@outlook\.com$/.test(email)){
    $("#emailerror").text("");
     $( "#reg_btn" ).prop( "disabled", false );

          var json_data = {email : email }; // end json_data

                $.post(
                 "../ajax.php",
                {
                  function_to_run: "scanGuardianMail",
                  data: json_data,
                },
                function (response) {
                  var res = JSON.parse(response);
                 
                   if (res.data == "true")
                    {

                       $("#emailerror").text("");
                       $("#emailerror").hide();
                       $("#reg_btn").removeAttr("disabled");

                             
                    } else if (res.data == "false" ) {

                       $("#emailerror").text(email+" Already exist");
                       $("#emailerror").show();
                        $("#reg_btn").attr("disabled", true);
            
                    
                    }
                }
              );

  }else{

      $("#emailerror").text("Please provide valid email (gmail,yahoo,outlook)");
      $( "#reg_btn" ).prop( "disabled", true );

  }
}


function guardianValidate(){

  var fname        = $("#first_name").val();
  var lname        = $("#last_name").val();
  var username     = $("#username").val();
  var email        = $("#email").val();
  var password     = $("#password").val();
  var phone_number = $("#phone_number").val();
  var cpassword    = $("#cpassword").val();
  var address      = $("#address").val();
  var kidemail     = $("#kidemail").val();
  var status       = "open";
  var kidID        = $("#kidID").val();

    $("#firstnameerror").hide(); 
    $("#lastnameerror").hide(); 
    $("#usernameerror").hide();
    $("#emailerror").hide(); 
    $("#kidemailerror").hide();
    $("#addresserror").hide(); 
    $("#phoneerror").hide();
    $("#passworderror").hide();
    $("#confirmpassworderror").hide();

  
  if (fname != "" && lname != "" && username != ""  && email!= "" && kidemail!="" && phone_number!= ""  && address != "" && password != "" && cpassword != ""  && kidID!="") 
  {
    $("#firstnameerror").hide(); 
    $("#lastnameerror").hide(); 
    $("#usernameerror").hide();
    $("#emailerror").hide(); 
    $("#kidemailerror").hide();
    $("#addresserror").hide(); 
    $("#phoneerror").hide();
    $("#passworderror").hide();
    $("#confirmpassworderror").hide();

    // $("#loginerror").hide();
       $("#process").show();

     guardianRegister(fname,lname,username,email,phone_number,address,password,status);

  } else if(fname == ""){
    $("#firstnameerror").text("Provide Valid First Name");
    $("#firstnameerror").show(); 
  }else if(lname == ""){
    $("#lastnameerror").text("Provide Valid Last Name");
    $("#lastnameerror").show(); 
  }else if(username == ""){
    $("#usernameerror").text("Provide Valid Username");
    $("#usernameerror").show(); 
  }else if(email == ""){
    $("#emailerror").text("Provide Valid Email");
    $("#emailerror").show(); 
  }else if(kidemail == ""){
    $("#kidemailerror").text("Provide Valid Student Email");
    $("#kidemailerror").show(); 
  }else if(kidID == ""){
    $("#kidemailerror").text(kidemail+ " guardian already exist");
    $("#kidemailerror").show(); 
  }else if(address == ""){
    $("#addresserror").text("Provide Valid Address");
    $("#addresserror").show(); 
  }else if(phone_number == ""){
    $("#phoneerror").text("Provide Valid Mobile#");
    $("#phoneerror").show();
  }else if(password =="") {
    $("#passworderror").text("Provide Valid Password");
    $("#passworderror").show();
  }else if(cpassword == ""){
    $("#confirmpassworderror").text("Provide Valid Confirm Password");
    $("#confirmpassworderror").show();

  }

}
function scanKidMail(){
   var kidemail     = $("#kidemail").val();
  if (/@calamba\.sti\.edu\.ph/.test(kidemail)) 
  {
     $("#kidemailerror").text("");
     $( "#reg_btn" ).prop( "disabled", false );

          var json_data = {kidemail : kidemail }; // end json_data

                $.post(
                 "../ajax.php",
                {
                  function_to_run: "scanKidMail",
                  data: json_data,
                },
                function (response) {
                  var res = JSON.parse(response);
                  console.log(res);
                   if (res.data == "true")
                    {
                       $("#kidID").val(res.kidID);
                       $("#kidemailerror").text("");
                       $("#kidemailerror").hide();
                       $("#reg_btn").removeAttr("disabled");

                             
                    } else if (res.data == "false" ) {

                       // $("#kidemailerror").text("Guardian Already Exist For "+kidemail);
                      $("#kidemailerror").text(res.error);
                       $("#kidemailerror").show();
                        $("#reg_btn").attr("disabled", true);
            
                    
                    }
                }
              );
  }else{

      $("#kidemailerror").text("Please provide your school valid email (calamba.sti.edu.ph)");
      $( "#reg_btn" ).prop( "disabled", true );

  }
}
function guardianRegister(fname,lname,username,email,phone_number,address,password,status) {
  // body...
  var kidID = $("#kidID").val();
  var json_data = { first_name   : fname,
                    last_name    : lname,
                    username     : username,
                    email        : email,
                    phone_number : phone_number,
                    address      : address,
                    password     : password,
                    status       : status,
                    relation_id  : kidID

                  }; // end json_data

                 $.post(
                        "../ajax.php",
                        {
                          function_to_run: "registerGuardian",
                          data: json_data,
                        },
                        function (response) {
                          var res = JSON.parse(response);
                         
                         $("#process").hide(); 
                          if (res.data == "true") {
  
                             $("#success").show();
                              setTimeout(function() {
                                    $("#success").hide('blind', {}, 300)
                                }, 3000);
                                 window.location.href = "index.php";
                           
                            } else if (res.data == "false") {
                           
                              $("#fail").show();
                              setTimeout(function() {
                                    $("#fail").hide('blind', {}, 300)
                                }, 3000);
                          }
                        }
                      );                      
                    
}


function guardianAuth() {

  var username = $("#username").val();
  var password = $("#password").val();

  if (username !== "" && password !== "") {

    $("#loginerror").hide();
    $("#process").show();
    var json_data = {
      username: username,
      password: password,
    }; // end json_data

    $.post(
      "../ajax.php",
      {
        function_to_run: "guardianLogin",
        data: json_data,
      },
      function (response) {
        var res = JSON.parse(response);

        if (res.data == "true") {

           $("#process").hide();
           $("#success").show();

            setTimeout(function() {
                  $("#success").hide('blind', {}, 300)
              }, 3000);

          window.location.href = "gdashboard.php";
        } else if (res.data == "false") {

          $("#loginerror").show();
          $("#loginerror").text("Invalid Username or Password");
          $("#process").hide();
          $("#responseerror").text("");
          $("#responseerror").text("Try Again ! Login Failed ");
           $("#fail").show();
           
            setTimeout(function() {
                  $("#fail").hide('blind', {}, 300)
              }, 3000);
        }
      }
    );
  } else {
    $("#loginerror").text("Wrong Credentials ! Try Again");
    $("#loginerror").show();
  }
}

function bookScheduleGuardian(){
  var date          = $("#schedule_date").val();
  var sc_id         = $("#sc_id").val();
  var g_id          = $("#g_id").val();
  var mode          = $("#mode").val();
  var time_start    = $("#stimestart").val();
  var time_end      = $("#stimeend").val();
  var status        = $("#status").val();
  var total         = $("#total").val();
  var t_id          = $("#t_id").val();
  var bookingReason = $("#bookingReason").val();

  $("#descriptionerror").hide();
  

  if (date !== "" && sc_id !== ""&& g_id !== ""&& mode !== "" && status !== "" && total !== "" && t_id !== "" && bookingReason!="") {

    $("#descriptionerror").hide();
  
    $("#process").show();
    var json_data = {
                      date: date,
                      time_start: time_start,
                      time_end: time_end,
                      sc_id: sc_id,
                      g_id: g_id,
                      mode: mode,
                      status:status,
                      total:total,
                      t_id:t_id,
                      bookingReason:bookingReason
                    }; // end json_data

     $.post(
          "../ajax.php",
          {
            function_to_run: "bookScheduleCheckAvailablityGuardian",
            data: json_data,
          },
          function (response) {
            var res = JSON.parse(response);
           
            if(res.data == 'true')
            {

                 // $("#process").hide();
                 $("#successTextTime").text(res.error);
                 $("#successNotificationTime").show();

                                
                  $.post(
                    "../ajax.php",
                    {
                      function_to_run: "bookScheduleGuardian",
                      data: json_data,
                    },
                    function (response) {
                      var res = JSON.parse(response);
                    
                      if (res.data == "true") {

                         $("#process").hide();
                         $("#success").show();

                          setTimeout(function() {
                                $("#success").hide('blind', {}, 300)
                            }, 3000);

                        window.location.href = "allBookings.php";
                      } else if (res.data == "false") {

                        $("#descriptionerror").text(res.error);
                        $("#descriptionerror").show();
                        $("#process").hide();
                        $("#responseerror").text("");
                        $("#responseerror").text(res.error);
                         $("#fail").show();
                         
                          setTimeout(function() {
                                $("#fail").hide('blind', {}, 300)
                            }, 3000);
                      }
                    }
                  );


            }else if(res.data == 'false'){
              console.log(res);
                 $("#successNotificationTime").hide();
                 $("#successTextTime").text(res.error);
                $("#process").hide();
                $("#failedNotificationTime").show();
                $("#failedTextTime").text(res.error);
                $("#responseerror").text(""); 
                $("#responseerror").text(res.error+"\n"+res.slots);
                $("#fail").show();
               
                setTimeout(function() {
                      $("#fail").hide('blind', {}, 300)
                  }, 3000);
            }
          }
        );













  }else if(mode == ""){
    $("#descriptionerror").text("Please Select Valid Mode");
    $("#descriptionerror").show(); 
  }else if(bookingReason == ""){
    $("#descriptionerror2").text("Please Write Valid Concern");
    $("#descriptionerror2").show(); 
  }



}
/*GUARDIAN END */


/*Admin Start*/

function scanUsernameAdmin (){

  const username = $("#username").val();

  if(username!=""){
    $("#usernameerror").hide();


      var json_data = {
      username: username,

       }; // end json_data

      $.post(
            "../ajax.php",
            {
              function_to_run: "scanUsernameAdmin",
              data: json_data,
            },
            function (response) {
              var res = JSON.parse(response);

              if (res.data == "true") {

                 $("#usernameerror").text("");
                 $("#usernameerror").hide();
                 $("#reg_btn").removeAttr("disabled");
              
                
               
              } else if (res.data == "false" ) {

                $("#usernameerror").text(username+ " Already Exist");
                $("#usernameerror").show();
                $("#reg_btn").attr("disabled", true);
      
              
              }
            }
          );
    }else {
       $("#usernameerror").text("Provide Username");
        $("#usernameerror").show();    
    }
}
function scanStudentMail(){
  var email =  $("#email").val();

  if (/@calamba\.sti\.edu\.ph/.test(email)) 
  {
     $("#emailerror").text("");
     $( "#reg_btn" ).prop( "disabled", false );

          var json_data = {email : email }; // end json_data

                $.post(
                 "../ajax.php",
                {
                  function_to_run: "scanStudentMail",
                  data: json_data,
                },
                function (response) {
                  var res = JSON.parse(response);
                 
                   if (res.data == "true")
                    {

                       $("#emailerror").text("");
                       $("#emailerror").hide();
                       $("#reg_btn").removeAttr("disabled");

                             
                    } else if (res.data == "false" ) {

                       $("#emailerror").text(email+" Already exist");
                       $("#emailerror").show();
                        $("#reg_btn").attr("disabled", true);
            
                    
                    }
                }
              );
  }else{

      $("#emailerror").text("Please provide your school valid email (calamba.sti.edu.ph)");
      $( "#reg_btn" ).prop( "disabled", true );

  }
}
/*Admin END*/
/* General Fucntions START*/
function validatePassword(){

  var password = $("#password").val();
  if(password !=""){
      if(password.length <6 ){
        $("#reg_btn").attr("disabled", true);
        $("#passworderror").text("Atleast 5 Character of Password ");
        $("#passworderror").show();
      }else{
        $("#reg_btn").attr("disabled", false);
        $("#passworderror").text("");
        $("#passworderror").hide();
      }
  }else{
        $("#reg_btn").attr("disabled", true);
        $("#passworderror").text("Provide Valid Password");
        $("#passworderror").show();
      }

}
function logout() {
    $("#process").show();
  $.post(
    "../ajax.php",
    {
      function_to_run: "logout",
    },
    function (response) {
       $("#process").hide();
       $("#success").show();
        setTimeout(function() {
              $("#success").hide('blind', {}, 300)
          }, 3000);
      window.location.reload();
    }
  );
} 

function passwordMatch() {
  var password = $("#password").val();
  var cpassword = $("#cpassword").val();
  $("#confirmpassworderror").text("");
      
  if (password != cpassword) {
    $("#reg_btn").attr("disabled", true);
    $("#confirmpassworderror").text("Try Again ! Password Not Matched");
    $("#confirmpassworderror").show();
    return false;
  } else {
    $("#confirmpassworderror").hide();
    $("#reg_btn").removeAttr("disabled");
    $("#confirmpassworderror").text("");
  }
  return true;
}
function scanMobileNumber(){
  
  var number = $("#phone_number").val();

  if(! $.isNumeric(number))
  {
      $("#phoneerror").text("Only Number is allowed");
      $("#phoneerror").show();
      $("#reg_btn").attr("disabled",true);

    }else{

          if(number.length == 11){
            $("#phoneerror").hide();
            $("#reg_btn").attr("disabled",false);
          }else if(number.length <11 || number.length>11){
             $("#phoneerror").text("11 Digit Mobile# is allowed");
              $("#phoneerror").show();
              $("#reg_btn").attr("disabled",true);
          }
    } 
    
}

/* General Fucntions END */


function addNews() {

   var a_id = $("#a_id").val();
   var title = $("#title").val();
   var description = $("#solution").val();
  var status = $("#status").val();


  if(a_id !="" && title !="" && description !="" && status !="" ){
    $("#solutionerror").hide();
    var json_data = {a_id:a_id,title:title,description:description,status:status};

      
      $.post(
            "../ajax.php",
            {
              function_to_run: "addNews",
              data: json_data,
            },
            function (response) {
              var res = JSON.parse(response);

                if (res.data == "true") {

                 $("#success").show();
                  setTimeout(function() {
                        $("#success").hide('blind', {}, 300)
                    }, 3000);
                     window.location.href = "news.php";
               
                } else if (res.data == "false") {
               
                  $("#fail").show();
                  setTimeout(function() {
                        $("#fail").hide('blind', {}, 300)
                    }, 3000);
              }
            }
          );
    }else{
        $("#solutionerror").text("*Please Fill All feilds");
        $("#solutionerror").show();
    }
 
  }
