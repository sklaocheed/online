
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

    <script type='text/javascript' src='https://code.jquery.com/jquery-1.12.4.min.js' crossorigin="anonymous"></script>

    <style type="text/css">
    	.error{
		  color:#F00;
		}
		.error.true{
		  color:#6bc900;
		}
    </style>
    <script language="javascript">
		function fncSubmit()
		{

			if(document.form1.txtPassword.value != document.form1.txtConPassword.value)
			{
				alert('รหัสผ่านไม่ตรงกัน');
				document.form1.txtConPassword.focus();		
				return false;
			}	
			document.form1.submit();
		}
	</script>
	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg3.jpg); background-repeat: repeat-y;">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					
					<img src="images/amcollogo.png" width="100px">
					<h2 class="heading-section">AMCOL Online Class</h2>

				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Register Form</h3>
		      	<form action="save_register.php" method="post" class="signin-form">

		      		<div class="form-group">
		      			<input type="text" class="form-control" name="ol_trainee_fname" placeholder="ชื่อ (ภาษาอังกฤษเท่านั้น)" id="input_name_en" pattern="^[a-zA-Z\s]+$" title="กรุณากรอกชื่อ ภาษาอังกฤษ เท่านั้น" required>
		      		</div>
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="ol_trainee_lname" placeholder="นามสกุล (ภาษาอังกฤษเท่านั้น)" id="input_name_en" pattern="^[a-zA-Z\s]+$" title="กรุณากรอกนามสกุล ภาษาอังกฤษ เท่านั้น"required>
		      		</div>
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="ol_trainee_citizen_id" placeholder="หมายเลขบัตรประชาชน" id="idcard" maxlength="13" pattern="[0-9]{1,}" title="กรอกตัวเลขเท่านั้น" required>
		      			<span class="error"></span>
		      		</div>
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="ol_trainee_tel" placeholder="เบอร์โทรศัพท์"maxlength="10" pattern="[0-9]{1,}" title="กรอกตัวเลขเท่านั้น" required>
		      		</div>
		      		<div class="form-group">
		      			<input type="email" class="form-control" name="ol_trainee_mail" placeholder="อีเมล" id="idcard" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" id="txtPassword" name="ol_trainee_password" class="form-control" placeholder="รหัสผ่าน" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="clearfix"></div>

	            <div class="form-group">
	              <input id="password-field" type="password" name="Confirm-Password" id="txtConPassword" class="form-control" placeholder="ยืนยันรหัสผ่าน" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="clearfix"></div>

	            <div class="form-group">
	              <label class="checkbox-wrap checkbox-primary"> I agree to the terms and conditions
									  <input type="checkbox" name="ol_trainee_agree" value="1" required="">
									  <span class="checkmark"></span>
								</label>
	            </div>
	            
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">SUBMIT</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            			
					</div>
					<div class="w-50 text-md-right">
						<a href="index.php" style="color: #fff">LOGIN</a>
					</div>
	            </div>
	          </form>
	          
		      </div>
				</div>
			</div>
		</div>
	</section>
<script  src="./script.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
<script src="https://unpkg.com/bootstrap@4.1.0/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(function(){
 
});
</script>


	</body>
</html>

