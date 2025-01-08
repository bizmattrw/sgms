<?php session_start();

if(isset($_POST['save']))
{
    include('dbcon.php');

    //include('functions.php');

$item=$_POST['item'];
$quantities = $_POST['quantity'];
$sprices = $_POST['sprice'];
$date=$_POST['date'];
$chk=$_POST['chk'];
for($i= 0;$i<count($chk);$i++)
{
    $quantity = (int)$quantities[$i];
    $sprice = (float)$sprices[$i];
    $amount = $quantity * $sprice;
$in=mysqli_query($con,"INSERT INTO defects
VALUES('','','$item[$i]','$quantities[$i]','$sprice','$amount','$date','$_SESSION[username]')")or die(mysqli_error($con))or die("Failed to insert in entry  ".mysqli_error($con));
$ckeckstock=mysqli_query($con,"select * from rawmaterialstock where rawmaterial='$item[$i]'")or die(mysqli_error($con));
if(mysqli_num_rows($ckeckstock)> 0){
    mysqli_query($con,"update rawmaterialstock set qty=qty-'$quantity[$i]' where rawmaterial='$item[$i]'")or die(mysqli_error($con));
}
else{
$in=mysqli_query($con,"INSERT INTO rawmaterialstock
VALUES('','','$item[$i]','$quantity[$i]')")or die(mysqli_error($con));
}
//mysqli_error($con);
       
$_SESSION['message']="Data Saved successfully";
header('location:defects.php');

}

}



