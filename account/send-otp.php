<?php
if(!(isset($_POST['phone']))){echo"0"; die();}
else{
	if($_POST['phone']==""){echo"0";die();}
	else{
include('../database/conn.php');

$phone = htmlentities(stripslashes(trim($_POST['phone'])));
$check_phone_pattern=preg_match('/^\d{10}$/',$phone);
	
	if($check_phone_pattern){
			$phone_check_query = "select*from public_app_users where phone='$phone' ";
$query_phone=mysqli_query($conn,$phone_check_query);
$count_phone_row=mysqli_num_rows($query_phone);
$otp=rand(10000000,99999999);
$time_created=time();
if($count_phone_row==0){
	
	$sql = "INSERT INTO public_app_users (phone,created,otp) values('$phone','$time_created','$otp')";	
if(mysqli_query($conn,$sql)){
	//send otp to phone
	echo "1";
}else{echo"0";}
}

else{
	$sql1 = "UPDATE public_app_users SET otp='$otp' WHERE phone='$phone'";	
	$sql2 = "UPDATE public_app_users SET created='$time_created' WHERE phone='$phone'";	
	$sql3 = "UPDATE public_app_users SET wrong_otp_times=0 WHERE phone='$phone'";	
	
	$query1= mysqli_query($conn,$sql1);
	$query2= mysqli_query($conn,$sql2);
	$query3= mysqli_query($conn,$sql3);
	
if($query1 && $query2 && $query3){
	
	//send otp to phone
	
	echo "1";
}else{echo "0";}
}


if(isset( $_SESSION['phone'])){session_destroy();}
    session_start();
	$_SESSION['phone']=$phone;


}else{echo"0";die();}
}
}


?>