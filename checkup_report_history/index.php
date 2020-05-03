
<?php
if (session_status() == PHP_SESSION_NONE) {session_start();}
if(!isset( $_SESSION['phone'])){echo"0";die();}
else{
	if($_SESSION['phone']==""){echo"0";die();}
	else{
		$phone=$_SESSION['phone'];
		
		include('../database/conn.php');
		
        $sql1 = "SELECT*FROM checkup_request WHERE reporter_contact='$phone'";
	    $query=mysqli_query($conn,$sql1);
		$count_checkup_request=mysqli_num_rows($query);
		if($count_checkup_request==0){echo"<center><br><font>No request submitted yet</font></center>";}
		else{
		echo'<section class="mdl-grid" id="my-table">
  <div class="mdl-layout-spacer"></div>
  <div class="mdl-cell mdl-cell--6-col-tablet mdl-cell--10-col-desktop mdl-cell--stretch">

    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
      <thead>
        <tr>
          <th>Name</th>
          <th>Date</th>
          <th>Status</th>
          
        </tr>
      </thead>
      <tbody>';
	  
		while($row = mysqli_fetch_array($query)){
		echo"<tr>
          <td>$row[name]</td>
          <td>$row[time]</td>
          <td>$row[checkup_status]</td>
         
        </tr>";	
		}
		echo'</tbody>
    </table>
    <br>
  </div>
  <div class="mdl-layout-spacer"></div>
</section> ';
		}
			
}
}
?>




        
        
      