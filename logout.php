<?php
session_start();	
unset($_SESSION['stu_matric']);	
unset($_SESSION['stu_id']);	
header("location:index.php");	
?>