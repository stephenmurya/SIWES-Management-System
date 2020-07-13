<?php
include("connect.php");
session_start();

//firstname 	lastname 	matric_no 	level 	password 	supervisor_id 	reg_date
if(isset($_POST['login'])){

$pes=mysqli_query($con,"select * from student where matric_no='".$_POST['matric_no']."' AND password='".$_POST['password']."'");
if(mysqli_num_rows($pes)>0){
$row=mysqli_fetch_array($pes);

$_SESSION['stu_id']=$row['id'];	
$_SESSION['stu_matric']=$row['matric_no'];		

	echo '<script>
	location.href="dashboard.php"
	</script>';

}else{
	echo '<div class="alert alert-danger alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<p class="pull-left"><i class="fa fa-warning"></i> &nbsp; Oops! Incorrect Login details.</p>
											<div class="clearfix"></div>
										</div>';
}
	
}

if(isset($_POST['introduction_letter'])){
	$pes=mysqli_query($con,"select * from student where id='".$_SESSION['stu_id']."'");
	$row=mysqli_fetch_array($pes);

	$target_file = "pics".basename($_FILES["attachment"]["name"]);
    $attachment_type = pathinfo($target_file,PATHINFO_EXTENSION);
	
	if($attachment_type !='jpg' && $attachment_type !='png' && $attachment_type !='gif' && $attachment_type !='jpeg'){
		echo '<div class="alert alert-danger alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<p class="pull-left"><i class="fa fa-warning"></i> &nbsp; Oops! Not a picture format.</p>
											<div class="clearfix"></div>
										</div>';
	}else{
	$cont_name=$row['matric_no'].'_'.time();
	move_uploaded_file($_FILES["attachment"]["tmp_name"],"pics/".$cont_name.'.'.$attachment_type);			
	$location="pics/".$cont_name.'.'.$attachment_type;
	
	mysqli_query($con,"insert into organisation(student_id,image,to_who,company_name,company_address,company_email,company_phone,reg_date) 
values('".$_SESSION['stu_id']."','$location','".$_POST['to_who']."','".$_POST['company_name']."','".$_POST['company_address']."','".$_POST['company_email']."','".$_POST['company_phone']."','$date')");
	echo '<script>
	window.location="letter.php"
	</script>';
	}


}

if(isset($_POST['ori'])){
		  if($_POST['old'] != $_POST['ori']){
			  echo '<div class="alert alert-danger alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<p class="pull-left"><i class="fa fa-ban"></i> &nbsp; Oops! Incorrect Password.</p>
											<div class="clearfix"></div>
										</div>';
		  }else if($_POST['cnew'] != $_POST['new']){
			  echo '<div class="alert alert-danger alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<p class="pull-left"><i class="fa fa-ban"></i> &nbsp; Oops!  Password does not match.</p>
											<div class="clearfix"></div>
										</div>';
		  }else if(strlen($_POST['new'])<6){
			  echo '<div class="alert alert-danger alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<p class="pull-left"><i class="fa fa-ban"></i> &nbsp; Oops!  Password length cannot be less than 6.</p>
											<div class="clearfix"></div>
											</div>';
		  }else if($_POST['new'] == $_POST['old']){
			  echo '<div class="alert alert-danger alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<p class="pull-left"><i class="fa fa-ban"></i> &nbsp; Oops! The same as of your Current password.</p>
											<div class="clearfix"></div>
										</div>';
		  }else{
			  $qry=mysqli_query($con,"update student set password='".$_POST['new']."' where id='".$_SESSION['stu_id']."'");
			   if($qry){
		echo '<div class="alert alert-success alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<p class="pull-left"><i class="fa fa-check"></i> &nbsp; Success! Password Changed Successfully.</p>
											<div class="clearfix"></div>
										</div>';
	}else{
		echo '<div class="alert alert-danger alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
											<p class="pull-left"><i class="fa fa-ban"></i> &nbsp; Oops! Unable to complete request, please try again later.</p>
											<div class="clearfix"></div>
										</div>';
	}
		  }
		
	 }


?>





