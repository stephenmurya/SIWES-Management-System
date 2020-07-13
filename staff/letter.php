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

if(isset($_GET['discard'])){
	mysqli_query($con,"delete from organisation where id='".$_GET['discard']."'");
	$error='<div class="alert alert-success"><p style="font-size:16px; margin-top:-14px;"><i class="fa fa-check text-success"></i> Success! Letter deleted.</p></div>';
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SMS | Offer Letter</title>
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
                        <a class="active-menu" href="letter.php"><i class="fa fa-file-text fa-3x"></i> Letter</a>
                    </li>
					<li>
                        <a  href="log.php"><i class="fa fa-book fa-3x"></i> Log-book</a>
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
					<h2>Introduction Letter</h2>
                      
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
                             
                        </div>
						      <div class="panel-body">
<div class="col-md-3">
<h6 class="mb-10 pl-15" style="font-weight:bold; font-size:20px; color:;">Students</h6>
															<ul class="folder-list mb-30" style="height:500px; overflow-y:auto; border-right:1px solid lavender;">
															<?php
															$rap=mysqli_query($con,"select * from student where supervisor_id='".$_SESSION['sms_super_id']."' order by firstname asc");
									while($row=mysqli_fetch_assoc($rap)){
										echo '<li style=""><a href="?sid='.$row['id'].'" class="nav" style="font-size:16px; color:black; padding-left:8px;"><i class="fa fa-user"></i> '.ucwords($row['firstname'].' '.$row['lastname'].' - '.$row['matric_no']).'</a></li>';
									}
															
															?>
															</ul>
</div>
<div class="col-md-9">
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

	 <div class="" style="">
	 <div style="margin-top:15px; margin-bottom:20px;" class="pull-right"><a href="?discard=<?php echo $sut['id']; ?>" class="btn btn-danger"><i class="fa fa-times-circle"></i> Discard Letter</a></div>
  <div class="imgcontainer" style="margin-left:25px;">
    <img src="../images/new_logo.png">
  </div>
  
  <!--<table><tr><td rowspan="2"><div class="imgcontaine" style="margin-left:25px;">
    <img src="images/lasu_icon.jpg" width="100">
  </div></td>
  <td width="620px" style=" padding:0 15px;"><div class="text-center head" style="margin-bottom:-2%; margin-top:-3%;">
  <h1 style="font-weight:900; font-family:Arial Black; font-size:40px;">ISCOM University<h1></div>

<h1 style="color:dodgerblue; font-weight:600; font-family:Elephant; font-size:25px; text-align:center; margin-bottom:-2%;">Faculty of Sciences</h1>
<h1 style="color:black font-family:Bookman Old; font-size:22px; text-align:center;">Department of Computer Sciences</h1>
<p style="text-align:center; font-family:Calibri; font-size:15px;"><small>P.M.B. 0001 LASU, ISCOM, Nigeria. Tel: 01-4548199 Website: <font color="blue">www.lasu.edu.ng</font><br>
e-mail: Computer.Science@lasu.edu.ng
</small></p>
  </td></tr>
</table> -->

<div style="border:6px double #0059b3; margin-top:5px; padding:0 27px; height:;">

<center><div style="background-color:#80bfff; width:250px; border:3px solid #efefef; height:; padding:4px;">
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
<?php echo $org['to_who'];?> <br>
<?php echo $org['company_name']; ?><br>
<?php echo $org['company_address']; ?>

</p>
</div>
<br>
<div style="text-align:center;"><u style="font-family:Times New Roman; text-align:center; font-size:16px; color:black;">LETTER OF INTRODUCTION FOR THE PURPOSE OF STUDENT INDUSTRIAL <br>
WORK EXPERIENCE SCHEME (SIWES)
</u></div>
<br>
<p style="text-align:justify; font-family:Times New Roman; font-size:16px; color:black;">I hereby confirm that <b><?php echo ucwords($sut['firstname'].' '.$sut['lastname']) ?></b> is a student of ISCOM University, currently studying for the award of BSc. 
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
