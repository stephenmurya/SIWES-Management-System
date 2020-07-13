<?php
include("../connect.php");
if(isset($_POST['submit'])){
$category=$_POST['category'];
$pes=mysqli_query($con,"select * from $category where email='".$_POST['email']."' AND password='".$_POST['password']."'");
if(mysqli_num_rows($pes)>0){
$row=mysqli_fetch_array($pes);
session_start();
if($_POST['category']=='admin'){
$_SESSION['sms_category']=$row['firstname'];	
$_SESSION['sms_admin_firstname']=$row['firstname'];	
$_SESSION['sms_admin_lastname']=$row['lastname'];	
$_SESSION['sms_admin_id']=$row['id'];	
$_SESSION['sms_admin_email']=$row['email'];		
header("location:admin_home.php");

}else{
$_SESSION['sms_super_firstname']=$row['firstname'];	
$_SESSION['sms_super_lastname']=$row['lastname'];	
$_SESSION['sms_super_id']=$row['id'];	
$_SESSION['sms_super_email']=$row['email'];	
header("location:supervisor_home.php");
}
	

}else{
	$error='<div class="alert alert-danger"><p style="font-size:16px; margin-top:-14px;"><i class="fa fa-warning text-yellow"></i> Oops! Incorrect email or Password.</p></div>';
}	
	
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SMS | STAFF Login</title>
	<!-- BOOTSTRAP STYLES-->
	   <link rel="shortcut icon" href="../logo2.png">
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper" >
 <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom:0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Staff</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
text-align:center;
font-size: 27px;"> Siwes Management System</div>
        </nav>   
        <!-- /. NAV SIDE  -->
            <div id="page-inner" >
              
			   <div class="row" style="">
			   <div class="col-md-4"></div>
			   <div class="col-md-4">
			   <div align="center"><?php echo $error;?></div>
			   <div style="border:1px solid #a6a6a6; padding:15px; margin-top:70px; box-shadow:10px 10px 2px gray;">
            <div class="box-header with-border">
              <h3 class="box-title text-center" style="color:#ff1a1a; font-family:Buxton Sketch; font-size:30px;">Staff Login Portal</h3>
            </div><br>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
<input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter Email" required>
                </div>
				
				  <div class="form-group">
                  <label for="exampleInputEmail1">Category</label>
						<select name="category" class="form-control" required>
						<option value="">--Select Category--</option>
						<option value="admin">Administrator</option>
						<option value="supervisor">Supervisor</option>
						</select>
                </div>
				
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
<input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder=" Enter Password" required>
                </div>
                
               
              </div>
              <!-- /.box-body -->
<br>
              <div class="box-footer">
                <button type="submit" class="btn btn-danger" name="submit">Login <i class="fa fa-sign-in"></i></button>
              </div>
            </form>
			    </div>
			    </div>
				<div class="col-md-4"></div>
			    </div>
			   
             <!-- /. PAGE INNER  -->
            </div>
			
            </div>
       
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
