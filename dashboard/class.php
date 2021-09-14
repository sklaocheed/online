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
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper">
    <?php $page = 'class'; include("menu.php"); ?>
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
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Table</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Code</th>
                      <th>Name Class</th>
                      <th>Trainee</th>
                      <th>Instructor</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Class Link</th>

                      

                      <?php if ($objResult["ol_trainee_level"] == "1") { ?>
                      <th>Exam Link</th>
                      <?php  }else{} ?>

                      <?php if ($objResult["ol_trainee_level"] == "1") { ?>
                      <th>Call Log</th>
                      <?php  }else{} ?>

                      <?php if ($objResult["ol_trainee_level"] == "1") { ?>
                        <th class="text-right">Edit</th>
                      <?php  }else{} ?>

                    </thead>
                    
                    <tbody>
                    <?php
                      $sql_crouse = "SELECT * FROM ol_class as a1
                            INNER JOIN ol_subject as a2
                            ON a1.ol_class_subject_id = a2.ol_subject_id
                            INNER JOIN  ol_instructor as a3
                            ON a1.ol_class_instructor_id = a3.ol_instructor_id ";
                      $query1 = mysqli_query($con, $sql_crouse);
                      foreach ($query1 as $value2) { 
                    ?>
                      <tr>
                        <td><?= $value2['ol_class_code'] ?></td>
                        <td><?= $value2['ol_subject_name'] ?></td>
                        <td style="text-align: center; font-weight: bold;">
                                        <?php
                                        $cc_ids = $value2['ol_class_id'];
                                        $strSQLrcd = "SELECT * FROM ol_reg_detail";
                                        $strSQLrcd .= " WHERE ol_reg_detail_class_id = '$cc_ids'";
                                        $resultSQLrcd = mysqli_query($con, $strSQLrcd);
                                        $count = mysqli_num_rows($resultSQLrcd);
                                        //echo $count.' / '.$rowsc['maximum'];
                                        ?>
                                        <a href="trainee_in_class.php?class_id=<?= $value2['ol_class_id'] ?>"><?= $count ?> /35</a>


                        </td>
                        <td><?= $value2['ol_instructor_name'] ?></td>
                        <td><?= $value2['ol_class_date'] ?></td>
                        <td><?= $value2['ol_class_time'] ?></td>
                        <td>
                        
                          <a href="<?= $value2['ol_class_link'] ?>" target="_blank">
                            <btn class="btn btn-sm btn-outline-success btn-round btn-icon" ><i class="nc-icon nc-send"></i></btn> CLICK
                          </a>
                        </td>

                        <?php if ($objResult["ol_trainee_level"] == "1") { ?>
                        <td>
                          <a href="<?= $value2['ol_class_exam'] ?>" target="_blank">
                            <btn class="btn btn-sm btn-outline-success btn-round btn-icon" >
                              <i class="nc-icon nc-send"></i>
                            </btn> CLICK
                          </a>
                        </td>
                        <?php  }else{} ?>

                        <?php if ($objResult["ol_trainee_level"] == "1") { ?>
                        <td>
                          <a href="chat_class.php?class_id=<?= $value2['ol_class_id'] ?>" target="_blank">
                            <btn class="btn btn-sm btn-outline-success btn-round btn-icon" >
                              <i class="nc-icon nc-send"></i>
                            </btn> CLICK
                          </a>
                        </td>
                        <?php  }else{} ?>

                        <?php if ($objResult["ol_trainee_level"] == "1") { ?>
                          <td class="text-right">
                            <a href="edit_class.php?class_id=<?= $value2['ol_class_id'] ?>" target="_blank">
                              <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="nc-icon nc-settings-gear-65"></i></btn> CLICK
                            </a>
                          </td>
                        <?php  }else{} ?>
                      </tr>
                    <?php } ?>
                    </tbody>

                  </table>
                </div>
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
</body>

</html>