<?php session_start();

if(isset($_POST['save']))
{
    include('dbcon.php');

   

$names=mysqli_real_escape_string($con,$_POST['names']);
$phone=$_POST['phone'];
$amount = $_POST['amount'];
$id = $_POST['id'];

$k=mysqli_query($con,"update saving set saving='$amount' where id='$id'");
if($k)     
$_SESSION['message']="Savings successfully updated";
header('location:saving.php');
}
else{
  $_SESSION['error']="Failed to update data";
  
  header('location:saving.php');
}


