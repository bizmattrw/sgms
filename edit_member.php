<?php session_start();

if(isset($_POST['save']))
{
    include('dbcon.php');

    include('functions.php');

$names=mysqli_real_escape_string($con,$_POST['names']);
$phone=$_POST['phone'];
$idcard = $_POST['idcard'];
$id = $_POST['id'];

$k=mysqli_query($con,"update members set names='$names',phone='$phone',idcard='$idcard' where id='$id'");
if($k)     
$_SESSION['message']="Data successfully updated";
header('location:formattive_form.php');
}
else{
  $_SESSION['error']="Failed to update data";
  
  header('location:formattive_form.php');
}


