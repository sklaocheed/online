<?php
include "../connectdb/connectdb.php";

session_start();


  $strSQL1 = "UPDATE ol_reg SET
					
					ol_reg_payment_status = '2',
					ol_reg_payment_method = '2'

			 WHERE ol_reg_code = '".$_POST['OrderNo']."' ";

  mysqli_query($con,$strSQL1) or die(mysqi_error());

  mysqli_close($con);
		
?>