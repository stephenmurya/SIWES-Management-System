<?php
include("connect.php");
session_start();
if(!isset($_SESSION['stu_id'])){
	header("location:index.php");
}

$yat=mysqli_query($con,"select * from student where id='".$_SESSION['stu_id']."'");
$me=mysqli_fetch_assoc($yat);

$mus=mysqli_query($con,"select * from admin order by id limit 1");
$adm=mysqli_fetch_assoc($mus);

if(isset($_POST['upload_attachment'])){
	$don=mysqli_query($con,"select * from logbook where student_id='".$_SESSION['stu_id']."' AND week='".$_POST['week']."'");
	if(mysqli_num_rows($don)>0){
		$target_file = "attach".basename($_FILES["draw"]["name"]);
    $attachment_type = pathinfo($target_file,PATHINFO_EXTENSION);
	
	if($attachment_type !='jpg' && $attachment_type !='png' && $attachment_type !='gif' && $attachment_type !='jpeg'){
		$error ='<div class="alert alert-danger alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<p class="pull-left"><i class="fa fa-warning"></i> &nbsp; Oops! Not a picture format.</p>
											<div class="clearfix"></div>
										</div>';
	}else{
	$cont_name=$me['matric_no'].'_'.time();
	move_uploaded_file($_FILES["draw"]["tmp_name"],"attach/".$cont_name.'.'.$attachment_type);			
	$location="attach/".$cont_name.'.'.$attachment_type;
	$qry=mysqli_query($con,"update logbook set file='$location' where student_id='".$_SESSION['stu_id']."' AND week='".$_POST['week']."' ");

		$error = '<div class="alert alert-success alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<p class="pull-left"><i class="fa fa-check"></i> &nbsp; Success! Attachment uploaded for the week.</p>
											<div class="clearfix"></div>
										</div>';
	
	}
	}else{
		$error ='<div class="alert alert-danger alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<p class="pull-left"><i class="fa fa-warning"></i> &nbsp; Oops! Please fill the description of work done</p>
											<div class="clearfix"></div>
										</div>';
	}
	
	
}

