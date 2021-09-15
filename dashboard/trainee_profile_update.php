<?php

include("../connectdb/connectdb.php");

session_start();
	if(isset($_POST['btn_upload']))
	{
				
				//ฟังก์ชั่นเปลี่ยนแปลงข้อมูลใน Database
					$sql = "UPDATE ol_trainee SET
							ol_trainee_mail = '".$_POST["ol_trainee_mail"]."' ,
							ol_trainee_fname = '".$_POST["ol_trainee_fname"]."' ,
							ol_trainee_lname = '".$_POST["ol_trainee_lname"]."' ,
							ol_trainee_fname_th = '".$_POST["ol_trainee_fname_th"]."' ,
							ol_trainee_lname_th = '".$_POST["ol_trainee_lname_th"]."' ,
							ol_trainee_position = '".$_POST["ol_trainee_position"]."' ,
							ol_trainee_company = '".$_POST["ol_trainee_company"]."'  ,
							ol_trainee_nationality = '".$_POST["ol_trainee_nationality"]."' ,
							ol_trainee_passport = '".$_POST["ol_trainee_passport"]."' ,
							ol_trainee_seaman = '".$_POST["ol_trainee_seaman"]."' ,
							ol_trainee_date = '".$_POST["ol_trainee_date"]."' ,
							ol_trainee_religion = '".$_POST["ol_trainee_religion"]."' ,
							ol_trainee_address = '".$_POST["ol_trainee_address"]."' ,
							ol_trainee_provinces = '".$_POST["ol_trainee_provinces"]."' ,
							ol_trainee_amphures = '".$_POST["ol_trainee_amphures"]."' ,
							ol_trainee_districts = '".$_POST["ol_trainee_districts"]."' ,
							ol_trainee_zip_code = '".$_POST["ol_trainee_zip_code"]."' 
										

							WHERE ol_trainee_id = '".$_POST["ol_trainee_id"]."'";


		$result = mysqli_query($con,$sql) or die("Error: " . mysqli_error($con));
		

		if($result){
				echo"<script language=\"JavaScript\">
				alert('อัพเดตเรียบร้อย!!');
				window.location = 'trainee_profile.php';
				</script>";
				
			}else{
				echo"<script language=\"JavaScript\">
				alert('Failed Plaese Check');
				window.location = 'trainee_profile.php';
				</script>";
			}
	}
?>


