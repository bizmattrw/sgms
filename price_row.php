<?php 
	include 'dbcon.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
   
		$stmt = mysqli_query($con,"select * from prices  WHERE id='$id'")or die(mysqli_error($con));
		
		$row = mysqli_fetch_array($stmt);
		
		
		echo json_encode($row);
	}
?>