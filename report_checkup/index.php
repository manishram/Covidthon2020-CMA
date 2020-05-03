<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
if(!isset( $_SESSION['phone']) || !isset($_POST['full_name'])|| !isset($_POST['f_or_g_name']) || !isset($_POST['gender']) || !isset($_POST['age']) || !isset($_POST['victim_phone']) || !isset($_POST['state']) || !isset($_POST['district']) || !isset($_POST['address']) || !isset($_POST['description'])){echo $_POST['victim_phone'] ;die();}
else{
	$reporter_contact=$_SESSION['phone'];
	$full_name=htmlentities(stripslashes(trim($_POST['full_name'])));
$f_or_g_name=htmlentities(stripslashes(trim($_POST['f_or_g_name'])));
$gender =htmlentities(stripslashes(trim($_POST['gender'])));
$age=htmlentities(stripslashes(trim($_POST['age'])));
$victims_phone=htmlentities(stripslashes(trim($_POST['victim_phone'])));
$state=htmlentities(stripslashes(trim($_POST['state'])));
$district=htmlentities(stripslashes(trim($_POST['district'])));
$address=htmlentities(stripslashes(trim($_POST['address'])));
$description=htmlentities(stripslashes(trim($_POST['description'])));
$time=time();
	include('../database/conn.php');
	if($full_name!="" && $f_or_g_name!="" && $gender!="" && $age!="" && $victims_phone!="" && $state!="" && $district!="" && $address!=""){
		$sql= "INSERT INTO checkup_request (name, father_or_guardian_name, gender,victim_contact, state,district,address, description, age, time, checkup_status, reporter_contact) VALUES ('$full_name','$f_or_g_name','$gender','$victims_phone','$state','$district','$address','$description','$age','$time','PENDING','$reporter_contact')";
		
		if(mysqli_query($conn,$sql)){
			echo"1";
		}else{echo"b";die();}
	}
	else{echo"a";die();}
	

}

?>