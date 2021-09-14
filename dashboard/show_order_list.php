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

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="shortcut icon" href="../images/amcollogo.ico" type="image/x-icon" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    AMCOL Online Class Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="./style.css">

  <!-- <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>-->
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper">
    <?php $page = 'register_class'; include("menu.php"); ?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Class List</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="javascript:;">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="javascript:;">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          
          <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Register Class</h5>
              </div>
              <div class="card-body">
                
                <form>
                  
                  
                  <?php

                    if(!isset($_SESSION["intLine"]))
                    {
                      echo "Course order empty";
                      exit();
                    }

                  ?>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Online Class Link</label>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table">
                              <thead class=" text-primary">
                                <th>รหัสวิชา</th>
                                <th>วิชา</th>
                                <th>วันที่เรียน</th>
                                <th>เวลาที่เรียน</th>
                                <th>ราคา</th>
                                <th class="text-right">ยกเลิก</th>
                              </thead>
                              
                              <tbody>
                            <?php
                              $Total = 0;
                              $SumTotal = 0;

                              for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
                              {
                                if($_SESSION["strcreate_course_id"][$i] != "")
                                {

                                  $strSQL ="SELECT * FROM ol_subject as a1
                                            INNER JOIN ol_class as a2 
                                            ON a1.ol_subject_id = a2.ol_class_subject_id
                                            WHERE ol_class_id ='".$_SESSION["strcreate_course_id"][$i]."' ";
                                  $objQuery = mysqli_query($con, $strSQL)  or die(mysql_error());
                                  $objResult = mysqli_fetch_array($objQuery);
                                  $Total = $_SESSION["strQty"][$i] * $objResult["ol_subject_price"];
                                  $SumTotal = $SumTotal + $Total;

                              ?>
                                <tr>
                                  <td><?php echo $_SESSION["strcreate_course_id"][$i];?></td>
                                  <td>[<?php echo $objResult['ol_subject_abbrev']; ?>] <?php echo $objResult['ol_subject_name']; ?></td>
                                  <td><?php echo $objResult['ol_class_date']; ?></td>
                                  <td><?php echo $objResult['ol_class_time']; ?></td>
                                  <td><?php echo number_format($objResult["ol_subject_price"]); ?></td>
                                  <td class="text-center">
                                    
                                    <a href="delete_order.php?Line=<?php echo $i;?>">
                                      <btn class="btn btn-sm btn-outline-success btn-round btn-icon" ><i class="nc-icon nc-send"></i></btn>
                                    </a>
                                  </td>
                                </tr>
                              <?php } }?>
                              </tbody>

                            </table>

                          </div>
                          <button type="button" onclick="location.href='register_class.php'" class="btn btn-primary btn-round">เลือกคลาสอื่นเพิ่ม</button>
                          <?php
                            if($SumTotal > 0)
                            {
                          ?>
                            | <button type="button" onclick="location.href='confirm_checkout.php'" class="btn btn-warning btn-round">ยืนยันการจองซื้อคลาส</button>
                          <?php
                            }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="#" target="_blank">Creative Tim</a></li>
                <li><a href="#" target="_blank">Blog</a></li>
                <li><a href="#" target="_blank">Licenses</a></li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Bongkottip.r
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js'></script>
  <script  src="./script.js"></script>
</body>

</html>