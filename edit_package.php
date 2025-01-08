<?php session_start();

if(isset($_POST['save']))
{
    include('dbcon.php');



$finalproduct=$_POST['finalproduct'];
$package = $_POST['package'];
$pprice = $_POST['pprice'];
$sprice = $_POST['sprice'];
$id = $_POST['id'];

$in=mysqli_query($con,"update packages SET finalproduct='$finalproduct',package='$package',pprice='$pprice',sprice='$sprice'  WHERE id='$id' ")or die(mysqli_error($con))or die(mysqli_error($con));
$_SESSION['message']="Data updated Successuly";
header("location:packages.php");
} 


