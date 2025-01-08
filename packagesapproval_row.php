<?php 
	include 'dbcon.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$stmt = mysqli_query($con,"select * from packagesexit  WHERE id='$id'");
		
		$row = mysqli_fetch_array($stmt);
		
		
		echo json_encode($row);
	}
?>