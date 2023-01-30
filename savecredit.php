<?php session_start();

if(isset($_POST['save']))
{
    include('dbcon.php');

    include('functions.php');

$names=$_POST['names'];
$amount = $_POST['amount'];
$date = $_POST['date'];
  $rate = $_POST['rate'];

$chk = $_POST['chk'];
    for ($i = 0; $i < count($chk);$i++)
    {
$k=mysqli_query($con,"SELECT * FROM credits WHERE pin='$names[$i]' and date='$date'");
  if(mysqli_num_rows($k)<=0)
{
      $interest = $amount[$i] * $rate[$i] / 100;
      $total = $amount[$i] + $interest;
$in=mysqli_query($con,"INSERT INTO credits (id, pin,date,amount,interest,total) VALUES(NULL,'$names[$i]','$date','$amount[$i]','$interest','$total')")or die(mysqli_error($con))or die(mysqli_error($con));
//mysqli_error($con);
} 
else{
    $_SESSION['error']="data already exists";
    header('location:credits.php');
  }
}
if($in){ $_SESSION['message']="Data Saved successfully";
header('location:credits.php');
}

}
