<?php 

session_start();
if(isset($_REQUEST['ol_trainee_username'])){
//connection
include("connectdb/connectdb.php");
//รับค่า user & password
$ol_trainee_username = $_REQUEST['ol_trainee_username'];
$ol_trainee_password = $_REQUEST['ol_trainee_password'];
//query 
$sql="SELECT * FROM ol_trainee Where ol_trainee_username='".$ol_trainee_username."' and ol_trainee_password='".$ol_trainee_password."' ";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)==1){
$row = mysqli_fetch_array($result);

$_SESSION["ol_trainee_id"] = $row["ol_trainee_id"];


Header("Location: dashboard/index.php");
	
}else{
echo "<script>";
echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
echo "window.history.back()";
echo "</script>";
}
}else{
Header("Location: index.php?error=1"); //user & password incorrect back to login again
}
?>