<?php session_start();

if(isset($_POST['save']))
{
    include('dbcon.php');

    //include('functions.php');

$names=$_POST['item'];
$chk=$_POST['chk'];
for($i= 0;$i<count($chk);$i++)
{
$k=mysqli_query($con,"SELECT * FROM finalproducts WHERE rawItem='$names[$i]'");
  if(mysqli_num_rows($k)<=0)
{
$in=mysqli_query($con,"INSERT INTO finalproducts
VALUES('','$names[$i]')")or die(mysqli_error($con))or die(mysqli_error($con));
//mysqli_error($con);
       
$_SESSION['message']="Data Saved successfully";
header('location:final-items.php');

}

}


}