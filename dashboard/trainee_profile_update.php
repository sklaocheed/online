<?php

include("../connectdb/connectdb.php");

session_start();

$ol_trainee_tel = $_POST['ol_trainee_tel'];
$ol_trainee_mail = $_POST['ol_trainee_mail'];
$ol_trainee_fname = $_POST['ol_trainee_fname'];
$ol_trainee_lname = $_POST['ol_trainee_lname'];
$ol_trainee_fname_th = $_POST['ol_trainee_fname_th'];
$ol_trainee_lname_th = $_POST['ol_trainee_lname_th'];
$ol_trainee_position = $_POST['ol_trainee_position'];
$ol_trainee_company = $_POST['ol_trainee_company'];
$ol_trainee_nationality = $_POST['ol_trainee_nationality'];
$ol_trainee_passport = $_POST['ol_trainee_passport'];
$ol_trainee_seaman = $_POST['ol_trainee_seaman'];
$ol_trainee_date = $_POST['ol_trainee_date'];
$ol_trainee_religion = $_POST['ol_trainee_religion'];
$ol_trainee_address = $_POST['ol_trainee_address'];

$ol_trainee_id = $_POST['ol_trainee_id'];


$strSQL = "UPDATE ol_trainee SET
					
					
					ol_trainee_tel = '$ol_trainee_tel',
					ol_trainee_mail = '$ol_trainee_mail',
					ol_trainee_fname = '$ol_trainee_fname',
					ol_trainee_lname = '$ol_trainee_lname',
					ol_trainee_fname_th = '$ol_trainee_fname_th'
					ol_trainee_lname_th = '$ol_trainee_lname_th',
					ol_trainee_position = '$ol_trainee_position',
					ol_trainee_company = '$ol_trainee_company',
					ol_trainee_nationality = '$ol_trainee_nationality',
					ol_trainee_passport = '$ol_trainee_passport',
					ol_trainee_seaman = '$ol_trainee_seaman'
					ol_trainee_date = '$ol_trainee_date',
					ol_trainee_religion = '$ol_trainee_religion',
					ol_trainee_address = '$ol_trainee_address'
					WHERE ol_trainee_id = '$ol_trainee_id'";
$result = mysqli_query($con, $strSQL) or die("Error: " . mysqli_error($con));

if ($result) {

	echo "<script type='text/javascript'>";
	echo  "alert('แก้ไขข้อมูลเรียบร้อยค่ะ');";
	echo "window.location='trainee_profile.php';";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo  "alert('Error!');";
	echo "window.history.back();";
	echo "</script>";
}


mysqli_close($con);
?>
