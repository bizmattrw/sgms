<?php session_start();

if(isset($_POST['save']))
{
    include('dbcon.php');

    include('functions.php');

$finalproduct=$_POST['finalproduct'];
$package = $_POST['package'];
$pprice = $_POST['pprice'];
$sprice = $_POST['sprice'];
$chk = $_POST['chk'];
    for ($i = 0; $i < count($chk);$i++)
    {
$k=mysqli_query($con,"SELECT * FROM packages WHERE package='$package[$i]'");
  if(mysqli_num_rows($k)<=0)
{
$in=mysqli_query($con,"INSERT INTO packages (finalproduct,package,pprice,sprice) VALUES('$finalproduct[$i]','$package[$i]','$pprice[$i]','$sprice[$i]')")or die(mysqli_error($con))or die(mysqli_error($con));
$_SESSION['message']="Data Saved Successuly";
header("packages.php");
} 
else{
    $_SESSION['error']="data already exists";
    header('location:packages.php');
  }
}
if($in){ $_SESSION['message']="Data Saved successfully";
header('location:packages.php');
}

}
