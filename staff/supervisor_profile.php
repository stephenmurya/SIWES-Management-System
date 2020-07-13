<?php
include("../connect.php");
session_start();
if(!isset($_SESSION['sms_super_id'])){
	header("location:index.php");
}

$mum=mysqli_query($con,"select * from supervisor where id='".$_SESSION['sms_super_id']."'");
$me=mysqli_fetch_assoc($mum);

$mus=mysqli_query($con,"select * from admin order by id limit 1");
$adm=mysqli_fetch_assoc($mus);

if(isset($_GET['discard'])){
	mysqli_query($con,"delete from organisation where id='".$_GET['discard']."'");
	$error='<div class="alert alert-success"><p style="font-size:16px; margin-top:-14px;"><i class="fa fa-check text-success"></i> Success! Letter deleted.</p></div>';
}
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
	<style>
	/*File Manager*/
.file-box {
  float: left;
  margin-bottom: 20px; }

.file-sec {
  border-left: 1px solid rgba(33, 33, 33, 0.05); }

.file-manager {
  list-style: none outside none;
  margin: 0;
  padding: 0; }
  .file-manager h5 {
    text-transform: uppercase; }

.folder-list li {
  display: block; }
  .folder-list li.active a {
    background: rgba(33, 33, 33, 0.05); }
  .folder-list li a {
    display: block;
    padding: 10px 0;
    -webkit-transition: 0.3s ease;
    -moz-transition: 0.3s ease;
    transition: 0.3s ease; }
    .folder-list li a:hover {
      background: rgba(33, 33, 33, 0.05); }
  .folder-list li i {
    margin-right: 8px;
    color: #878787; }

.category-list li {
  display: block; }
  .category-list li a {
    color: #666666;
    display: block;
    padding: 5px 0; }
  .category-list li i {
    margin-right: 8px;
    color: #3d4d5d; }

.file-manager h5.tag-title {
  margin-top: 20px; }

.tag-list li {
  float: left; }
  .tag-list li a {
    font-size: 12px;
    background-color: #dedede;
    padding: 5px 12px;
    border: 1px solid #dedede;
    margin-right: 5px;
    margin-top: 5px;
    display: block; }

.file-manager .hr-line-dashed {
  margin: 15px 0; }
 a {
  text-decoration: none;
 }

a:hover {
  text-decoration: none;
  }

a:focus {
  text-decoration: none;
  outline: none;
  color: #212121; }
	</style>
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
                <a class="navbar-brand" href="home.php">Supervisor</a> 
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
                        <a  href="supervisor_home.php"><i class="fa fa-users fa-3x"></i> Assigned Students</a>
                    </li>
                   <li>
                        <a href="letter.php"><i class="fa fa-file-text fa-3x"></i> Letter</a>
                    </li>
					<li>
                        <a  href="log.php"><i class="fa fa-book fa-3x"></i> Log-book</a>
                    </li>
						   <li>
                        <a class="active-menu"  href="supervisor_profile.php"><i class="fa fa-user fa-3x"></i> Profile</a>
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
                        url: "operation2.php",
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