if(isset($_POST['monday_submit'])){ //student_id 	week 	day 	content 	file 	week_ending 	reg_date 

$dod=mysqli_query($con,"select * from logbook where student_id='".$_SESSION['stu_id']."' AND week='".$_POST['week']."' AND day='".$_POST['day']."'");
if(mysqli_num_rows($dod)>0){
	mysqli_query($con,"update logbook set content='".$_POST['content']."', week_ending='".$_POST['week_ending']."' where student_id='".$_SESSION['stu_id']."' AND week='".$_POST['week']."' AND day='".$_POST['day']."'");
										$error = '<div class="alert alert-success alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<p class="pull-left"><i class="fa fa-check"></i> &nbsp; Success! Description of work done updated.</p>
											<div class="clearfix"></div>
										</div>';
}else{
	mysqli_query($con,"insert into logbook(student_id,week,day,content,file,week_ending,reg_date) 
values('".$_SESSION['stu_id']."','".$_POST['week']."','".$_POST['day']."','".$_POST['content']."','','".$_POST['week_ending']."','$date')");
										$error = '<div class="alert alert-success alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<p class="pull-left"><i class="fa fa-check"></i> &nbsp; Success! Description of work done uploaded.</p>
											<div class="clearfix"></div>
										</div>';
}

}

if(isset($_POST['tuesday_submit'])){ //student_id 	week 	day 	content 	file 	week_ending 	reg_date 

$dod=mysqli_query($con,"select * from logbook where student_id='".$_SESSION['stu_id']."' AND week='".$_POST['week']."' AND day='".$_POST['day']."'");
if(mysqli_num_rows($dod)>0){
	mysqli_query($con,"update logbook set content='".$_POST['content']."' where student_id='".$_SESSION['stu_id']."' AND week='".$_POST['week']."' AND day='".$_POST['day']."'");
										$error = '<div class="alert alert-success alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<p class="pull-left"><i class="fa fa-check"></i> &nbsp; Success! Description of work done updated.</p>
											<div class="clearfix"></div>
										</div>';
}else{
	mysqli_query($con,"insert into logbook(student_id,week,day,content,file,week_ending,reg_date) 
values('".$_SESSION['stu_id']."','".$_POST['week']."','".$_POST['day']."','".$_POST['content']."','','','$date')");
										$error = '<div class="alert alert-success alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<p class="pull-left"><i class="fa fa-check"></i> &nbsp; Success! Description of work done uploaded.</p>
											<div class="clearfix"></div>
										</div>';
}

}

if(isset($_POST['wednesday_submit'])){ //student_id 	week 	day 	content 	file 	week_ending 	reg_date 

$dod=mysqli_query($con,"select * from logbook where student_id='".$_SESSION['stu_id']."' AND week='".$_POST['week']."' AND day='".$_POST['day']."'");
if(mysqli_num_rows($dod)>0){
	mysqli_query($con,"update logbook set content='".$_POST['content']."' where student_id='".$_SESSION['stu_id']."' AND week='".$_POST['week']."' AND day='".$_POST['day']."'");
										$error = '<div class="alert alert-success alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<p class="pull-left"><i class="fa fa-check"></i> &nbsp; Success! Description of work done updated.</p>
											<div class="clearfix"></div>
										</div>';
}else{
	mysqli_query($con,"insert into logbook(student_id,week,day,content,file,week_ending,reg_date) 
values('".$_SESSION['stu_id']."','".$_POST['week']."','".$_POST['day']."','".$_POST['content']."','','','$date')");
										$error = '<div class="alert alert-success alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<p class="pull-left"><i class="fa fa-check"></i> &nbsp; Success! Description of work done uploaded.</p>
											<div class="clearfix"></div>
										</div>';
}

}

if(isset($_POST['thursday_submit'])){ //student_id 	week 	day 	content 	file 	week_ending 	reg_date 

$dod=mysqli_query($con,"select * from logbook where student_id='".$_SESSION['stu_id']."' AND week='".$_POST['week']."' AND day='".$_POST['day']."'");
if(mysqli_num_rows($dod)>0){
	mysqli_query($con,"update logbook set content='".$_POST['content']."' where student_id='".$_SESSION['stu_id']."' AND week='".$_POST['week']."' AND day='".$_POST['day']."'");
										$error = '<div class="alert alert-success alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<p class="pull-left"><i class="fa fa-check"></i> &nbsp; Success! Description of work done updated.</p>
											<div class="clearfix"></div>
										</div>';
}else{
	mysqli_query($con,"insert into logbook(student_id,week,day,content,file,week_ending,reg_date) 
values('".$_SESSION['stu_id']."','".$_POST['week']."','".$_POST['day']."','".$_POST['content']."','','','$date')");
										$error = '<div class="alert alert-success alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<p class="pull-left"><i class="fa fa-check"></i> &nbsp; Success! Description of work done uploaded.</p>
											<div class="clearfix"></div>
										</div>';
}

}

if(isset($_POST['friday_submit'])){ //student_id 	week 	day 	content 	file 	week_ending 	reg_date 

$dod=mysqli_query($con,"select * from logbook where student_id='".$_SESSION['stu_id']."' AND week='".$_POST['week']."' AND day='".$_POST['day']."'");
if(mysqli_num_rows($dod)>0){
	mysqli_query($con,"update logbook set content='".$_POST['content']."' where student_id='".$_SESSION['stu_id']."' AND week='".$_POST['week']."' AND day='".$_POST['day']."'");
										$error = '<div class="alert alert-success alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<p class="pull-left"><i class="fa fa-check"></i> &nbsp; Success! Description of work done updated.</p>
											<div class="clearfix"></div>
										</div>';
}else{
	mysqli_query($con,"insert into logbook(student_id,week,day,content,file,week_ending,reg_date) 
values('".$_SESSION['stu_id']."','".$_POST['week']."','".$_POST['day']."','".$_POST['content']."','','','$date')");
										$error = '<div class="alert alert-success alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<p class="pull-left"><i class="fa fa-check"></i> &nbsp; Success! Description of work done uploaded.</p>
											<div class="clearfix"></div>
										</div>';
}

}

$tay=mysqli_query($con,"select * from approval where student_id='".$_SESSION['stu_id']."'");
		if(mysqli_num_rows($tay)>0){ ?>
			<style>
		button.logbook{
			display:none;
		}
			</style>
		
		<?php }

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SMS | Logbook</title>
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
                        <a class="active-menu" href="logbook.php"><i class="fa fa-book fa-3x"></i> Logbook</a>
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
                     <h2 style="font-size:26px;">Logbook</h2>   
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
              <div class="row">
			     
                    <div class="col-md-12 col-sm-12 col-xs-12 ">
                        <div class="" style="padding:0 15px;"> <!--student_id 	image 	to_who 	company_name 	company_address 	company_email 	company_phone 	reg_date-->
				<div class='msg'></div>
		 <?php echo $error;
			   $gat=mysqli_query($con,"select * from organisation where student_id='".$_SESSION['stu_id']."'");
			   if(mysqli_num_rows($gat)>0){
			   $sup=mysqli_fetch_assoc($gat); 
			   //$exp=explode(" ",$sup['reg_date']);
			   //$exp_org=explode("-",$exp[0]);
			   echo '<div style="height:600px; overflow-x:hidden; overflow-y:auto;">';
			   
			   echo '<div style="margin-bottom:40px; border:2px solid lavender; background-color:ghostwhite;">
			  <div align="center"><img src="images/logbook_bg.png" class="img-responsive"></div>
			  <div align="center" style="padding:15px; margin-top:20px;"><img src="'.$sup['image'].'" class="img-responsive img-thumbnail" style="width:160px; height:165px;"></div>
			  <div align="center" style="padding:5px;">
			  <p style="font-size:20px;">Student Name: '.ucwords($me['firstname'].' '.$me['lastname']).'</p>
			  <p style="font-size:20px;">Matric No: '.$me['matric_no'].'</p>
			  <p style="font-size:20px;">Level: '.$me['level'].'</p>
			  
			  </div>
			   </div>';
			   
			   
			   
			   for($i=1; $i<=24; $i++){ 
			   //student_id 	week 	day 	content 	file 	week_ending 	reg_date 
			   $mil=mysqli_query($con,"select * from logbook where student_id='".$_SESSION['stu_id']."' AND week='$i' order by id asc limit 1");
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
                     <div class="panel panel-back noti-box">
                <div class="text-box" align="center" >
				<?php
				if($gen['file'] !=''){
					echo '<h4 style="text-align:center; padding:7px;">Attached Picture</h4>';
					echo '<a href="'.$gen['file'].'"><img src="'.$gen['file'].'" class="img-responsive img-thumbnail" style="width:176;"></a>';
				}else{
					echo '<img src="images/upload.png" class="img-responsive img-thumbnail" style="width:; padding:30px;">
													<form method="post" enctype="multipart/form-data">
													<div class="form-group" style="margin-top:14px;">
													<label class="control-label pull-left">Attachment</span></label>
													<input type="hidden" value="'.$i.'" name="week">
													<input type="file" name="draw" required><br>
													<button type="submit" name="upload_attachment" class="btn btn-info btn-block logbook">Upload</button>
												</div></form><br></br>';
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
				 <div class="col-xs-7 pull-right" style="font-size:19px; margin:-10px auto;">
				Week Ending <input name="week_ending" type="text" value="<?php echo $gen['week_ending']; ?>" style="color:black;" required>
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
                                            <th>REMARKS</th>
                                            <th>ACTION</th>
                                            <!--<th>Letter</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php 
									//MONDAY
									$mil_mon=mysqli_query($con,"select * from logbook where student_id='".$_SESSION['stu_id']."' AND week='$i' AND day='monday' order by id limit 1");
									$log_mon=mysqli_fetch_assoc($mil_mon);
								echo '<input type="hidden" value="monday" name="day">
										<input type="hidden" value="'.$i.'" name="week">';
										
										echo '<tr class="odd gradeX" id="'.$log_mon['id'].'">
                                            <td><h3 style="text-align:center; font-size:17px;">MONDAY</h3></td>
                                            <td><textarea name="content" id="'.$log_mon['id'].'" value="'.$log_mon['content'].'" style="resize:none; width:100%;" required>'.$log_mon['content'].'</textarea></td>
                                            <td></td>
          <td class="text-center"><button type="submit" name="monday_submit" style="font-size:;" class="btn btn-default btn-sm logbook">Update</button></td>
                                        </tr></form>';
										
										//TUESDAY
									$mil_tue=mysqli_query($con,"select * from logbook where student_id='".$_SESSION['stu_id']."' AND week='$i' AND day='tuesday' order by id limit 1");
									$log_tue=mysqli_fetch_assoc($mil_tue);
								echo '<form method="post">
								<input type="hidden" value="tuesday" name="day">
										<input type="hidden" value="'.$i.'" name="week">';
								
										echo '<tr class="odd gradeX" id="'.$log_tue['id'].'">
                                            <td><h3 style="text-align:center; font-size:17px;">TUESDAY</h3></td>
                                            <td><textarea name="content" id="'.$log_tue['id'].'" value="'.$log_tue['content'].'" style="resize:none; width:100%;" required>'.$log_tue['content'].'</textarea></td>
                                            <td></td>
          <td class="text-center"><button type="submit" name="tuesday_submit" style="font-size:;" class="btn btn-default btn-sm logbook">Update</button></td>
                                        </tr></form>';
										
										//WEDNESDAY
									$mil_wed=mysqli_query($con,"select * from logbook where student_id='".$_SESSION['stu_id']."' AND week='$i' AND day='wednesday' order by id limit 1");
									$log_wed=mysqli_fetch_assoc($mil_wed);
								echo '<form method="post">
								<input type="hidden" value="wednesday" name="day">
										<input type="hidden" value="'.$i.'" name="week">';
										
										echo '<tr class="odd gradeX" id="'.$log_wed['id'].'">
                                            <td><h3 style="text-align:center; font-size:17px;">WEDNESDAY</h3></td>
                                            <td><textarea name="content" id="'.$log_wed['id'].'" value="'.$log_wed['content'].'" style="resize:none; width:100%;" required>'.$log_wed['content'].'</textarea></td>
                                            <td></td>
          <td class="text-center"><button type="submit" name="wednesday_submit" style="font-size:;" class="btn btn-default btn-sm logbook">Update</button></td>
                                        </tr></form>';
										
										//THURSDAY
									$mil_thu=mysqli_query($con,"select * from logbook where student_id='".$_SESSION['stu_id']."' AND week='$i' AND day='thursday' order by id limit 1");
									$log_thu=mysqli_fetch_assoc($mil_thu);
								echo '<form method="post">
								<input type="hidden" value="thursday" name="day">
										<input type="hidden" value="'.$i.'" name="week">';
										
										echo '<tr class="odd gradeX" id="'.$log_thu['id'].'">
                                            <td><h3 style="text-align:center; font-size:17px;">THURSDAY</h3></td>
                                            <td><textarea name="content" id="'.$log_thu['id'].'" value="'.$log_thu['content'].'" style="resize:none; width:100%;" required>'.$log_thu['content'].'</textarea></td>
                                            <td></td>
          <td class="text-center"><button type="submit" name="thursday_submit" style="font-size:;" class="btn btn-default btn-sm logbook">Update</button></td>
                                        </tr></form>';
										
										//FRIDAY
									$mil_fri=mysqli_query($con,"select * from logbook where student_id='".$_SESSION['stu_id']."' AND week='$i' AND day='friday' order by id limit 1");
									$log_fri=mysqli_fetch_assoc($mil_fri);
								echo '<form method="post">
								<input type="hidden" value="friday" name="day">
										<input type="hidden" value="'.$i.'" name="week">';
										
										echo '<tr class="odd gradeX" id="'.$log_fri['id'].'">
                                            <td><h3 style="text-align:center; font-size:17px;">FRIDAY</h3></td>
                                            <td><textarea name="content" id="'.$log_fri['id'].'" value="'.$log_fri['content'].'" style="resize:none; width:100%;" required>'.$log_fri['content'].'</textarea></td>
                                            <td></td>
          <td class="text-center"><button type="submit" name="friday_submit" style="font-size:;" class="btn btn-default btn-sm logbook">Update</button></td>
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
		$tay=mysqli_query($con,"select * from approval where student_id='".$_SESSION['stu_id']."'");
		if(mysqli_num_rows($tay)>0){
		$app=mysqli_fetch_assoc($tay);	
		
		$dop=mysqli_query($con,"select * from supervisor where id='".$me['supervisor_id']."'");
		$lec=mysqli_fetch_assoc($dop);
		
echo '<div align="center">
<h2 style="font-weight:bold; color:#0066cc; opacity:0.6;"><i class="fa fa-certificate" style="color:#cc9900;"></i> APPROVED</h2>
<div><p style="font-size:17px; color:black;"> Supervisor: '.ucwords($lec['firstname'].' '.$lec['lastname']).'</p></div>
<div>'.$app['reg_date'].'</div></div>';
		
		
		}else{
			echo '<h4 style="text-align:center; margin-top:20px; color:crimson;">Not  yet approved!</h4>';
		}
		  
		  ?>         
                        
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
		
			$("#formupload").on('submit',(function(e){
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
