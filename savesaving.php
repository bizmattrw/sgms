<?php session_start();

if(isset($_POST['save']))
{
    include('dbcon.php');

    include('functions.php');

$names=$_POST['names'];
$amount = $_POST['amount'];
$date = $_POST['date'];
$chk = $_POST['chk'];
    for ($i = 0; $i < count($chk);$i++)
    {
$k=mysqli_query($con,"SELECT * FROM saving WHERE pin='$names[$i]' and date='$date'");
  if(mysqli_num_rows($k)<=0)
{
$in=mysqli_query($con,"INSERT INTO saving (id, pin,date,saving) VALUES(NULL,'$names[$i]','$date','$amount[$i]')")or die(mysqli_error($con))or die(mysqli_error($con));
//mysqli_error($con);
} 
else{
    $_SESSION['error']="data already exists";
    header('location:saving.php');
  }
}
if($in){ $_SESSION['message']="Data Saved successfully";
header('location:saving.php');
}

}
