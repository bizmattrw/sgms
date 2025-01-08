<?php session_start();

if(isset($_POST['save']))
{
    include('dbcon.php');

    //include('functions.php');

$item=$_POST['item'];
$pprice=$_POST['pprice'];
$sprice=$_POST['sprice'];
$chk=$_POST['chk'];
for($i= 0;$i<count($chk);$i++)
{

$in=mysqli_query($con,"INSERT INTO prices
VALUES('','$item[$i]','$pprice[$i]','$sprice[$i]')")or die(mysqli_error($con))or die("Failed to insert in entry  ".mysqli_error($con));

}
//mysqli_error($con);
       
$_SESSION['message']="Data Saved successfully";
header('location:formattive_form.php');

}





