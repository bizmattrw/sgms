<?php 
include'dbcon.php';
// fetch records
$date1=$_GET['date1'];
$date2=$_GET['date2'];

$sql = "select package,sum(quantity) as qty from packagesentry where date>='$date1' and date<='$date2' group by package";
$result = mysqli_query($con, $sql)or die(mysqli_error($con));
$data = array();
$i=1;
while($row = mysqli_fetch_array($result)) {
//$id=$row['id'];
$rawmaterial=$row['package'];
$quer2=mysqli_query($con,"select sum(quantity) as qty2,package from packagesexit where package='$rawmaterial'  AND status='Approved'")or die(mysqli_error($con));
$row2=mysqli_fetch_array($quer2);

 $exitqty=$row2['qty2'];
        $balance=$row['qty']-$row2["qty2"];
        if($exitqty=="") { $exitqty=0;}
        $rawmaterialexit=$row2['package'];
        $linkentry="<a href='rawentrydetails.php?rawmaterial=$rawmaterial&&date1=$date1&&date2=$date2'>$row[qty]</a>";
        $linkexit="<a href='rawexitdetails.php?rawmaterial=$rawmaterialexit&&date1=$date1&&date2=$date2'>$row2[qty2]</a>";
        if($exitqty==""){$linkexit=0;}
	   $sub_array   = array();
	        $sub_array[]=$i;

	        $sub_array[] =$row['package'];
			$sub_array[] =$linkentry;
    	  
			$sub_array[] =$linkexit;
			$sub_array[] =$balance;
             /*
			$sub_array[] =$row['asigaye'];
			$sub_array[] =$row['type'];
			$sub_array[] =$row['owner'];
			$sub_array[] =$row['datetopay'];
				*/
				$data[] = $sub_array;
                $i++;

}

$dataset = array(
    "echo" => 1,
    "totalrecords" => count($data),
    "totaldisplayrecords" => count($data),
    "data" => $data
);

echo json_encode($dataset);
?>