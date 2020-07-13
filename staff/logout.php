<?php
session_start();	
unset($_SESSION['sms_admin_id']);	
unset($_SESSION['sms_super_id']);	
header("location:index.php");
?>