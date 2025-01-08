<?php session_start();

if(isset($_POST['save']))
{
    include('dbcon.php');
    require_once 'pdf.php';

    //include('functions.php');

$item=$_POST['item'];
$quantity=$_POST['qty'];
$date=$_POST['date'];
$customer=$_POST['customer'];
$pt=$_POST['pt'];
$pu=$_POST['pu'];
$chk=$_POST['chk'];
$queryCustomer=mysqli_query($con,"SELECT * FROM members where id='$customer'");
$rowCus=mysqli_fetch_array($queryCustomer);
$names=$rowCus['names'];
$tin=$rowCus['tin'];
$phone=$rowCus['phone'];

$queryInvo=mysqli_query($con,"SELECT count(id) as total_count from packagesexit ")or die(mysqli_error($con));
$rowInvo=mysqli_fetch_array($queryInvo);
$invoiceNo=$rowInvo['total_count'];
$invoiceNo+=1;
$output='';
$output .= '<table width="100%" border="1" cellpadding="5" cellspacing="0">
<tr>
 <td colspan="2" align="center" style="font-size:18px"><b>Invoice</b></td>
</tr>
<tr>
 <td colspan="2">
  <table width="100%" cellpadding="5">
   <tr>
    <td width="65%">
     To,<br />
     <b>RECEIVER (BILL TO)</b><br />
     Name : '.$names.'<br /> 
     Tin : '.$tin.'<br />
     Phone : '.$phone.'<br />
    </td>
    <td width="35%">
     Reverse Charge<br />
     Invoice No. : '.$invoiceNo.'<br />
     Invoice Date : '.$date.'<br />
    </td>
   </tr>
  </table>
  <br />
  <table width="100%" border="1" cellpadding="5" cellspacing="0">
   <tr>
    <th>Sr No.</th>
    <th>Item Name</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Actual Amt.</th>
   </tr>';
$totam=$j=0;
for($i= 0;$i<count($chk);$i++)
{

$in=mysqli_query($con,"INSERT INTO packagesexit
VALUES('','','$item[$i]','$quantity[$i]','$pu[$i]','$pt[$i]','$date','$customer','$_SESSION[username]','Pending')")or die(mysqli_error($con))or die("Failed to insert in entry  ".mysqli_error($con));

$j++;
$amount=$quantity[$i]*$pu[$i];
$totam+=$amount;
$output.='
<tr>
    <td>'.$j.'</td>
    <td>'.$item[$i].'</td>
    <td>'.$quantity[$i].'</td>
    <td>'.$pu[$i].'</td>
    <td>'.$amount.'</td>
   
   </tr>
   ';
}
$totalf=number_format($totam);
$output .= '
<tr>
 <td align="right" colspan="4"><b>Total</b></td><th>'.$totalf.'</th>
</tr>
 </table>
 <br>
';
       
//echo"$output";
$pdf = new Pdf();
 $file_name = 'Invoice.pdf';
 $pdf->loadHtml($output);
 $pdf->render();
 ob_end_clean();
 $pdf->stream($file_name, array("Attachment" => false));
 
}





