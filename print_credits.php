<?php
include 'includes/session.php';
if (isset($_POST['pdf'])) {
  //$ex = explode(' - ', $_POST['date_range']);
  $from = $_POST['date1'];
  $to = $_POST['date2'];
  $from_title = $_POST['date1'];
  $to_title = $_POST['date2'];
  require_once 'pdf.php';
  include('dbcon.php');
  $output = '';
  $output .= '<h2>CREDITS REPORT';
  $output .= ' <table width=100% border=1 cellpadding=5 cellspacing=0>
    <tr>
     <td colspan="7" align="center" style="font-size:18px"><b>From' . $from_title . " - Up to" . $to_title . '</b></td>
    </tr>
	                  <tr><th>No</th>
                  <th>IdNo</th>
                  <th>Names</th>
                  <th>Phone</th>
                  <th>Amount</th>
                  <th>Interest</th>
                  <th>Total</th>
				  <th>Amount Paid</th>
				  <th>Amount Left</th>
				  </tr>

	';
  $statement = mysqli_query($con, "select s.pin,s.date,s.id,m.names,m.idcard,m.phone,sum(s.amount) as amount,s.interest as interest,s.total as total from members m,credits s WHERE m.id=s.pin and s.date between '$from' and '$to' group by pin");
  $i = 0;
  $totCredit = 0;
  $totPaid = $totInterest = $totAmount = 0;
  $totLeft = 0;
  while ($row = mysqli_fetch_array($statement)) {

    $i++;
    $idno = $row['idcard'];
    $names = $row['names'];
    $phone = $row['phone'];
    $amount = $row['amount'];
    $interest = $row['interest'];
    $total = $row['total'];
    $totInterest += $interst;
    $totAmount += $total;
    $totCredit += $amount;
    $pin = $row['pin'];


    $empQuery1 = "select sum(amount) as ampay from payments WHERE pin='$pin' group by pin";
    $empRecords1 = mysqli_query($con, $empQuery1) or die(mysqli_error($con));
    $row1 = mysqli_fetch_array($empRecords1);
    $pam = $row1['ampay'];
    $totPaid += $pam;
    $amLeft = $totAmount - $pam;
    $totLeft += $amLeft;
    $notaxf = number_format($notax);
    $output .= '<tr><td>' . $i . '</td><td>' . $idno . '</td><td>' . $names . '</td><td>' . $phone . '</td><td>' . number_format($amount) . '</td><td>'.number_format($interest).'</td><td>'.number_format($total).'</td><td>' . number_format($pam) . '</td><td>' . number_format($amLeft) . '</td>
				</tr>';
  }
  $totCreditf = number_format($totCredit);
  $totPaidf = number_format($totPaid);
  $totLeft = number_format($totLeft);
  $totInterestf = number_format($totInterest);
  $totAmountf = number_format($totAmount);
  $output .= '<tr><th colspan=4>TOTAL</th><th>' . $totCreditf . '</th><th>'.$totInterestf.'</th><th>'.$totAmountf.'</th><th>' . $totPaidf . '</th><th>' . $totLeft . '</th></tr>';
  $output .= '
      </table>

  ';

  $pdf = new Pdf();
  $file_name = 'Credits-.pdf';
  $pdf->loadHtml($output);
  $pdf->render();
  ob_end_clean();
  $pdf->stream($file_name, array("Attachment" => false));
}
