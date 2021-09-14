<?php 

  	include("../connectdb/connectdb.php"); 


	$ol_class_subject_id = $_POST['ol_class_subject_id'];
	$ol_class_instructor_id = $_POST['ol_class_instructor_id'];
	$ol_class_date = $_POST['ol_class_date'];
	$ol_class_time = $_POST['ol_class_time'];
	$ol_class_link = $_POST['ol_class_link'];
	$ol_class_exam = $_POST['ol_class_exam'];
	$ol_class_id = $_POST['ol_class_id'];

	$strSQL = "UPDATE ol_class SET
					
					ol_class_subject_id = '$ol_class_subject_id',
					ol_class_instructor_id = '$ol_class_instructor_id',
					ol_class_date = '$ol_class_date',
					ol_class_time = '$ol_class_time',
					ol_class_link = '$ol_class_link',
					ol_class_exam = '$ol_class_exam'
					WHERE ol_class_id ='$ol_class_id' ";
	$result = mysqli_query($con,$strSQL) or die(mysqi_error());

	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('แก้ไขข้อมูลเรียบร้อยค่ะ');";
			echo "window.location='class.php';";
			echo "</script>";

	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo  "alert('Error!');";
				echo "window.history.back();";
			echo "</script>";

	  }

?>