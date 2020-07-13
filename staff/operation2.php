<?php
include("../connect.php");
session_start();

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
			  $qry=mysqli_query($con,"update supervisor set password='".$_POST['new']."' where id='".$_SESSION['sms_super_id']."'");
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