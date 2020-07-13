<?php
include("../connect.php");
session_start();
if(isset($_POST['delete_user'])){
	mysqli_query($con,"delete from student where id='".$_POST['delete_user']."'");
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
			  $qry=mysqli_query($con,"update admin set password='".$_POST['new']."' where id='".$_SESSION['sms_admin_id']."'");
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

	if(isset($_POST['modify_student'])){
		$mat=mysqli_query($con,"select * from student where id='".$_POST['modify_student']."'");
		$stu=mysqli_fetch_assoc($mat);
		
		echo '<form role="form" method="post">
		<input type="hidden" name="student_id" value="'.$_POST['modify_student'].'" readonly>
              <div class="box-body">
			  
			  <div class="row">
			  <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Fullname</label>
<input type="email" class="form-control" value="'.ucwords($stu['firstname'].' '.$stu['lastname']).'" readonly>
                </div>
                </div>
					
					<div class="col-md-6">
				<div class="form-group">
                  <label for="exampleInputEmail1">Matric No</label>
<input type="email" class="form-control" value="'.$stu['matric_no'].'" readonly>
                </div>
                </div>
                </div>
				
				
				<div class="form-group">
                  <label for="exampleInputEmail1">Supervisor</label>
				  <select class="form-control" name="supervisor" required>';
				
				$mup=mysqli_query($con,"select * from supervisor where id ='".$stu['supervisor_id']."'");
				$sol=mysqli_fetch_assoc($mup);
				echo '<option value="'.$sol['id'].'">'.ucwords($sol['firstname'].' '.$sol['lastname']).'</option>';
				
				$muy=mysqli_query($con,"select * from supervisor where id !='".$stu['supervisor_id']."'");
				while($sun=mysqli_fetch_assoc($muy)){
					echo '<option value="'.$sun['id'].'">'.ucwords($sun['firstname'].' '.$sun['lastname']).'</option>';
				}
			
				echo '</select></div>
				
                
              </div>
              <!-- /.box-body -->
<br>
              <div class="box-footer">
                <button type="submit" class="btn btn-info" name="update_student">Update <i class="fa fa-edit"></i></button>
              </div>
            </form>';
		
		
		
	}
	 
	 
?>