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
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SMS | Letter</title>
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
                        <a class="active-menu" href="letter.php"><i class="fa fa-file-text fa-3x"></i> Introduction Letter</a>
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
                     <h2 style="font-size:26px;">Introduction Letter</h2>   
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
              <div class="row">
			     
                    <div class="col-md-12 col-sm-12 col-xs-12 ">
                        <div class="" style="padding:0 15px;"> <!--student_id 	image 	to_who 	company_name 	company_address 	company_email 	company_phone 	reg_date-->
				<div class='msg'></div>
		 <?php
			   $gat=mysqli_query($con,"select * from organisation where student_id='".$_SESSION['stu_id']."'");
			   if(mysqli_num_rows($gat)>0){
			   $sup=mysqli_fetch_assoc($gat); 
			   $exp=explode(" ",$sup['reg_date']);
			   $exp_org=explode("-",$exp[0]);
			   
			   ?>
			   
	 <div class="" style="">
	<div style="margin-top:15px; margin-bottom:10px;" class="pull-righ"><a href="javascript:void(0)" onclick="window.print()" class="btn btn-default"><i class="fa fa-print"></i> Print</a></div>
	<!--to_who 	company_name 	company_address 	company_email 	company_phone-->
  <div class="imgcontainer" style="" align="center">
    <img src="images/new_logo.png" style="">
  </div>

<div style="border:6px double #0059b3; margin-top:5px; padding:0 27px; height:;">

<center><div style="background-color:#80bfff; width:250px; border:3px solid #80bfff; height:; padding:4px;">
<p style="font-family:calibri; font-size:15px; margin-top:-20px; margin-bottom:1px;">Office of the Head of Department </p></div></center>

<div class="pull-right" style="">
<p style="font-family:Times New Roman; font-size:15px;">
The SIWES Coordinator<br>
ISCOM University<br>
Cotonou, Benin<br>
<?php echo $exp_org[1].' '.$exp_org[0].', '.$exp_org[2];?><br>
</p>

</div>

<div style="margin-top:100px;">
<p style="font-family:Times New Roman; font-size:15px;">
<?php echo $sup['to_who'];?> <br>
<?php echo $sup['company_name']; ?><br>
<?php echo $sup['company_address']; ?>

</p>
</div>
<br>
<div style="text-align:center;"><u style="font-family:Times New Roman; text-align:center; font-size:16px; color:black;">LETTER OF INTRODUCTION FOR THE PURPOSE OF STUDENT INDUSTRIAL <br>
WORK EXPERIENCE SCHEME (SIWES)
</u></div>
<br>
<p style="text-align:justify; font-family:Times New Roman; font-size:16px; color:black;">I hereby confirm that <b><?php echo ucwords($me['firstname'].' '.$me['lastname']) ?></b> is a student of ISCOM University, currently studying for the award of BSc. 
degree in Computer Science. According to the policy of Nigerian University Commission (NUC), 
all undergraduate students of Computer Science are required to undergo SIWES in a reputable establishment like yours. 
 This is expected to give the students the opportunity to acquire practical skills of IT, identify local IT needs and to help establishments by providing IT supports.</p>
 
 
<p style="text-align:justify; font-family:Times New Roman; font-size:16px; color:black;">The student seeks your permission to undertake his/her SIWES in your establishment.  
I am very happy to support his/her request because I am convinced that he/she will be useful for your establishment and will also learn new things from your establishment.
 The student is expected to spend 4 weeks with you and will be required to submit a report to ISCOM University upon the completion of the SIWES.
 He will need your help to sign his log book and will also need a letter of SIWES completion from you upon the completion of the programme.</p>

 
<p style="text-align:justify; font-family:Times New Roman; font-size:16px; color:black;">I will be happy if you can please grant his/her request. </p>

<p style="text-align:justify; font-family:Times New Roman; font-size:16px; color:black;">Please do not hesitate to contact me for further information about SIWES or about the student.</p>


<div style="margin-top:40px;">
<p style="font-family:Times New Roman; font-weight:bold; color:black; font-size:16px;">
<?php echo ucwords($adm['firstname'].' '.$adm['lastname']); ?><br>
SIWES Coordinator<br>
ISCOM University, Cotonou, Benin<br>
<?php echo $adm['email']; ?>
</p>
</div>

</div>

  </div>
			   
			   
			   
			   
			   
			  <?php }else{
				   ECHO '		
				   <H2 style="text-align:center; font-size:22px; color:black;">Registration form</H2><br><br>
				   <form role="form" id="formupload" method="post" enctype="multipart/form-data">
				   <input type="hidden" name="introduction_letter" value="introduction_letter">
                </div>
              <div class="box-body">	  
			  <div class="row">
			  <div class="col-md-6">
			  <div class="form-group">
                  <label for="exampleInputEmail1">Directing the letter to</label>
<input type="text" class="form-control" id="exampleInputEmail1" name="to_who" placeholder="Enter who the letter is to be directed to" required>
                </div>
                </div>
				
				 <div class="col-md-6">
				 <div class="form-group">
                  <label for="exampleInputEmail1">Department</label>
<input type="text" class="form-control" id="exampleInputEmail1" name="company_name" placeholder="Enter Department name" required>
                </div>
                </div>
                </div>
			  
			 
			  <div class="form-group">
                  <label for="exampleInputEmail1">Organisation Office Address</label>
<input type="text" class="form-control" id="exampleInputEmail1" name="company_address" placeholder="Enter Organisation Office Address" required>
                </div>
               
			    <div class="row">
			  <div class="col-md-6">
			  <div class="form-group">
                  <label for="exampleInputEmail1">Organisation Email</label>
<input type="email" class="form-control" id="exampleInputEmail1" name="company_email" placeholder="Enter Organisation Email Address" required>
                </div>
                </div>
				
				 <div class="col-md-6">
				 <div class="form-group">
                  <label for="exampleInputEmail1">Organisation Phone No</label>
<input type="text" class="form-control" id="exampleInputEmail1" name="company_phone" placeholder="Enter Organisation Phone No" required>
                </div>
                </div>
                </div>
			   
			   
			   

				 <div class="form-group">
                  <label for="exampleInputEmail1">Upload Picture</label>
<input type="file" id="exampleInputEmail1" name="attachment" required>
                </div>		
			  
				
				
              </div>
              <!-- /.box-body -->
<br>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right" name="register">Register &nbsp;<i class="fa fa-sign-in"></i></button>
              </div>
            </form>';
			   }
			   ?>
		  
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
