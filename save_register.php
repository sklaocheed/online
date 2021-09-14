<?php 

    include("connectdb/connectdb.php"); 


  $ol_trainee_fname = $_POST['ol_trainee_fname'];
  $ol_trainee_lname = $_POST['ol_trainee_lname'];
  $ol_trainee_citizen_id = $_POST['ol_trainee_citizen_id'];
  $ol_trainee_password = $_POST['ol_trainee_password'];
  $ol_trainee_agree = $_POST['ol_trainee_agree'];
  $ol_trainee_tel = $_POST['ol_trainee_tel'];
  $ol_trainee_mail = $_POST['ol_trainee_mail'];

  $check = "
    SELECT ol_trainee_citizen_id
    FROM ol_trainee  
    WHERE ol_trainee_citizen_id = '$ol_trainee_citizen_id'
    ";
      $result1 = mysqli_query($con, $check) or die(mysqli_error());
      $num=mysqli_num_rows($result1);

  if($num > 0)
      {
      echo "<script>";
      echo "alert('หมายเลขบัตรประชาชนนี้ถูกใช้งานแล้ว');";
      echo "window.history.back();";
      echo "</script>";
      }else{

  $sql = "INSERT INTO ol_trainee 
          (
          ol_trainee_fname, 
          ol_trainee_lname,
          ol_trainee_citizen_id,
          ol_trainee_username,
          ol_trainee_password,
          ol_trainee_agree,
          ol_trainee_mail,
          ol_trainee_tel,
          ol_trainee_level
          ) 
          VALUES
          (
          '$ol_trainee_fname',
          '$ol_trainee_lname',
          '$ol_trainee_citizen_id',
          '$ol_trainee_citizen_id',
          '$ol_trainee_password',
          '$ol_trainee_agree',
          '$ol_trainee_mail',
          '$ol_trainee_tel',
          '3'
          )";
  $result = mysqli_query($con,$sql) or die(mysqi_error());

  if($result){
   
      echo "<script type='text/javascript'>";
      echo  "alert('สมัครสมาชิกเรียบร้อยค่ะ');";
      echo "window.location='index.php';";
      echo "</script>";

    }
    else{
        echo "<script type='text/javascript'>";
        echo  "alert('Error!');";
        echo "window.location='register.php';";
      echo "</script>";

    }
}
mysqli_close($con);
?>