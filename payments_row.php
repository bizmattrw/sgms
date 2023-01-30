<?php 
	include 'dbcon.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$stmt = mysqli_query($con,"select s.date,s.id,m.names,m.idcard,m.phone,s.amount from members m,payments s  WHERE s.id='$id'");
		
		$row = mysqli_fetch_array($stmt);
		
		
		echo json_encode($row);
	}
?>