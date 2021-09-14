<?php 

  	include("../connectdb/connectdb.php"); 


	$call_log_trainee_id = $_POST['call_log_trainee_id'];
	$call_log_class_id = $_POST['call_log_class_id'];
	$call_log = $_POST['call_log'];
	$datetime = date_create()->format('Y-m-d H:i:s');

	$sql = "INSERT INTO call_log_class 
					(
					call_log_trainee_id, 
					call_log_class_id,
					call_log,
					call_log_date
					) 
					VALUES
					(
					'$call_log_trainee_id',
					'$call_log_class_id',
					'$call_log',
					'$datetime'
					)";
	$result = mysqli_query($con,$sql) or die(mysqi_error());

	if($result){
   
			echo "<script type='text/javascript'>";
			echo "window.location='class.php';";
			echo  "location.href='chat_class.php?class_id=$call_log_class_id'";
			echo "</script>";

	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo  "alert('Error!');";
				echo "window.history.back();";
			echo "</script>";

	  }

?>