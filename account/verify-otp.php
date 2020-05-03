<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
if(!isset( $_SESSION['phone']) || !isset($_POST['otp']) || $_POST['otp']==""){echo"0";die();}
else{
	if($_SESSION['phone']==""){echo"0";die();}
	else{
		$phone=$_SESSION['phone'];
		$otp= htmlentities(stripslashes(trim($_POST['otp'])));
		include('../database/conn.php');

$otp_sql= "select*from public_app_users where phone='$phone' AND otp='$otp'";
$query_otp=mysqli_query($conn,$otp_sql);
$no_of_rows=mysqli_num_rows($query_otp);

if($no_of_rows==1){
		$sql1 = "UPDATE public_app_users SET otp_confirmed=1 WHERE phone='$phone' AND otp='$otp' AND wrong_otp_times<=5";	
	    if(mysqli_query($conn,$sql1)){echo"1";}else{echo"0";die();}
		
	
}else{
	     $sql2 = "UPDATE public_app_users SET wrong_otp_times=wrong_otp_times+1  WHERE phone='$phone'";	
	    if(mysqli_query($conn,$sql2)){echo"0";die();}
	
	echo"0";die();}
	}
}
?>