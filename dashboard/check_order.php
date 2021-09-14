<?php
include("../connectdb/connectdb.php");
ob_start();
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

      if(!isset($_SESSION["intLine"]))
        {

           $_SESSION["intLine"] = 0;
           $_SESSION["strcreate_course_id"][0] = $_GET["ol_class_id"];
           $_SESSION["strQty"][0] = 1;

          echo "<script>";
          echo  "location.href='show_order_list.php'";
          echo "</script>";
        }
      else
        {
          
          $key = array_search($_GET["ol_class_id"], $_SESSION["strcreate_course_id"]);
          if((string)$key == "")
          { 
             $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
             $intNewLine = $_SESSION["intLine"];
             $_SESSION["strcreate_course_id"][$intNewLine] = $_GET["ol_class_id"];
             $_SESSION["strQty"][$intNewLine] = 1;
          }
          
            echo "<script>";
            echo  "location.href='show_order_list.php'";
            echo "</script>";

        }
      
    }
?>