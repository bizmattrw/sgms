<?php 
	include 'dbcon.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$stmt = mysqli_query($con,"select * FROM defects  WHERE id='$id'");
		
		$row = mysqli_fetch_array($stmt);
		
		echo json_encode($row);
	}
?>