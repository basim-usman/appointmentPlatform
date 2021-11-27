<?php session_start();
echo "<pre>";print_r($_SESSION);echo "</pre>";
// die("I am here.. LA ALA LALALA A");

?>

<script type="text/javascript">
	var userType = "<?php echo $_SESSION['type'];?>";
	var userID ;
	if(userType == 'student'){
	 userID = <?php echo $_SESSION['st_id'];?>
	}else if(userType == 'guardian'){
	 userID = <?php echo $_SESSION['g_id'];?>

	}

	var json_data={userType:userType:userID:userID};

	$.post();
  $.post(
            "../ajax.php",
            {
              function_to_run: "notifications",
              data: json_data,
            },
            function (response) {
              var res = JSON.parse(response);

                if (res.data == "true") {

                 $("#success").show();
                  setTimeout(function() {
                        $("#success").hide('blind', {}, 300)
                    }, 3000);
                    
               
                } else if (res.data == "false") {
               
                  $("#fail").show();
                  setTimeout(function() {
                        $("#fail").hide('blind', {}, 300)
                    }, 3000);
              }
            }
          );

	
</script>
