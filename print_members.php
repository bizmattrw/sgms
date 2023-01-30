<?php

    //$ex = explode(' - ', $_POST['date_range']);
   
    require_once 'pdf.php';
   
    include('dbcon.php');
    $output = '';
    $output .= '<h2>MEMBERS REPORT';
    $output .= ' <table width=100% border=1 cellpadding=5 cellspacing=0>
    
	                  <tr><th>No</th>
                  <th>IdNo</th>
                  <th>Names</th>
                  <th>Phone</th>
                 
				  </tr>

	';
    $statement = mysqli_query($con, "select m.names,m.idcard,m.phone from members m  order by names asc");
    $i = 0;
   
    while ($row = mysqli_fetch_array($statement)) {

        $i++;
        $idno = $row['idcard'];
        $names = $row['names'];
        $phone = $row['phone'];
    
     
      

        $output .= '<tr><td>' . $i . '</td><td>' . $idno . '</td><td>' . $names . '</td><td>' . $phone . '</td>
				</tr>';
    }
   
    $output .= '
      </table>

  ';

    $pdf = new Pdf();
    $file_name = 'Credits-.pdf';
    $pdf->loadHtml($output);
    $pdf->render();
    ob_end_clean();
    $pdf->stream($file_name, array("Attachment" => false));

