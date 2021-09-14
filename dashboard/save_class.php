<?php 

  	include("../connectdb/connectdb.php"); 

	

	$ol_class_subject_id = $_POST['ol_class_subject_id'];
	$ol_class_instructor_id = $_POST['ol_class_instructor_id'];
	$ol_class_date = $_POST['ol_class_date'];
	$ol_class_time = $_POST['ol_class_time'];
	$ol_class_link = $_POST['ol_class_link'];
	$ol_class_exam = $_POST['ol_class_exam'];

	

	$sql = "INSERT INTO ol_class 
					(
					ol_class_subject_id, 
					ol_class_instructor_id,
					ol_class_date,
					ol_class_time,
					ol_class_link,
					ol_class_exam
					) 
					VALUES
					(
					'$ol_class_subject_id',
					'$ol_class_instructor_id',
					'$ol_class_date',
					'$ol_class_time',
					'$ol_class_link',
					'$ol_class_exam'
					)";

	mysqli_query($con,$sql) or die(mysqi_error());


	$strOrderID = mysqli_insert_id($con);

	$ol_class_code = sprintf("C_%'06d",$strOrderID);

	$strSQL = "UPDATE ol_class SET
					
					  ol_class_code = '$ol_class_code'

			    WHERE ol_class_id = '$strOrderID' ";

	$result = mysqli_query($con,$strSQL) or die(mysqi_error());

	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('เพิ่มข้อมูลเรียบร้อยค่ะ');";
			echo "window.location='class.php';";
			echo "</script>";

	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo  "alert('Error!');";
				echo "window.location='addclass.php';";
			echo "</script>";

	  }

?>