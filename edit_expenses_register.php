<?php session_start();

if(isset($_POST['save']))
{
    include('dbcon.php');

    //include('functions.php');

$item=$_POST['item'];
$quantity=$_POST['quantity'];
$prevqty=$_POST['prevqty'];
$previtem=$_POST['previtem'];
$date=$_POST['date'];
$id=$_POST['id'];

$in=mysqli_query($con,"UPDATE expenses_register set expense='$item',amount='$quantity',date='$date' where id='$id'") or die("Failed to insert in entry  ".mysqli_error($con));


//mysqli_error($con);
       
$_SESSION['message']="Data successfully Updated";
header('location:expenses_register.php');

}





