<?php
include("../connect.php");
session_start();
if(!isset($_SESSION['sms_admin_id'])){
	header("location:index.php");
}

if(isset($_POST['add'])){
	$pop=mysqli_query($con,"select * from student where matric_no='".$_POST['matric_no']."'");
	if(mysqli_num_rows($pop)==0){
mysqli_query($con,"insert into student(firstname,lastname,matric_no,level,password,supervisor_id,reg_date) 
values('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['matric_no']."','".$_POST['level']."','12345','".$_POST['supervisor']."','$date')");
			$error='<div class="alert alert-success"><p style="font-size:16px; margin-top:-14px;"><i class="fa fa-check text-success"></i> Success! Student added successfully.</p></div>';
	}else{
		$error='<div class="alert alert-danger"><p style="font-size:16px; margin-top:-14px;"><i class="fa fa-warning text-yellow"></i> Oops! Student with Matric No exist.</p></div>';
		
	}
	
}

if(isset($_GET['delete'])){
	mysqli_query($con,"delete from student where id='".$_GET['delete']."'");
	$error='<div class="alert alert-success"><p style="font-size:16px; margin-top:-14px;"><i class="fa fa-check text-success"></i> Success! Student deleted.</p></div>';
}
if(isset($_POST['update_student'])){
	mysqli_query($con,"update student set supervisor_id='".$_POST['supervisor']."' where id='".$_POST['student_id']."'");
	$error='<div class="alert alert-warning"><p style="font-size:16px; margin-top:-14px;"><i class="fa fa-check text-warning"></i> Success! Students info updated .</p></div>';
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SMS | Students</title>
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
                        <a class="active-menu"  href="student.php"><i class="fa fa-users fa-3x"></i> Students</a>
                    </li>
						   <li>
                        <a  href="profile.php"><i class="fa fa-user fa-3x"></i> Profile</a>
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
                     <h2>Students</h2>   
                        
                       
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
                             <a href="javascript:void(0)" class="btn btn-default open_div"><i class="fa fa-plus"></i> Add New Student</a>
                             <a href="javascript:void(0)" class="btn btn-default close_div" style="display:none;"><i class="fa fa-times"></i> Close</a>
                        </div>
						
						
						
						
						
                        <div class="panel-body">
						
						
                        <div class="supervisor_div" style="margin-bottom:20px; border-bottom:1px solid lavender; padding-bottom:30px; display:none;">
						<form role="form" method="post">
              <div class="box-body">
	<!--id 	firstname 	lastname 	matric_no 	level 	department 	password 	supervisor_id 	reg_date -->		  
			  <div class="row">
			  <div class="col-md-6">
			  <div class="form-group">
                  <label for="exampleInputEmail1">Firstname</label>
<input type="text" class="form-control" id="exampleInputEmail1" name="firstname" placeholder="Enter Firstname" required>
                </div>
                </div>
				
				 <div class="col-md-6">
				 <div class="form-group">
                  <label for="exampleInputEmail1">Lastname</label>
<input type="text" class="form-control" id="exampleInputEmail1" name="lastname" placeholder="Enter Lastname" required>
                </div>
                </div>
                </div>
			  
			  <div class="row">
			  <div class="col-md-6">
			  <div class="form-group">
                  <label for="exampleInputEmail1">Matric No</label>
<input type="text" class="form-control" id="exampleInputEmail1" name="matric_no" placeholder="Enter Matric No" required>
                </div>
                </div>
				
				 <div class="col-md-6">
				 <div class="form-group">
                  <label for="exampleInputEmail1">Level</label>
<select class="form-control" id="exampleInputEmail1" name="level" required>
<option value="">--Select Level--</option>
<option value="100l">100L</option>
<option value="200l">200L</option>
<option value="300l">300L</option>
<option value="400l">400L</option>
<option value="500l">500L</option>
<option value="600l">600L</option>
<option value="700l">700L</option>
</select>
                </div>
                </div>
                </div>
		
<div class="row">
			  <div class="col-md-6">
			 <div class="form-group">
                <label for="exampleInputEmail1">Supervisor</label>
				<select class="form-control" name="supervisor">
				<option value="">--Select Supervisor--</option>
				<?php
				$muy=mysqli_query($con,"select * from supervisor order by firstname asc");
				while($sun=mysqli_fetch_assoc($muy)){
					echo '<option value="'.$sun['id'].'">'.ucwords($sun['firstname'].' '.$sun['lastname']).'</option>';
				}
				?>
				</select>
                </div>
                </div>
				
				 <div class="col-md-6">
				 <div class="form-group">
                  <label for="exampleInputEmail1">Default Password</label>
<input type="text" class="form-control" id="exampleInputEmail1" name="password" value="12345" readonly>
                </div>
                </div>
                </div>		
			  
				
				
              </div>
              <!-- /.box-body -->
<br>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="add">Add &nbsp;<i class="fa fa-plus-square"></i></button>
              </div>
            </form>
			</div>
			
			
						
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" style="">
                                    <thead>
                                        <tr> 
					<!--id 	firstname 	lastname 	matric_no 	level 	department 	password 	supervisor_id 	reg_date -->	
                                            <th>#</th>
                                            <th>Fullname</th>
                                            <th>Matric No</th>
                                            <th>Level</th>
                                            <th>Department</th>
                                            <th>Password</th>
                                            <th>Supervisor</th>
                                            <th>Reg date</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <!--<th>Letter</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $no;
									$rap=mysqli_query($con,"select * from student order by firstname asc");
									while($row=mysqli_fetch_assoc($rap)){
										$rat=mysqli_query($con,"select * from supervisor where id='".$row['supervisor_id']."'");
										$sp=mysqli_fetch_assoc($rat);
										
										$no=$no+1;
										echo '<tr class="odd gradeX" id="'.$row['id'].'">
                                            <td>'.$no.'</td>
                                            <td>'.ucwords($row['firstname'].' '.$row['lastname']).'</td>
                                            <td>'.$row['matric_no'].'</td>
                                            <td>'.$row['level'].'</td>
                                            <td>'.ucfirst($row['department']).'</td>
                                            <td>'.$row['password'].'</td> 
                                            <td>'.ucwords($sp['firstname'].' '.$sp['lastname']).'</td> 
											<td>'.$row['reg_date'].'</td>
                                            <td class="text-center"><a href="javascript:void(0)" id="'.$row['id'].'" data-toggle="modal" data-target="#myModal" style="font-size:17px;" class="text-success modify"><i class="fa fa-edit"></i></a></td>
                                            <td class="text-center"><a href="?delete='.$row['id'].'" id="'.$row['id'].'" style="font-size:17px;" class="text-danger"><i class="fa fa-times-circle"></i></a></td>
                                        </tr>';
									} //<td class="text-center"><a href="letter.php?sid='.$row['id'].'" style="font-size:17px;" class="text-primary"><i class="fa fa-file-text"></i></a></td>
									?>
                                        
                                    </tbody>
                                </table>
                            </div>
							<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Modify Student Info</h4>
                                        </div>
                                        <div class="result" style="padding:20px;"></div>
                                    </div>
                                </div>
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
		  
		  
		$("a.modify").click(function(){
	var modify_student=$(this).attr("id");
		$.ajax({
						type: "POST",
                        url: "operation.php",
                        data: ({modify_student:modify_student}),
                        cache: false,
                        success: function(data){ 
							$("div.result").html(data);
						 } 
 });
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
