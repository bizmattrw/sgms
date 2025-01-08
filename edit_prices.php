<?php session_start();

if(isset($_POST['save']))
{
    include('dbcon.php');



$item=$_POST['item'];
$pprice = $_POST['pprice'];
$sprice = $_POST['sprice'];
$id = $_POST['id'];

$in=mysqli_query($con,"update prices SET item='$item',pprice='$pprice',sprice='$sprice'  WHERE id='$id' ")or die(mysqli_error($con))or die(mysqli_error($con));
$_SESSION['message']="Data updated Successuly";
header("location:formattive_form.php");
} 


