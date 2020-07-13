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


if(isset($_GET['approve'])){
	$sid=$_GET['approve'];
	mysqli_query($con,"insert into approval(student_id,reg_date) values('".$_GET['approve']."','$date')");
	header("location:?sid=$sid");
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SMS | Log-book</title>
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
                        <a class="active-menu" href="log.php"><i class="fa fa-book fa-3x"></i> Log-book</a>
                    </li>
						   <li>
                        <a  href="supervisor_profile.php"><i class="fa fa-user fa-3x"></i> Profile</a>
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
					<h2>Log-book</h2>
                      
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
				<?php echo $error; ?>
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                         <div class="panel-heading">
                          <h2 style="font-size:20px; margin:1px 0; text-align:center;">REPORT   </h2>
                        </div>
						      <div class="panel-body">
<div class="col-md-2">
<h6 class="mb-10 pl-15" style="font-weight:bold; font-size:20px; color:;">Students</h6>
															<ul class="folder-list mb-30" style="height:500px; overflow-y:auto; border-right:1px solid lavender; margin-left:-60px;">
															<?php
															$rap=mysqli_query($con,"select * from student where supervisor_id='".$_SESSION['sms_super_id']."' order by firstname asc");
									while($row=mysqli_fetch_assoc($rap)){
	echo '<li style=""><a href="?sid='.$row['id'].'" class="nav" style="font-size:16px; color:black;
	padding-left:8px;"><i class="fa fa-user"></i> '.ucwords($row['firstname'].' '.$row['lastname'].' - '.$row['matric_no']).'</a></li>';
									}
															
															?>
															</ul>
</div>
<div class="col-md-10">
<?php
if(isset($_GET['sid'])){
	$mar=mysqli_query($con,"select * from student where id='".$_GET['sid']."'");
	$sut=mysqli_fetch_assoc($mar);
	
	$mus=mysqli_query($con,"select * from organisation where student_id='".$_GET['sid']."'");
	if(mysqli_num_rows($mus)>0){
	$org=mysqli_fetch_assoc($mus);

	$exp=explode(" ",$org['reg_date']);
	
	$exp_org=explode("-",$exp[0]);
		
	?>
  <div class="" style="padding:0 15px;"> <!--student_id 	image 	to_who 	company_name 	company_address 	company_email 	company_phone 	reg_date-->
				<div class='msg'></div>
		 <?php echo $error;
			   $gat=mysqli_query($con,"select * from organisation where student_id='".$_GET['sid']."'");
			   if(mysqli_num_rows($gat)>0){
			   $sup=mysqli_fetch_assoc($gat); 
			   //$exp=explode(" ",$sup['reg_date']);
			   //$exp_org=explode("-",$exp[0]);
			   echo '<div style="height:600px; overflow-x:hidden; overflow-y:auto;">';
			    echo '<div style="margin-bottom:40px; border:2px solid lavender; background-color:ghostwhite;">
			  <div align="center"><img src="../images/logbook_bg.png" class="img-responsive"></div>
			  <div align="center" style="padding:15px; margin-top:20px;"><img src="../'.$sup['image'].'" class="img-responsive img-thumbnail" style="width:160px; height:165px;"></div>
			  <div align="center" style="padding:5px;">
			  <p style="font-size:20px;">Student Name: '.ucwords($sut['firstname'].' '.$sut['lastname']).'</p>
			  <p style="font-size:20px;">Matric No: '.$sut['matric_no'].'</p>
			  <p style="font-size:20px;">Level: '.$sut['level'].'</p>
			  
			  </div>
			   </div>';
			   for($i=1; $i<=24; $i++){ 
			   //student_id 	week 	day 	content 	file 	week_ending 	reg_date 
			   $mil=mysqli_query($con,"select * from logbook where student_id='".$_GET['sid']."' AND week='$i' order by id asc limit 1");
			   $gen=mysqli_fetch_assoc($mil);
			   
			   ?>
				<div class="row" style="border-bottom:1px dashed gray; margin-bottom:40px; padding-bottom:30px;">
			     
                    <div class="col-md-3 col-sm-12 col-xs-12 ">
		
                        <div class="panel ">
          <div class="main-temp-back">
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-12" style="font-size:19px; margin:-10px auto;">
				Week <?php echo $i; ?>
				</div>
              </div>
            </div>
          </div>
          
        </div>
                     <div class="panel panel-back noti-box" style="background-color:transparent;">
                <div class="text-box" align="center" >
				<?php
				if($gen['file'] !=''){
					echo '<h4 style="text-align:center; padding:2px;">Attached Picture</h4>';
					echo '<a href="../'.$gen['file'].'"><img src="../'.$gen['file'].'" class="img-responsive img-thumbnail" style="width:176;"></a>';
				}else{
					echo '<p style="text-align:center;">No image attached</p><br></br>';
				}
				?>
				
				
				
                </div>
             </div>
		
    </div>
                    <div class="col-md-9 col-sm-12 col-xs-12" style="margin-top:;">    
			<div class="main-temp-back">
            <div class="panel-body">
              <div class="row">
                <div class="col-xs-5" style="font-size:19px; margin:-10px auto;">
				Weekly progress chart
				</div>
				<form method="post">
				 <div class="col-xs-7 pull-right" style="font-size:17px; margin:-10px auto;">
				Week Ending: <?php echo $gen['week_ending']; ?>
				</div>
              </div>
            </div>
          </div>					
								<div class="table-responsive" style="margin-top:20px;">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="">
                                    <thead>
                                        <tr> 
					<!--id 	firstname 	lastname 	matric_no 	level 	department 	password 	supervisor_id 	reg_date -->	
                                            <th>DAY AND DATE</th>
                                            <th>DESCRIPTION OF WORK DONE</th>
                                            <!--<th>Letter</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
									//MONDAY
									$mil_mon=mysqli_query($con,"select * from logbook where student_id='".$_GET['sid']."' AND week='$i' AND day='monday' order by id limit 1");
									$log_mon=mysqli_fetch_assoc($mil_mon);
								echo '<input type="hidden" value="monday" name="day">
										<input type="hidden" value="'.$i.'" name="week">';
										
										echo '<tr class="odd gradeX" id="'.$log_mon['id'].'">
                                            <td><h3 style="text-align:center; font-size:17px;">MONDAY</h3></td>
                                            <td><textarea name="content" id="'.$log_mon['id'].'" value="'.$log_mon['content'].'" style="resize:none; width:100%;" readonly>'.$log_mon['content'].'</textarea></td>
                                            </tr></form>';
										
										//TUESDAY
									$mil_tue=mysqli_query($con,"select * from logbook where student_id='".$_GET['sid']."' AND week='$i' AND day='tuesday' order by id limit 1");
									$log_tue=mysqli_fetch_assoc($mil_tue);
								echo '<form method="post">
								<input type="hidden" value="tuesday" name="day">
										<input type="hidden" value="'.$i.'" name="week">';
								
										echo '<tr class="odd gradeX" id="'.$log_tue['id'].'">
                                            <td><h3 style="text-align:center; font-size:17px;">TUESDAY</h3></td>
                                            <td><textarea name="content" id="'.$log_tue['id'].'" value="'.$log_tue['content'].'" style="resize:none; width:100%;" readonly>'.$log_tue['content'].'</textarea></td>
                                            </tr></form>';
										
										//WEDNESDAY
									$mil_wed=mysqli_query($con,"select * from logbook where student_id='".$_GET['sid']."' AND week='$i' AND day='wednesday' order by id limit 1");
									$log_wed=mysqli_fetch_assoc($mil_wed);
								echo '<form method="post">
								<input type="hidden" value="wednesday" name="day">
										<input type="hidden" value="'.$i.'" name="week">';
										
										echo '<tr class="odd gradeX" id="'.$log_wed['id'].'">
                                            <td><h3 style="text-align:center; font-size:17px;">WEDNESDAY</h3></td>
                                            <td><textarea name="content" id="'.$log_wed['id'].'" value="'.$log_wed['content'].'" style="resize:none; width:100%;" readonly>'.$log_wed['content'].'</textarea></td>
                                            </tr></form>';
										
										//THURSDAY
									$mil_thu=mysqli_query($con,"select * from logbook where student_id='".$_GET['sid']."' AND week='$i' AND day='thursday' order by id limit 1");
									$log_thu=mysqli_fetch_assoc($mil_thu);
								echo '<form method="post">
								<input type="hidden" value="thursday" name="day">
										<input type="hidden" value="'.$i.'" name="week">';
										
										echo '<tr class="odd gradeX" id="'.$log_thu['id'].'">
                                            <td><h3 style="text-align:center; font-size:17px;">THURSDAY</h3></td>
                                            <td><textarea name="content" id="'.$log_thu['id'].'" value="'.$log_thu['content'].'" style="resize:none; width:100%;" readonly>'.$log_thu['content'].'</textarea></td>
                                            </tr></form>';
										
										//FRIDAY
									$mil_fri=mysqli_query($con,"select * from logbook where student_id='".$_GET['sid']."' AND week='$i' AND day='friday' order by id limit 1");
									$log_fri=mysqli_fetch_assoc($mil_fri);
								echo '<form method="post">
								<input type="hidden" value="friday" name="day">
										<input type="hidden" value="'.$i.'" name="week">';
										
										echo '<tr class="odd gradeX" id="'.$log_fri['id'].'">
                                            <td><h3 style="text-align:center; font-size:17px;">FRIDAY</h3></td>
                                            <td><textarea name="content" id="'.$log_fri['id'].'" value="'.$log_fri['content'].'" style="resize:none; width:100%;" readonly>'.$log_fri['content'].'</textarea></td>
                                            </tr></form>';
										
										
										
										
										
									 //<td class="text-center"><a href="letter.php?sid='.$row['id'].'" style="font-size:17px;" class="text-primary"><i class="fa fa-file-text"></i></a></td>
									?>
                                        
                                    </tbody>
                                </table>
                            </div>
							
		     </div>
                        
        </div>
			 <?PHP  } 
			 ECHO '<div>';			 
			 
			 }else{
				   echo '<div style="" align="center">
				   <h2><i class="fa fa-exclamation"></i> Oops, No Introduction Letter Found.</h2>
				   <h4 style="text-align:center; margin-top:50px; color:gray;">Click below to apply.</h4>
				   <a href="letter.php" class="text-primary" style="font-size:70px; font-weight:normal;"><i class="fa fa-arrow-circle-o-down "></i> </a></div>';
			   }
			   ?>
		  
					</div>
                     
    </div>
          <?php
		$tay=mysqli_query($con,"select * from approval where student_id='".$_GET['sid']."'");
		if(mysqli_num_rows($tay)>0){
		$app=mysqli_fetch_assoc($tay);	
		
echo '<div align="center">
<h2 style="font-weight:bold; color:#0066cc; opacity:0.6;"><i class="fa fa-certificate" style="color:#cc9900;"></i> APPROVED</h2>
<div>'.$app['reg_date'].'</div></div>';
		
		
		}else{
			echo '<div style="margin-top:20px;" align="center"><a href="?approve='.$_GET['sid'].'" class="btn btn-info"><i class="fa fa-check"></i> Approve</a></div>';
		}
		  
		  ?>         
                        
        </div>
	
	
	
	<?php }else{
		echo '<h3 style="text-align:center;">No Introduction Letter '.ucwords($sut['firstname'].' '.$sut['lastname']).' !</h3>';
	}
}else{
		echo '<div align="center" style="margin-top:70px;"><img src="../images/siwes-logo.gif" class="img-responsive" style="width:300px;">
													
			</div>';	
													}

?>
</div>
						
                            
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
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
		  $("a.open_div").click(function(){
			 $("div.supervisor_div").fadeIn(); 
			 $("a.open_div").hide(); 
			 $("a.close_div").show(); 
		  });
		  $("a.close_div").click(function(){
			 $("div.supervisor_div").fadeOut(); 
			 $("a.close_div").hide(); 
			 $("a.open_div").show(); 
		  });
		  
		  
		$("a.delete_user").click(function(){
		var delete_user = $(this).attr("id");
		if(confirm("Are you sure you want to delete User?"))
		  {
			$.ajax({
						type: "POST",
                        url: "operation.php",
                        data: ({delete_user:delete_user}),
                        cache: false,
                        success: function(data){ 
							$("tr#"+delete_user).animate({ backgroundColor: "#fbc7c7" }, "fast").animate({ opacity: "hide" }, "slow");
						 } 
 });
 }

return false;
	});
		
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
