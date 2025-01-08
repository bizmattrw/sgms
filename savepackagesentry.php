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
$query=mysqli_query($con,"SELECT sprice from packages where package='$item[$i]'");
$row=mysqli_fetch_array($query);
$sprice=$row["sprice"];
$in=mysqli_query($con,"INSERT INTO packagesentry
VALUES('','','$item[$i]','$quantity[$i]','$date','$_SESSION[username]')")or die(mysqli_error($con))or die("Failed to insert in entry  ".mysqli_error($con));
$ckeckstock=mysqli_query($con,"select * from packagesstock where package='$item[$i]'")or die(mysqli_error($con));
if(mysqli_num_rows($ckeckstock)> 0){
    mysqli_query($con,"update packagesstock set qty=qty+'$quantity[$i]' where package='$item[$i]'")or die(mysqli_error($con));
}
else{
$in=mysqli_query($con,"INSERT INTO packagesstock
VALUES('','','$item[$i]','$quantity[$i]','$sprice')")or die(mysqli_error($con));
}
//mysqli_error($con);
       
$_SESSION['message']="Data Saved successfully";
header('location:packagesentry.php');

}

}



