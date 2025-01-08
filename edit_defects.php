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
$sprice = floatval($_POST['sprice']);
    $id = intval($_POST['id']);
    
    $amount = $sprice * $quantity;

$in=mysqli_query($con,"UPDATE defects set rawmaterial='$item',quantity='$quantity',sprice='$sprice',amount='$amount',date='$date' where id='$id'") or die("Failed to insert in entry  ".mysqli_error($con));

$ckeckstock=mysqli_query($con,"select * from rawmaterialstock where rawmaterial='$item'")or die(mysqli_error($con));
if(mysqli_num_rows($ckeckstock)> 0){
    mysqli_query($con,"update rawmaterialstock set qty=qty+'$prevqty' where rawmaterial='$item'")or die(mysqli_error($con));

    mysqli_query($con,"update rawmaterialstock set qty=qty-'$quantity' where rawmaterial='$item'")or die(mysqli_error($con));
}
else{
    mysqli_query($con,"update rawmaterialstock set qty=qty+'$prevqty' where rawmaterial='$previtem'")or die(mysqli_error($con));

// $in=mysqli_query($con,"INSERT INTO rawmaterialstock
// VALUES('','','$item','$quantity')")or die(mysqli_error($con));
}

//mysqli_error($con);
       
$_SESSION['message']="Data successfully Updated";
header('location:defects.php');

}





