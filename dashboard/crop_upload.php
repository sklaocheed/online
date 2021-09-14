
<?php 

  include("../connectdb/connectdb.php"); 
  if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
      else
    {
        session_destroy();
        session_start(); 
    }
    if (empty($_SESSION["ol_trainee_id"])) 
    {
      header("location: ../atc.php");
    }
    
        $strSQL = "SELECT * FROM ol_trainee WHERE ol_trainee_id = ".$_SESSION["ol_trainee_id"]."";
        $objQuery = mysqli_query($con,$strSQL);
        $objResult = mysqli_fetch_array($objQuery);


if(isset($_POST['crop_image']))
{
    $data = $_POST['crop_image'];
    $image_array_1 = explode(";", $data);
    $image_array_2 = explode(",", $image_array_1[1]);
    $base64_decode = base64_decode($image_array_2[1]);
    $path_img = 'fileimg/tn/'.time().'.png';
    $imagename = ''.time().'.png';
    file_put_contents($path_img, $base64_decode); 
    $sql2 = "UPDATE ol_trainee SET ol_trainee_image = '$imagename' WHERE ol_trainee_id = ".$_SESSION["ol_trainee_id"]." ";
    //$sql2 = "INSERT INTO upload(imagename) VALUES ('$imagename')"; 
    $con->query($sql2); 
}
?>