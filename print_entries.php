<?php
include 'includes/session.php';

if (isset($_POST['pdf'])) {
    $from = $_POST['date1'];
    $to = $_POST['date2'];
    $from_title = htmlspecialchars($_POST['date1']);
    $to_title = htmlspecialchars($_POST['date2']);
    
    require_once 'pdf.php';
    include('dbcon.php');
    
    $output = '<h2>ENTRIES REPORT</h2>';
    $output .= '<table width="100%" border="1" cellpadding="5" cellspacing="0">
    <tr>
        <td colspan="5" align="center" style="font-size:18px"><b>' . $from_title . ' - ' . $to_title . '</b></td>
    </tr>
    <tr>
        <th>#</th>
        <th>Item</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Total Amount</th>
    </tr>';

    $stmt = $con->prepare("SELECT rawmaterial, SUM(quantity) AS quantity FROM rawmaterialentry WHERE date BETWEEN ? AND ? GROUP BY rawmaterial");
    $stmt->bind_param('ss', $from, $to);
    $stmt->execute();
    $result = $stmt->get_result();

    $i = 0;
    $totAmount = 0;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $i++;
            $item = htmlspecialchars($row['rawmaterial']);
            $quantity = htmlspecialchars($row['quantity']);
            
            $priceStmt = $con->prepare("SELECT pprice FROM prices WHERE item = ?");
            $priceStmt->bind_param('s', $item);
            $priceStmt->execute();
            $priceResult = $priceStmt->get_result();
            $rowPrice = $priceResult->fetch_assoc();

            $pprice = htmlspecialchars($rowPrice['pprice']);
            $amount = $quantity * $pprice;
            $totAmount += $amount;

            $output .= '<tr>
                <td>' . $i . '</td>
                <td>' . $item . '</td>
                <td>' . $quantity . '</td>
                <td>' . $pprice . '</td>
                <td>' . number_format($amount) . '\Rwf</td>
            </tr>';
        }
    } else {
        $output .= '<tr><td colspan="5" align="center">No records found</td></tr>';
    }

    $output .= '<tr>
        <th colspan="4">TOTAL</th>
        <th>' . number_format($totAmount) . '\Rwf</th>
    </tr>
    </table>';

    $pdf = new Pdf();
    $file_name = 'entry-' . date('Y-m-d') . '.pdf';
    $pdf->loadHtml($output);
    $pdf->render();

    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="' . $file_name . '"');
    $pdf->stream($file_name, ['Attachment' => false]);
}
?>
