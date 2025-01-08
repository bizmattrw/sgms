<?php session_start();

if(isset($_POST['save']))
{
    include('dbcon.php');

    include('functions.php');

$names=mysqli_real_escape_string($con,$_POST['names']);

$id = $_POST['id'];

$k=mysqli_query($con,"update finalproducts set rawItem='$names' WHERE id='$id'") or die(mysqli_error($con));
       
$_SESSION['message']="Data Updated successfully";
header('location:final-items.php');
}
