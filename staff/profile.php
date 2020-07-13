<?php
include("../connect.php");
session_start();
if(!isset($_SESSION['sms_admin_id'])){
	header("location:index.php");
}

$mum=mysqli_query($con,"select * from admin where id='".$_SESSION['sms_admin_id']."'");
$me=mysqli_fetch_assoc($mum);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SMS | Profile</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">Admin</a> 
            </div>
		
  <div style="color: white;
padding: 15px 50px 5px 50px; text-align:center;
font-size: 16px;"><font style="font-size:23px; font-family:Bauhaus 93;">Siwes Management System</font><a href="logout.php" class="btn btn-danger square-btn-adjust" style="float: right;">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive" style="width:65px;"/>
					</li>
				
					
                    <li>
                        <a href="admin_home.php"><i class="fa fa-user-md fa-3x"></i> Supervisor</a>
                    </li>
                   <li>
                        <a  href="student.php"><i class="fa fa-users fa-3x"></i> Students</a>
                    </li>
						   <li>
                        <a class="active-menu" href="profile.php"><i class="fa fa-user fa-3x"></i> Profile</a>
                    </li>	
                      <li  >
                        <a href="logout.php"><i class="fa fa-sign-out fa-3x"></i> Logout</a>
                    </li>
	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Profile</h2>   
                         </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
      <div class="row">
			     
                    <div class="col-md-2 col-sm-12 col-xs-12 "> </div>
                    <div class="col-md-9 col-sm-12 col-xs-12">           
			<div class="panel panel-back noti-box">
			<div class="panel-heading">
										<h2 class="panel-title text-center" style="text-align:center; font-size:21px;">Change Password</h2><br>
									<div class="clearfix"></div>
								</div> <div class="msg"></div>
               	<form method="post" id="formpassword">
												<div class="form-group">
													<label class="control-label mb-10 text-left">Current Password</span></label>
													<input type="hidden" value="<?php echo $me['password']; ?>" name="ori">
													<input type="password" name="old" class="form-control" Placeholder="Enter Current Password" required>
												</div>
												<div class="form-group">
													<label class="control-label mb-10 text-left" for="example-email">New Password</label>
											<input type="password" name="new" class="form-control" Placeholder="Enter New Password" required>
												</div>
												<div class="form-group">
													<label class="control-label mb-10 text-left">Confirm Password</label>
													<input type="password" name="cnew" class="form-control" Placeholder="Re-Type Password" required>
												</div>
												
												<div class="form-group form-footer">
													<button type="submit" class="btn btn-primary" name="change_profile">Update</button>
												</div>
											</form>
             </div>
		     </div>
			     <div class="col-md-2 col-sm-12 col-xs-12 "> </div>
                        
        </div>
            
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
	
	<script> 
	  $(document).ready(function(){
		$("#formpassword").on('submit',(function(e){
			e.preventDefault();

				$.ajax({
						type: "POST",
                        url: "operation.php",
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
	
	
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
