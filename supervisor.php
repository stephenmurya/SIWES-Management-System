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
    <title>SMS | Supervisor</title>
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
                        <a class="active-menu" href="supervisor.php"><i class="fa fa-user fa-3x"></i> Supervisor</a>
                    </li>	
                   <li>
                        <a href="letter.php"><i class="fa fa-file-text fa-3x"></i> Introduction Letter</a>
                    </li>
					<li>
                        <a href="logbook.php"><i class="fa fa-book fa-3x"></i> Logbook</a>
                    </li>
                    <li>
						   <li  >
                        <a href="profile.php"><i class="fa fa-user fa-3x"></i> Profile</a>
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
                     <h2 style="font-size:26px;">Supervisor</h2>   
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
			   <?php
			   $gat=mysqli_query($con,"select * from supervisor where id='".$me['supervisor_id']."'");
			   $sup=mysqli_fetch_assoc($gat);
			   ?>
              <div class="row">
			     
                    <div class="col-md-3 col-sm-12 col-xs-12 ">
                        <div class="panel ">
          <div class="main-temp-back">
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-12" style="font-size:19px;"> </div>
              </div>
            </div>
          </div>
          
        </div>
                     <div class="panel panel-back noti-box">
                <div class="text-box" align="center" >
				<img src="images/avatar.png" class="img-responsive img-thumbnail" style="width:176px;"><br></br>
				
                </div>
             </div>
		
    </div>
                    <div class="col-md-9 col-sm-12 col-xs-12">           
			<div class="panel panel-back noti-box">
                <!-- `firstname` , `lastname` , `username` , `phone` , `class` , `gender` , `picture` , `address` , `password` , `date` , `id` -->
                <div class="text-box" >
                    <p class="main-text" style="font-size:20px;"><i class="fa fa-user"></i>&nbsp;&nbsp; <?php echo ucwords($sup['firstname']); ?> </p><hr>
                    <p class="main-text" style="font-size:20px;"><i class="fa fa-user"></i>&nbsp;&nbsp; <?php echo ucwords($sup['lastname']); ?> </p><hr>
                    <p class="main-text" style="font-size:20px;"><i class="fa fa-envelope"></i>&nbsp;&nbsp; <?php echo $sup['email']; ?> </p><hr>
                   
                </div>
             </div>
		     </div>
                        
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
		
	$("input.upload").change(function(){
		$("div.form_content").show();
	});
	$("button.close_content").click(function(){
		$("div.form_content").fadeOut();
	});
		
			$("#formupload").on('submit',(function(e){
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
		<script>
	$(document).ready(function(){
		$("a.delete").click(function(){
			var delete_material = $(this).attr("id");
				if(confirm("Are you sure you want to delete file?"))
		  {
			$.ajax({
						type: "POST",
                        url: "operation.php",
                        data: ({delete_material:delete_material}),
                        cache: false,
                        success: function(data){ 
							$("div#"+delete_material).animate({ backgroundColor: "#fbc7c7" }, "fast").animate({ opacity: "hide" }, "slow");
						 } 
 });
 }

return false;
		});
		
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
