
<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
if(isset( $_SESSION['phone'])){unset($_SESSION['phone']);}

if(isset($_POST['phone']) && isset($_POST['pass'])){
	$phone= htmlentities(stripslashes(trim($_POST['phone'])));
	$pass= md5(htmlentities(stripslashes(trim($_POST['pass']))));
	
	include('../../database/conn.php');
	
	$sql="SELECT* FROM public_app_users WHERE phone='$phone' AND password='$pass'";
	$sql_query=mysqli_query($conn,$sql);
	$count_rows=mysqli_num_rows($sql_query);
	if($count_rows==1){
		$_SESSION['phone']=$phone;
		echo"1";
	}else{echo"0";die();}
}else{echo"0";die();}
?>