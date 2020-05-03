<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
if(!isset( $_SESSION['phone']) || !isset($_POST['name']) || $_POST['name']=="" || !isset($_POST['pass']) || $_POST['pass']==""){echo"0";die();}
else{
	if($_SESSION['phone']==""){echo"0";die();}
	else{
		$phone=$_SESSION['phone'];
		$name= htmlentities(stripslashes(trim($_POST['name'])));
		$pass= md5(htmlentities(stripslashes(trim($_POST['pass']))));
		include('../database/conn.php');


		$sql1 = "UPDATE public_app_users SET full_name='$name' WHERE phone='$phone'";	
		$sql2 = "UPDATE public_app_users SET password='$pass' WHERE phone='$phone'";	
	    if(mysqli_query($conn,$sql1) && mysqli_query($conn,$sql2)){
			
			
			echo"1";}else{echo "0";die();}
	}
}
?>