<?php
include 'includes/session.php';

if (isset($_POST['pdf'])) {
    $from = $_POST['date1'];
    $to = $_POST['date2'];
    $from_title = htmlspecialchars($_POST['date1']);
    $to_title = htmlspecialchars($_POST['date2']);
    
    require_once 'pdf.php';
    include('dbcon.php');
    
    $output = '<h2>EXPENSES REPORT</h2>';
    $output .= '<table width="100%" border="1" cellpadding="5" cellspacing="0">
    <tr>
        <td colspan="4" align="center" style="font-size:18px"><b>' . $from_title . ' - ' . $to_title . '</b></td>
    </tr>
    <tr>
        <th>#</th>
        <th>Date</th>
        <th>Expense</th>
        <th>Amount</th>
        
    </tr>';

    $stmt = $con->prepare("SELECT expense, SUM(amount) AS amount,date FROM expenses_register WHERE date BETWEEN ? AND ? GROUP BY expense");
    $stmt->bind_param('ss', $from, $to);
    $stmt->execute();
    $result = $stmt->get_result();

    $i = 0;
    $totAmount = 0;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $i++;
            $item = htmlspecialchars($row['expense']);
            $amount = htmlspecialchars($row['amount']);
            $date = htmlspecialchars($row['date']);
            $totAmount += $amount;

            $output .= '<tr>
                <td>' . $i . '</td>
                <td>' . $date . '</td>
                <td>' . $item . '</td>
                
              
                <td>' . number_format($amount) . '\Rwf</td>
            </tr>';
        }
    } else {
        $output .= '<tr><td colspan="3" align="center">No records found</td></tr>';
    }

    $output .= '<tr>
        <th colspan="3">TOTAL</th>
        <th>' . number_format($totAmount) . '\Rwf</th>
    </tr>
    </table>';

    $pdf = new Pdf();
    $file_name = 'expenses-' . date('Y-m-d') . '.pdf';
    $pdf->loadHtml($output);
    $pdf->render();

    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="' . $file_name . '"');
    $pdf->stream($file_name, ['Attachment' => false]);
}
?>
