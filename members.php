<?php
	include 'includes/session.php';
	if(isset($_POST['pdf'])){
		//$ex = explode(' - ', $_POST['date_range']);
		$from = $_POST['date1'];
		$to = $_POST['date2'];
		$from_title = $_POST['date1'];
		$to_title = $_POST['date2'];
 require_once 'pdf.php';
 include('database_connection.php');
 include('dbcon.php');
 $output = '';
 $output.='<h2>SALES PAID REPORT';
 $output.=' <table width=100% border=1 cellpadding=5 cellspacing=0>
    <tr>
     <td colspan="6" align="center" style="font-size:18px"><b>'.$from_title." - ".$to_title.'</b></td>
    </tr>
	                  <tr><th>No</th>
                  <th>Date</th>
                  <th>Buyer Name</th>
                  <th>Address</th>
                  <th>Amount</th>
				  <th>Payment Mode</th>
				  </tr>

	';
 $statement = mysqli_query($con,"select * from tbl_order where order_date BETWEEN '$from' AND '$to' and pmode='Cash' ORDER BY order_date DESC");
 $i=0;
 $tottax=0;
 $totnotax=0;
 $totall=0;
 				  while($row=mysqli_fetch_array($statement))
                    {
					
					$i++;
                    $date=$row['order_date'];
					$name=$row['order_receiver_name'];
					$address=$row['address'];
					$notax=$row['order_total_before_tax'];
					$pmode=$row['pmode'];
					$totall+=$notax;
				
					
					$notaxf=number_format($notax);
				$output.='<tr><td>'.$i.'</td><td>'.$date.'</td><td>'.$name.'</td><td>'.$address.'</td><td>'.$notaxf.'</td><td>'.$pmode.'</td>
				</tr>';
					
					}
					$totnotaxf=number_format($totnotax);
					$tottaxf=number_format($tottax);
					$totallf=number_format($totall);
					$output.='<tr><th colspan=4>TOTAL</th><th>'.$totallf.'</th><td></td></tr>';
					  $output .= '
      </table>

  ';

  $pdf = new Pdf();
 $file_name = 'Sales-.pdf';
 $pdf->loadHtml($output);
 $pdf->render();
 $pdf->stream($file_name, array("Attachment" => false));
}

	if(isset($_POST['excel'])){
		//$ex = explode(' - ', $_POST['date_range']);
		$from = $_POST['date1'];
		$to = $_POST['date2'];
		$from_title = $_POST['date1'];
		$to_title = $_POST['date2'];
 require_once 'pdf.php';
 include('database_connection.php');
 include('dbcon.php');
   header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=PAID-SALES.xls");

 $output = '';
 $output.='<h2>SALES PAID REPORT';
 $output.=' <table width=100% border=1 cellpadding=5 cellspacing=0>
    <tr>
     <td colspan="6" align="center" style="font-size:18px"><b>'.$from_title." - ".$to_title.'</b></td>
    </tr>
	                  <tr><th>No</th>
                  <th>Date</th>
                  <th>Buyer Name</th>
                  <th>Address</th>
                  <th>Amount</th>
				  <th>Payment Mode</th>
				  </tr>

	';
 $statement = mysqli_query($con,"select * from tbl_order where order_date BETWEEN '$from' AND '$to' and pmode='Cash' ORDER BY order_date DESC");
 $i=0;
 $tottax=0;
 $totnotax=0;
 $totall=0;
 				  while($row=mysqli_fetch_array($statement))
                    {
					
					$i++;
                    $date=$row['order_date'];
					$name=$row['order_receiver_name'];
					$address=$row['address'];
					$notax=$row['order_total_before_tax'];
					$pmode=$row['pmode'];
					$totall+=$notax;
					
					
					$notaxf=number_format($notax);
				$output.='<tr><td>'.$i.'</td><td>'.$date.'</td><td>'.$name.'</td><td>'.$address.'</td><td>'.$notaxf.'</td><td>'.$pmode.'</td>
				</tr>';
					
					}
					$totallf=number_format($totall);
					$output.='<tr><th colspan=4>TOTAL</th><th>'.$totallf.'</th><td></td></tr>';
					  $output .= '
      </table>

  ';

  echo"$output";
}

?>