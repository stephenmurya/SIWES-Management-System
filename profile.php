<?php
include("connect.php");
session_start();
if(!isset($_SESSION['stu_id'])){
	header("location:index.php");
}

$yat=mysqli_query($con,"select * from student where id='".$_SESSION['stu_id']."'");
$me=mysqli_fetch_assoc($yat);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SMS | Profile</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="staff/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="staff/assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
    <link href="staff/assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="staff/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
	
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
                <a class="navbar-brand" href="dashboard.php" style="font-size:18px;">Welcome, <?php echo ucfirst($me['firstname'])?></a> 
            </div>
		
  <div style="color: white;
padding: 15px 50px 5px 50px; text-align:center;
font-size: 16px;"><font style="font-weight:bold; font-size:25px; font-family:Comic Sans MS;">SIWES MANAGEMENT SYSTEM</font><a href="logout.php" class="btn btn-danger square-btn-adjust" style="float: right;">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="staff/assets/img/find_user.png" class="user-image img-responsive" style="width:65px;"/>
					</li>
				
					
                    <li>
                        <a href="dashboard.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
				<li>
                        <a href="supervisor.php"><i class="fa fa-user fa-3x"></i> Supervisor</a>
                    </li>	
                   <li>
                        <a href="letter.php"><i class="fa fa-file-text fa-3x"></i> Introduction Letter</a>
                    </li>
					<li>
                        <a href="logbook.php"><i class="fa fa-book fa-3x"></i> Logbook</a>
                    </li>
                    <li>
						   <li  >
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
                     <h2 style="font-size:26px;">Profile</h2>   
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
			   <?php
			   $gat=mysqli_query($con,"select * from supervisor where id='".$me['supervisor_id']."'");
			   $sup=mysqli_fetch_assoc($gat);
			   ?>
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
                        
        </div><!--/.row-->
                 <!-- /. ROW  -->
            
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="staff/assets/js/jquery-1.10.2.js"></script>
	
	<script> 
	  $(document).ready(function(){
		$("#formpassword").on('submit',(function(e){
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
	
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="staff/assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="staff/assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="staff/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="staff/assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="staff/assets/js/custom.js"></script>
    
   
</body>
</html>
