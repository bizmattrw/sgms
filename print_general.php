<?php
include 'includes/session.php';

if (isset($_POST['pdf'])) {
    $from = $_POST['date1'];
    $to = $_POST['date2'];
    $from_title = htmlspecialchars($_POST['date1']);
    $to_title = htmlspecialchars($_POST['date2']);
    
    require_once 'pdf.php';
    include('dbcon.php');
    
    $output = '<h2>GENERAL REPORT</h2>';
    $output .= '<table width="100%" border="1" cellpadding="5" cellspacing="0">
    <tr>
        <td colspan="7" align="center" style="font-size:18px"><b> I/O ' . $from_title . ' - ' . $to_title . '</b></td>
    </tr>';

$output.='
    <tr>
    <th colspan=2></th>
    <th colspan=2>Entries</th>
    <th colspan=2>Exit</th>
    <th>Balance</th>
    </tr>';

    $output.='
    <tr>
        <th>#</th>
        <th>Item</th>
        <th>Quantity</th>
    
        <th>Total Amount</th>
   ';
    $output.='
    
        <th>Quantity</th>
       
        <th>Total Amount</th>
        <th></th>
    </tr>';
    $stmt = $con->prepare("SELECT rawmaterial, SUM(quantity) AS quantity,SUM(amount) as amount FROM rawmaterialentry WHERE date BETWEEN ? AND ? GROUP BY rawmaterial");
    $stmt->bind_param('ss', $from, $to);
    $stmt->execute();
    $result = $stmt->get_result();

    $i = 0;
    $totAmount = $totEntries=$totExit=0;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $i++;
            $item = htmlspecialchars($row['rawmaterial']);
            $quantity = htmlspecialchars($row['quantity']);
            $amountEntry = htmlspecialchars($row['amount']);

            //SELECTING EXIT DATA
            $stmtExit = $con->prepare("SELECT SUM(quantity) AS quantity,SUM(amount) as amount FROM rawmaterialexit WHERE date BETWEEN ? AND ? and rawmaterial=? GROUP BY rawmaterial");
            $stmtExit->bind_param('sss', $from, $to,$item);
            $stmtExit->execute();
            $resultExit = $stmtExit->get_result();
        $rowExit=$resultExit->fetch_assoc();
        $quantityExit = htmlspecialchars($rowExit['quantity']);
        $amountExit = htmlspecialchars($rowExit['amount']);
        if($quantityExit=="") { $quantityExit=$amountExit=0;}
        $totEntries+=$amountEntry;
        $totExit+=$amountExit;
        $balance=$amountExit-$amountEntry;
            $totAmount += $balance;

            $output .= '<tr>
                <td>' . $i . '</td>
                <td>' . $item . '</td>
                <td>' . $quantity . '</td>
                <td>' . number_format($amountEntry) . '\Rwf</td>
                <td>' . $quantityExit . '</td>
                <td>' . number_format($amountExit) . '\Rwf</td>
                <td>' . number_format($balance) . '\Rwf</td>
            </tr>';
        }
    } else {
        $output .= '<tr><td colspan="5" align="center">No records found</td></tr>';
    }

    $output .= '<tr>
        <th colspan="3">TOTAL</th>
        <th>' . number_format($totEntries) . '\Rwf</th>
        <th colspan=2 align=center>' . number_format($totExit) . '\Rwf</th>
        <th>' . number_format($totAmount) . '\Rwf</th>
    </tr>
    </table> <br>';

    //EXPENSES CODES

    $output .= '<table width="100%" border="1" cellpadding="5" cellspacing="0">
    <tr>
        <td colspan="4" align="center" style="font-size:18px"><b>EXPENSES ' . $from_title . ' - ' . $to_title . '</b></td>
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
    $totAmountExpenses = 0;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $i++;
            $item = htmlspecialchars($row['expense']);
            $amount = htmlspecialchars($row['amount']);
            $date = htmlspecialchars($row['date']);
            $totAmountExpenses += $amount;

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
        <th>' . number_format($totAmountExpenses) . '\Rwf</th>
    </tr>
    </table> <br>';

    //DEFECTS CODES

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

    $stmt = $con->prepare("SELECT rawmaterial, SUM(quantity) AS quantity FROM defects WHERE date BETWEEN ? AND ? GROUP BY rawmaterial");
    $stmt->bind_param('ss', $from, $to);
    $stmt->execute();
    $result = $stmt->get_result();

    $i = 0;
    $totAmountDefects = 0;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $i++;
            $item = htmlspecialchars($row['rawmaterial']);
            $quantity = htmlspecialchars($row['quantity']);
            
            $priceStmt = $con->prepare("SELECT sprice FROM prices WHERE item = ?");
            $priceStmt->bind_param('s', $item);
            $priceStmt->execute();
            $priceResult = $priceStmt->get_result();
            $rowPrice = $priceResult->fetch_assoc();

            $sprice = htmlspecialchars($rowPrice['sprice']);
            $amount = $quantity * $sprice;
            $totAmountDefects += $amount;

            $output .= '<tr>
                <td>' . $i . '</td>
                <td>' . $item . '</td>
                <td>' . $quantity . '</td>
                <td>' . $sprice . '</td>
                <td>' . number_format($amount) . '\Rwf</td>
            </tr>';
        }
    } else {
        $output .= '<tr><td colspan="5" align="center">No records found</td></tr>';
    }

    $output .= '<tr>
        <th colspan="4">TOTAL</th>
        <th>' . number_format($totAmountDefects) . '\Rwf</th>
    </tr>
    </table>';

    //NET PROFIT
$netProfit=$totAmount-$totAmountExpenses-$totAmountDefects;
$output .='<h2>NET PROFIT=' . number_format($netProfit) . '\Rwf</h2>';

//  echo$output;
    $pdf = new Pdf();
    $file_name = 'entry-' . date('Y-m-d') . '.pdf';
    $pdf->loadHtml($output);
    $pdf->render();

    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="' . $file_name . '"');
    $pdf->stream($file_name, ['Attachment' => false]);
}
?>
