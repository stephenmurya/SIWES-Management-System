<!doctype html>
<html>

<head>
	<title>SMS System | Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Student Registration Form Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- fonts -->
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
	<!-- /fonts -->
	<!-- css -->
	<link href="css/bootstrap.css" rel="stylesheet" type='text/css' media="all" />
	<link href="css/style.css" rel="stylesheet" type='text/css' media="all" />
	<!-- /css -->
</head>

<body style="background-image:url('images/programming-wallpaper-hd-6-786124.jpg');">

	<div class="content-agileits" style="background-color:white;">
		<h1 class="title" style="font-weight:bold; font-size:25px; font-family:Comic Sans MS; color:white; background-color:#b30000;">SIWES MANAGEMENT SYSTEM</h1>
		<div class="left">
		<div class="msg"></div>
			<!--LOGIN-->
			<form method="post" data-toggle="validator" id="formlogin" style="height:520px;">
			<h2 style="text-align:center; padding-bottom:25px; font-weight:bold; font-size:22px; color:#992600; margin-top:80px;">Login</h2>
			<input type="hidden" name="login" value="login" />
				<div class="form-group">
					<label for="username" class="control-label">Matric No:</label>
					<input type="text" class="form-control" name="matric_no" id="inputEmail" placeholder="Enter Matric No" required>
				</div>
				
				<div class="form-group">
					<label for="inputPassword" class="control-label">Password:</label>
						<div class="form-group">
							<input type="password" name="password" class="form-control" id="inputPassword" placeholder="Enter Password" required>
						</div>
					</div>
				
				<br>
				<div class="form-group" style="margin-bottom:-10px;">
					<button type="submit" class="btn btn-lg">Login</button>
				</div><br>
				<!--<a href="javascript:void(0)" class="register pull-right">Don't have an account?</a>-->
			</form>
			
			
			
		</div>
		<div class="pull-right" style="margin-top:100px;">
		<img src="images/siwes-logo.gif" class="img-responsive" style="width:320px;">
		</div>
		<div class="clear"></div>
	</div>
	<p class="copyright-w3ls">© <?php echo date("Y");?> Siwes Management System. All Rights Reserved | Design by
		<a href="javascript:void(0)" target="_blank">meni</a>
	</p>
	<!-- js -->
	<script src="js/jquery-2.1.4.min.js"></script>
	
	<!-- //js -->

	<script src="js/bootstrap.min.js"></script>
	<script src="js/validator.min.js"></script>
	
	<script>
	$(document).ready(function(){
		$("a.register").click(function(){
			$("form#formlogin").hide();
			$("form#formregister").fadeIn();
			
		});
		$("a.login").click(function(){
			$("form#formregister").hide();
			$("form#formlogin").fadeIn();
		});
	});
	</script>
	<script>
		$(document).ready(function(){
			$("#formlogin").on('submit',(function(e){
			e.preventDefault();

				$.ajax({
						type: "POST",
                        url: "operation_exe.php",
                        data: new FormData(this),
						contentType:false,
						processData:false,
                        cache: false,
                        success: function(data){ 
						$("div.msg").html(data);
						
						
                        } 
				});
			
		}));
		$("#formregister").on('submit',(function(e){
			e.preventDefault();

				$.ajax({
						type: "POST",
                        url: "operation_exe.php",
                        data: new FormData(this),
						contentType:false,
						processData:false,
                        cache: false,
                        success: function(data){ 
						$("div.msg").html(data);
						
						
                        } 
				});
			
		}));
		});
		</script>
	<!-- /js files -->
</body>

</html>