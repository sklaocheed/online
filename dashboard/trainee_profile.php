<?php

include("../connectdb/connectdb.php");
if (!isset($_SESSION)) {
  session_start();
} else {
  session_destroy();
  session_start();
}
if (empty($_SESSION["ol_trainee_id"])) {
  header("location: ../atc.php");
}

$strSQL = "SELECT * FROM ol_trainee WHERE ol_trainee_id = " . $_SESSION["ol_trainee_id"] . "";
$objQuery = mysqli_query($con, $strSQL);
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

  <!--
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
  -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://fengyuanchen.github.io/cropperjs/css/cropper.css" />
  <script src="https://fengyuanchen.github.io/cropperjs/js/cropper.js"></script>

  <link rel="stylesheet" type="text/css" href="../css/profile.css">

</head>

<body class="">
  <div class="wrapper">
    <?php $page = 'trainee_profile';
    include("menu.php"); ?>
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
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="../assets/img/damir-bosnjak.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">

                  <div class="dropdown">
                    <button onclick="myFunction()" style="background: url(fileimg/tn/<?php echo $objResult['ol_trainee_image']; ?>)" class="avatar border-gray dropbtn">Profile</button>

                    <div id="myDropdown" class="dropdown-content">
                      <a href="#"><label for="upload_image">เปลี่ยนรูปโปรไฟล์</label></a>
                      <a href="#">ดูรูปโปรไฟล์</a>
                    </div>
                  </div>

                  <!--<img class="avatar border-gray" src="fileimg/tn/<?php echo $objResult['ol_trainee_image']; ?>" alt="รูปโปรไฟล์อบรมระยะสั้นatc">-->


                  <input type="file" name="crop_image" class="crop_image" id="upload_image" hidden="" />


                  <a href="#">
                    <h5 class="title"><?php echo $objResult['ol_trainee_fname']; ?> <?php echo $objResult['ol_trainee_lname']; ?></h5>
                  </a>

                  <p class="description">
                    @<?php echo $objResult['ol_trainee_citizen_id']; ?>
                  </p>
                </div>
              </div>
              <div class="card-footer">
                <hr>
                <div class="button-container">
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-6 ml-auto">
                      <h5>0<br><small>Class</small></h5>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                      <h5>0<br><small>Files</small></h5>
                    </div>
                    <div class="col-lg-3 mr-auto">
                      <h5>0 GB<br><small>Used</small></h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Activity</h4>
              </div>
              <div class="card-body">
                <ul class="list-unstyled team-members">
                  <li>
                    <div class="row">
                      <div class="col-md-2 col-2">
                        <i class="fa fa-share"></i>
                      </div>
                      <div class="col-md-7 col-7">
                        <span class="text-muted"><small>เปลี่ยนรูปโปรไฟล์</small></span></br>
                        <span class="text-muted"><small>Date : 13.08.2021 09:00:00</small></span>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row">
                      <div class="col-md-2 col-2">
                        <i class="fa fa-share"></i>
                      </div>
                      <div class="col-md-7 col-7">
                        <span class="text-muted"><small>อัพเดทข้อมูลส่วนตัว</small></span></br>
                        <span class="text-muted"><small>Date : 13.08.2021 08:30:00</small></span>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">แก้ไขโปรไฟล์</h5>
              </div>
              <div class="card-body">
                <form action="trainee_profile_update.php" method="POST">
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>เลขบัตรประชาชน</label>
                        <input type="text" class="form-control" name="ol_trainee_citizen_id" placeholder="ol_trainee_citizen_id" value="<?php echo $objResult['ol_trainee_citizen_id']; ?>">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" name="ol_trainee_tel" placeholder="<?php echo $objResult['ol_trainee_tel']; ?>" value="<?php echo $objResult['ol_trainee_tel']; ?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">อีเมล</label>
                        <input type="email" class="form-control" name="ol_trainee_mail" placeholder="<?php echo $objResult['ol_trainee_mail']; ?>" value="<?php echo $objResult['ol_trainee_mail']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>ชื่อจริง(ภาษาอังกฤษ)</label>
                        <input type="text" class="form-control" name="ol_trainee_fname" placeholder="<?php echo $objResult['ol_trainee_fname']; ?>" value="<?php echo $objResult['ol_trainee_fname']; ?>">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>นามสกุล(ภาษาอังกฤษ)</label>
                        <input type="text" class="form-control" name="ol_trainee_lname" placeholder="<?php echo $objResult['ol_trainee_lname']; ?>" value="<?php echo $objResult['ol_trainee_lname']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>ชื่อจริง(ภาษาไทย)</label>
                        <input type="text" class="form-control" name="ol_trainee_fname_th" placeholder="<?php echo $objResult['ol_trainee_fname_th']; ?>" value="<?php echo $objResult['ol_trainee_fname_th']; ?>">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>นามสกุล(ภาษาไทย)</label>
                        <input type="text" class="form-control" name="ol_trainee_lname_th" placeholder="<?php echo $objResult['ol_trainee_lname_th']; ?>" value="<?php echo $objResult['ol_trainee_lname_th']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>ตำแหน่ง</label>
                        <input type="text" class="form-control" name="ol_trainee_position" placeholder="<?php echo $objResult['ol_trainee_position']; ?>" value="<?php echo $objResult['ol_trainee_position']; ?>">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>บริษัท</label>
                        <input type="text" class="form-control" name="ol_trainee_company" placeholder="<?php echo $objResult['ol_trainee_company']; ?>" value="<?php echo $objResult['ol_trainee_company']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <?php
                        $sql_nationality = "SELECT * FROM ol_nationality";
                        $query = mysqli_query($con, $sql_nationality);
                        ?>
                        <label>สัญชาติ</label>
                        <select class="form-control" name="ol_trainee_nationality">
                          <option value="<?php echo $objResult['ol_trainee_nationality']; ?>" selected ><?php echo $objResult['ol_trainee_nationality']; ?></option>
                          <?php foreach ($query as $value) { ?>
                            <option value="<?= $value['num_code'] ?>"><?= $value['nationality'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>หนังสือเดินทางเลขที่</label>
                        <input type="text" class="form-control" name="ol_trainee_passport" placeholder="<?php echo $objResult['ol_trainee_passport']; ?>" value="<?php echo $objResult['ol_trainee_passport']; ?>">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>หนังสือคนประจำเรือเลขที่</label>
                        <input type="text" class="form-control" name="ol_trainee_seaman" placeholder="<?php echo $objResult['ol_trainee_seaman']; ?>" value="<?php echo $objResult['ol_trainee_seaman']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>เดือน/วัน/ปี เกิด</label>
                        <input type="date" class="form-control" name="ol_trainee_date" placeholder="<?php echo $objResult['ol_trainee_date']; ?>" value="<?php echo $objResult['ol_trainee_date']; ?>">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>ศาสนา</label>
                        <input type="text" class="form-control" name="ol_trainee_religion" placeholder="<?php echo $objResult['ol_trainee_religion']; ?>" value="<?php echo $objResult['ol_trainee_religion']; ?>">
                      </div>
                    </div>
                  </div>          
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>ที่อยู่</label>
                        <input type="text" class="form-control" name="ol_trainee_address" placeholder="Home Address" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>ที่อยู่ 2</label>
                        <input type="text" class="form-control" name="ol_trainee_address" placeholder="Home Address" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <?php
                        $sql_provinces = "SELECT * FROM provinces";
                        $query = mysqli_query($con, $sql_provinces);
                        ?>
                        <label>จังหวัด</label>
                        <select class="form-control" name="Ref_prov_id" id="provinces">
                          <option value="" selected disabled>-กรุณาเลือกจังหวัด-</option>
                          <?php foreach ($query as $value) { ?>
                            <option value="<?= $value['id'] ?>"><?= $value['name_th'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>อำเภอ</label>
                        <select class="form-control" name="Ref_dist_id" id="amphures"></select>
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>ตำบล</label>
                        <select class="form-control" name="Ref_subdist_id" id="districts"></select>
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group">
                        <label>รหัสไปรษณีย์</label>
                        <input type="text" name="zip_code" id="zip_code" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>About Me</label>
                        <textarea class="form-control textarea">Oh so, your weak rhyme You doubt I'll bother, reading into it</textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">บันทึก</button>
                    </div>
                  </div>

                 <input type="hidden" name="ol_trainee_id" value="<?php echo $_SESSION["ol_trainee_id"]; ?>"/>
                </form>

                <div class="container" align="center">
                  <br />

                  <br />
                  <div class="row">

                    <div class="modal fade" id="modal_crop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">ปรับขนาดรูปของท่านให้พอดี</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="img-container">
                              <div class="row">
                                <div class="col-md-8">
                                  <img src="" id="sample_image" />
                                </div>
                                <div class="col-md-4">
                                  <div class="preview"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" id="crop_and_upload" class="btn btn-primary">Crop</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </div>
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
    <!-- <script src="../assets/js/core/jquery.min.js"></script> -->
    <script src="../assets/js/core/popper.min.js"></script>
    <!-- <script src="../assets/js/core/bootstrap.min.js"></script> -->
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
    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js'></script>
    <script src="./script.js"></script>



    <script>
      $(document).ready(function() {
        var $modal = $('#modal_crop');
        var crop_image = document.getElementById('sample_image');
        var cropper;
        $('#upload_image').change(function(event) {
          var files = event.target.files;
          var done = function(url) {
            crop_image.src = url;
            $modal.modal('show');
          };
          if (files && files.length > 0) {
            reader = new FileReader();
            reader.onload = function(event) {
              done(reader.result);
            };
            reader.readAsDataURL(files[0]);
          }
        });
        $modal.on('shown.bs.modal', function() {
          cropper = new Cropper(crop_image, {
            aspectRatio: 1,
            viewMode: 3,
            preview: '.preview'
          });
        }).on('hidden.bs.modal', function() {
          cropper.destroy();
          cropper = null;
        });
        $('#crop_and_upload').click(function() {
          canvas = cropper.getCroppedCanvas({
            width: 400,
            height: 400
          });
          canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
              var base64data = reader.result;
              $.ajax({
                url: 'crop_upload.php',
                method: 'POST',
                data: {
                  crop_image: base64data
                },
                success: function(data) {
                  $modal.modal('hide');
                  alert("เปลี่ยนรูปโปร์ไฟล์ของท่านเรียบร้อย");
                  location.reload();

                }
              });
            };
          });
        });
      });
    </script>
    <script>
      /* When the user clicks on the button, 
	toggle between hiding and showing the dropdown content */
      function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
      }

      // Close the dropdown if the user clicks outside of it
      window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
          var dropdowns = document.getElementsByClassName("dropdown-content");
          var i;
          for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
              openDropdown.classList.remove('show');
            }
          }
        }
      }
    </script>
    <?php include('script.php'); ?>
</body>

</html>