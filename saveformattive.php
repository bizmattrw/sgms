<?php session_start();

if(isset($_POST['save']))
{
    include('dbcon.php');

    include('functions.php');

$names=mysqli_real_escape_string($con,$_POST['names']);
$phone=$_POST['phone'];
$idcard = $_POST['idcard'];

$k=mysqli_query($con,"SELECT * FROM members WHERE idcard='$idcard'");
  if(mysqli_num_rows($k)<=0)
{
$in=mysqli_query($con,"INSERT INTO members (id, names,idcard,phone) VALUES(NULL,'$names','$idcard','$phone')")or die(mysqli_error($con))or die(mysqli_error($con));
//mysqli_error($con);
       
$_SESSION['message']="Data Saved successfully";
header('location:formattive_form.php');
}
else{
  $_SESSION['error']="Member already exists";
  header('location:formattive_form.php');
}

}
