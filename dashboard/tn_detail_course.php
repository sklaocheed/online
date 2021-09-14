<?php
include("../connectdb/connectdb.php");
session_start();
$ol_trainee_id = $_SESSION["ol_trainee_id"];
$ol_class_id = $_GET["ol_class_id"];

$check = "
  SELECT * FROM ol_reg_detail as a1
  INNER JOIN ol_reg as a2
  ON a1.ol_reg_detail_reg_id = a2.ol_reg_id 
  WHERE ol_reg_detail_class_id = '$ol_class_id' AND ol_reg_trainee_id = '$ol_trainee_id'
  ";
    $result1 = mysqli_query($con, $check) or die(mysqli_error());
    $num=mysqli_num_rows($result1);
 
    if($num > 0)
    {
    echo "<script>";
    echo "alert(' คุณได้ทำการลงทะเบียนห้องเรียนนี้ไปแล้วกรุณาตรวจสอบ !');";
    echo "window.location='trainee_class.php';";
    echo "</script>";
    }else{

  $strSQL = "
	INSERT INTO ol_reg (ol_reg_trainee_id,ol_reg_date)
	VALUES ('".$_SESSION["ol_trainee_id"]."','".date("Y-m-d H:i:s")."') 
  ";
  mysqli_query($con,$strSQL) or die(mysqli_error());

  $strOrderID = mysqli_insert_id($con);

			  $strSQL = "
				INSERT INTO ol_reg_detail (ol_reg_detail_reg_id,ol_reg_detail_class_id)
				VALUES
				('".$strOrderID."','".$_GET["ol_class_id"]."') 
			  ";
			$result = mysqli_query($con,$strSQL) or die(mysqli_error());

  
if($result){
   
      echo "<script type='text/javascript'>";
      echo  "alert('ลงทะเบียนเรียนออนไลน์เรียบร้อยค่ะ');";
      echo "window.location='trainee_class.php';";
      echo "</script>";

    }
    else{
        echo "<script type='text/javascript'>";
        echo  "alert('Error!');";
        echo "window.location='register_class.php';";
      echo "</script>";

    }
  }
?>