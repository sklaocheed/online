<?php
include "../connectdb/connectdb.php";

session_start();

  $amount1 = $_POST['amount'];
  $amount = $amount1."00";
  $class = $_POST['class'];
  $Total = 0;
  $SumTotal = 0;

  $strSQL = "
	INSERT INTO ol_reg (ol_reg_date,ol_reg_trainee_id,ol_reg_payment_status,ol_reg_payment_method)
	VALUES ('".date("Y-m-d H:i:s")."','".$_SESSION["ol_trainee_id"]."','1','1') 
  ";
  mysqli_query($con,$strSQL) or die(mysqli_error());

  $strOrderID = mysqli_insert_id($con);
  $ol_reg_code = sprintf("ORDER%'06d",$strOrderID);
  $_SESSION["strOrderID"] = $ol_reg_code;

  $strSQL1 = "UPDATE ol_reg SET
					
					ol_reg_code = '$ol_reg_code'

			 WHERE ol_reg_id = '$strOrderID' ";

  mysqli_query($con,$strSQL1) or die(mysqi_error());

  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if($_SESSION["strcreate_course_id"][$i] != "")
	  {
			  $strSQL = "
				INSERT INTO ol_reg_detail (ol_reg_detail_reg_id,ol_reg_detail_class_id,ol_reg_detail_qty)
				VALUES
				('".$strOrderID."','".$_SESSION["strcreate_course_id"][$i]."','".$_SESSION["strQty"][$i]."') 
			  ";
			  mysqli_query($con,$strSQL);
			  $_SESSION["strcreate_course_id"][$i] = ""; // การเครียสินค้าในตะหร้าให้เท่ากับช่องว่าง
			  $_SESSION["strQty"][$i] = ""; 
	  }
  }

mysqli_close($con);

	echo "<script>";
    echo "alert('คุณได้ทำการลงทะเบียนเรียนสำเร็จแล้ว กำลังเข้าสู่หน้าชำระเงิน....');";
    echo "window.location='atcchillpay.php?reg_order=$ol_reg_code&amount=$amount&class=$class'";
    echo "</script>";
		
?>