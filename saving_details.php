<?php

    //$ex = explode(' - ', $_POST['date_range']);
    $pin = $_GET['pin'];
  
    require_once 'pdf.php';
  
    include('dbcon.php');
    $output = '';
    $output .= '<h2>INDIVIDUAL SAVINGS REPORT';
    $output .= ' <table width=100% border=1 cellpadding=5 cellspacing=0>
   
	                  <tr><th>No</th>
                      <th>date</th>
                  <th>IdNo</th>
                  <th>Names</th>
                  <th>Phone</th>
                  <th>Amount</th>
				 
				  </tr>

	';
    $statement = mysqli_query($con, "select s.date,s.pin,s.date,s.id,m.names,m.idcard,m.phone,sum(s.saving) as amount from members m,saving s WHERE m.id=s.pin and s.pin='$pin' group by s.pin,s.date");
    $i = 0;
    $totCredit = 0;
    $totPaid = 0;
    $totLeft = 0;
    while ($row = mysqli_fetch_array($statement)) {

        $i++;
        $date = $row['date'];
        $idno = $row['idcard'];
        $names = $row['names'];
        $phone = $row['phone'];
        $amount = $row['amount'];
        $totAmount += $amount;
        
       
        $output .= '<tr><td>' . $i . '</td><td>' . $date . '</td><td>' . $idno . '</td><td>' . $names . '</td><td>' . $phone . '</td><td>' . number_format($amount) . '\Rwf</td>
				</tr>';
    }
    $totAmountf = number_format($totAmount);
   
    $output .= '<tr><th colspan=5>TOTAL</th><th>' . $totAmountf . '\Rwf</th></tr>';
    $output .= '
      </table>

  ';

    $pdf = new Pdf();
    $file_name = 'saving_details-.pdf';
    $pdf->loadHtml($output);
    $pdf->render();
    ob_end_clean();
    $pdf->stream($file_name, array("Attachment" => false));

