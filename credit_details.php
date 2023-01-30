<?php

    //$ex = explode(' - ', $_POST['date_range']);
    $pin = $_GET['pin'];
  
    require_once 'pdf.php';
  
    include('dbcon.php');
    $output = '';
    $output .= '<h2>INDIVIDUAL CREDITSS REPORT';
    $output .= ' <table width=100% border=1 cellpadding=5 cellspacing=0>
    <tr>
    <td colspan="6" align="center" style="font-size:18px"><b>Credits</b></td>
   </tr>
	                  <tr><th>No</th>
                      <th>date</th>
                  <th>IdNo</th>
                  <th>Names</th>
                  <th>Phone</th>
                  <th>Amount Taken</th>
				 
				  </tr>

	';
    $statement = mysqli_query($con, "select s.date,s.pin,s.date,s.id,m.names,m.idcard,m.phone,sum(s.amount) as amount from members m,credits s WHERE m.id=s.pin and s.pin='$pin' group by s.pin,s.date");
    $i = 0;
$totAmountPaid = 0;
    while ($row = mysqli_fetch_array($statement)) {

        $i++;
        $date = $row['date'];
        $idno = $row['idcard'];
        $names = $row['names'];
        $phone = $row['phone'];
        $amount = $row['amount'];
        $totAmountPaid += $amount;
        
       
        $output .= '<tr><td>' . $i . '</td><td>' . $date . '</td><td>' . $idno . '</td><td>' . $names . '</td><td>' . $phone . '</td><td>' . number_format($amount) . '\Rwf</td>
				</tr>';
    }
    $totAmountPaidf = number_format($totAmountPaid);
   
    $output .= '<tr><th colspan=5>TOTAL</th><th>' . $totAmountPaidf . '\Rwf</th></tr>';
    $output .= '
      </table>

  ';
$output .= '<br>';
  $output .= ' <table width=100% border=1 cellpadding=5 cellspacing=0>
    <tr>
    <td colspan="6" align="center" style="font-size:18px"><b>Payments</b></td>
   </tr>
	                  <tr><th>No</th>
                      <th>date</th>
                  <th>IdNo</th>
                  <th>Names</th>
                  <th>Phone</th>
                  <th>Amount Paid</th>
				 
				  </tr>

	';
    $statement = mysqli_query($con, "select s.date,s.pin,s.date,s.id,m.names,m.idcard,m.phone,sum(s.amount) as amount from members m,payments s WHERE m.id=s.pin and s.pin='$pin' group by s.pin,s.date");
    $i = 0;
    $totCredit = 0;
    
    while ($row = mysqli_fetch_array($statement)) {

        $i++;
        $date = $row['date'];
        $idno = $row['idcard'];
        $names = $row['names'];
        $phone = $row['phone'];
        $amount = $row['amount'];
        $totCredit += $amount;
        
       
        $output .= '<tr><td>' . $i . '</td><td>' . $date . '</td><td>' . $idno . '</td><td>' . $names . '</td><td>' . $phone . '</td><td>' . number_format($amount) . '\Rwf</td>
				</tr>';
    }
    $totCreditf = number_format($totCredit);
   
    $output .= '<tr><th colspan=5>TOTAL</th><th>' . $totCreditf . '\Rwf</th></tr>';
    $output .= '
      </table>

  ';
    $pdf = new Pdf();
    $file_name = 'credits_details-.pdf';
    $pdf->loadHtml($output);
    $pdf->render();
    ob_end_clean();
    $pdf->stream($file_name, array("Attachment" => false));

