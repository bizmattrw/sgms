<?php session_start();

if(isset($_POST['save']))
{
    include('dbcon.php');

    //include('functions.php');

$item=$_POST['item'];
$quantity=$_POST['quantity'];
$date=$_POST['date'];
$chk=$_POST['chk'];
for($i= 0;$i<count($chk);$i++)
{

$in=mysqli_query($con,"INSERT INTO otherincomes
VALUES('','$item[$i]','$quantity[$i]','$date','$_SESSION[username]')")or die(mysqli_error($con))or die("Failed to insert in entry  ".mysqli_error($con));
}

//mysqli_error($con);
       
$_SESSION['message']="Data Saved successfully";
header('location:otherincomes.php');

}





