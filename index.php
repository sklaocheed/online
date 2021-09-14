
<?php include("connectdb/connectdb.php"); ?>
<!doctype html>
<html lang="en">
  <head>
  	<title>AMCOL Online Class</title>
  	<link rel="shortcut icon" href="images/amcollogo.ico" type="image/x-icon" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg3.jpg);background-repeat: repeat-y;">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					
					<img src="images/amcollogo.png" width="100px">
					<h2 class="heading-section">AMCOL Online Class Login</h2>

				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Have An Account?</h3>
		      	<form action="check_login.php" method="post" class="signin-form">
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="ol_trainee_username" placeholder="หมายเลขบัตรประชาชน หรือ ชื่อผู้ใช้งาน" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" name="ol_trainee_password" class="form-control" placeholder="รหัสผ่าน" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="clearfix"></div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="register.php" style="color: #fff">สมัครสมาชิก(ผู้ใช้ใหม่)</a>
								</div>
	            </div>
	          </form>
	          
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

