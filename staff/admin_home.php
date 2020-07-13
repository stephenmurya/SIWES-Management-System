<?php
include("../connect.php");
session_start();
if(!isset($_SESSION['sms_admin_id'])){
	header("location:index.php");
}

if(isset($_POST['add'])){
	$pop=mysqli_query($con,"select * from supervisor where email='".$_POST['email']."'");
	if(mysqli_num_rows($pop)==0){
mysqli_query($con,"insert into supervisor(firstname,lastname,email,password,reg_date) values('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','12345','$date')");
			$error='<div class="alert alert-success"><p style="font-size:16px; margin-top:-14px;"><i class="fa fa-check text-success"></i> Success! Supervisor added successfully.</p></div>';
	}else{
		$error='<div class="alert alert-danger"><p style="font-size:16px; margin-top:-14px;"><i class="fa fa-warning text-yellow"></i> Oops! Supervisor with Email exist.</p></div>';
		
	}
	
}

if(isset($_GET['delete'])){
	mysqli_query($con,"delete from supervisor where id='".$_GET['delete']."'");
	$error='<div class="alert alert-success"><p style="font-size:16px; margin-top:-14px;"><i class="fa fa-check text-success"></i> Success! Supervisor deleted.</p></div>';
}
if(isset($_GET['discard'])){
	mysqli_query($con,"delete from student where supervisor_id='".$_GET['delete']."'");
	$error='<div class="alert alert-warning"><p style="font-size:16px; margin-top:-14px;"><i class="fa fa-check text-warning"></i> Success! Students truncated.</p></div>';
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SMS | Admin Home</title>
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
                        <a class="active-menu"  href="admin_home.php"><i class="fa fa-user-md fa-3x"></i> Supervisor</a>
                    </li>
                   <li>
                        <a  href="student.php"><i class="fa fa-users fa-3x"></i> Students</a>
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
                     <h2>Supervisor</h2>   
                        <h5>Welcome Admin , Love to see you back. </h5>
                       
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
                             <a href="javascript:void(0)" class="btn btn-default open_div"><i class="fa fa-plus"></i> Add Supervisor</a>
                             <a href="javascript:void(0)" class="btn btn-default close_div" style="display:none;"><i class="fa fa-times"></i> Close</a>
                        </div>
						
						
						
						
						
                        <div class="panel-body">
						
						
                        <div class="supervisor_div" style="margin-bottom:20px; border-bottom:1px solid lavender; padding-bottom:30px; display:none;">
						<form role="form" method="post">
              <div class="box-body">
			  
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
			  
			  
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
<input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter Email" required>
                </div>
				
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
<input type="text" class="form-control" name="password" id="exampleInputPassword1" value="12345" readonly>
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
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr> 
					<!-- firstname 	lastname 	username 	phone 	class 	gender 	picture 	address 	password 	date 	id -->
                                            <th>#</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Assigned students</th>
                                            <th>Reg date</th>
                                            <th>Discard Students</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $no;
									$rap=mysqli_query($con,"select * from supervisor order by firstname asc");
									while($row=mysqli_fetch_assoc($rap)){
										$rat=mysqli_query($con,"select * from student where supervisor_id='".$row['id']."' order by firstname");
										
										$no=$no+1;
										echo '<tr class="odd gradeX" id="'.$row['id'].'">
                                            <td>'.$no.'</td>
                                            <td>'.ucwords($row['firstname']).'</td>
                                            <td>'.ucfirst($row['lastname']).'</td>
                                            <td>'.$row['email'].'</td>
                                            <td>'.$row['password'].'</td>'; ?>
                                            <td> <?php while($stu=mysqli_fetch_assoc($rat)){
											echo ucwords($stu['firstname'].' '.$stu['lastname']).'<br>';
											} ?> </td>
                                          <?php  echo '<td>'.$row['reg_date'].'</td>
                                            <td class="text-center"><a href="?discard='.$row['id'].'" id="'.$row['id'].'" style="font-size:17px;" class="text-warning"><i class="fa fa-times-circle"></i></a></td>
                                            <td class="text-center"><a href="?delete='.$row['id'].'" id="'.$row['id'].'" style="font-size:17px;" class="text-danger"><i class="fa fa-times-circle"></i></a></td>
                                        </tr>';
									}
									?>
                                        
                                    </tbody>
                                </table>
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
