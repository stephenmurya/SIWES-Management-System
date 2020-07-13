<?php
date_default_timezone_set("Africa/Lagos");
$date=date("d-F-Y h:i:sa");

$con = mysqli_connect("localhost","root","","sms");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
error_reporting(0);

?>