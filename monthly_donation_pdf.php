<?php
    require_once 'dompdf/autoload.inc.php';
    require("connection.php");

    $q_don = $mysqli->query("SELECT * FROM donations_tbl ORDER BY donation_date DESC");
    
    use Dompdf\Dompdf;
use Dompdf\Options;

    $dompdf = new Dompdf;

    
    $html = '<h1 align="center">Donations Report</h1>';
    $html .='<div class="row row-1">';
    $html .=date("d D, M-Y | h:i a");
    $html .='<table border = "1" cellpadidng ="3" style="border-collapse: collapse;">';
    $html .='<tr>';
    $html .='<th width="30">#</th>';
    $html .='<th width="120">Name</th>';
    $html .='<th width="120">Email</th>';
    $html .='<th width="150">Account Name</th>';
    $html .='<th width="100">Account No.</th>';
    $html .='<th width="70">Donation Amount</th>';
    $html .='<th width="70">Donation Date/th>';
    $html .='</tr>';

    $cnt = 1;
    while($f_vol = $q_don->fetch_assoc()){
        $cnt++;
        $name = $f_vol['firstname']. " ".$f_vol['lastname'];
        $email = $f_vol['email'];
        $donation_amount = $f_vol['donation_amount'];
        $acc_no = $f_vol['acc_no'];
        $acc_name = $f_vol['acc_name'];
        $date = $f_vol['donation_date'];

    $html .='<tr>';
    $html .='<td align="center">'. $cnt++ .'</td>';
    $html .='<td style="padding: 0 10px;">'.$name.'</td>';
    $html .='<td style="padding: 0 10px;">'.$email.'</td>';
    $html .='<td style="padding: 0 10px;">'.$donation_amount.'</td>';
    $html .='<td style="padding: 0 10px;">'.$acc_no.'</td>';
    $html .='<td style="padding: 0 10px;">'.$acc_name.'</td>';
    $html .='<td style="padding: 0 10px;">'.$date.'</td>';
    $html .='</tr>';
    // $html .=$mysqli->query("SELECT SUM(donation_amount)");

        }
    $html .='</table>';
    $html .='</div>';

    $options = new Options;
    $options->setChroot(__DIR__);
    
    $dompdf= new Dompdf($options);
    $dompdf->setPaper("A4", "landscape");
    $dompdf->loadHtml($html);
    $dompdf->render();
    $dompdf->stream("volunteer-reports.pdf", ["Attachment" => 0]);
?>