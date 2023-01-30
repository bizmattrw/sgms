<?php
include 'includes/session.php';
if (isset($_POST['pdf'])) {
    //$ex = explode(' - ', $_POST['date_range']);
    $from = $_POST['date1'];
    $to = $_POST['date2'];
    $from_title = $_POST['date1'];
    $to_title = $_POST['date2'];
    require_once 'pdf.php';
    include('database_connection.php');
    include('dbcon.php');
    $output = '';
    $output .= '<h2>SAVINGS REPORT';
    $output .= ' <table width=100% border=1 cellpadding=5 cellspacing=0>
    <tr>
     <td colspan="5" align="center" style="font-size:18px"><b>' . $from_title . " - " . $to_title . '</b></td>
    </tr>
	                  <tr><th>No</th>
                  <th>IdNo</th>
                  <th>Names</th>
                  <th>Phone</th>
                  <th>Amount</th>
				 
				  </tr>

	';
    $statement = mysqli_query($con, "select s.pin,s.date,s.id,m.names,m.idcard,m.phone,sum(s.saving) as amount from members m,saving s WHERE m.id=s.pin and s.date between '$from' and '$to' group by pin");
    $i = 0;
    $totCredit = 0;
    $totPaid = 0;
    $totLeft = 0;
    while ($row = mysqli_fetch_array($statement)) {

        $i++;
        $idno = $row['idcard'];
        $names = $row['names'];
        $phone = $row['phone'];
        $amount = $row['amount'];
        $totAmount += $amount;      
       
        $output .= '<tr><td>' . $i . '</td><td>' . $idno . '</td><td>' . $names . '</td><td>' . $phone . '</td><td>' . number_format($amount) . '\Rwf</td>
				</tr>';
    }
    $totAmountf = number_format($totAmount);
   
    $output .= '<tr><th colspan=4>TOTAL</th><th>' . $totAmountf . '\Rwf</th></tr>';
    $output .= '
      </table>

  ';

    $pdf = new Pdf();
    $file_name = 'saving-.pdf';
    $pdf->loadHtml($output);
    $pdf->render();
    ob_end_clean();
    $pdf->stream($file_name, array("Attachment" => false));
}
