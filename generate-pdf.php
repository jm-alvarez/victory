<?php
    require_once 'dompdf/autoload.inc.php';
    require("connection.php");

    $q_vol = $mysqli->query("SELECT * FROM users_tbl JOIN volunteers_tbl ON users_tbl.uid = volunteers_tbl.uid ORDER BY ulname DESC");
    
    use Dompdf\Dompdf;
use Dompdf\Options;

    $dompdf = new Dompdf;

    
    $html = '<h1 align="center">Volunteer List</h1>';
    $html .='<div class="row row-1">';
    $html .=date("d D, M-Y | h:i a");
    $html .='<table border = "1" cellpadidng ="3" style="border-collapse: collapse;">';
    $html .='<tr>';
    $html .='<th width="30">#</th>';
    $html .='<th width="120">Name</th>';
    $html .='<th width="120">Address</th>';
    $html .='<th width="150">Email</th>';
    $html .='<th width="100">Username</th>';
    $html .='<th width="70">Reg Date</th>';
    $html .='<th width="70">Hours Participated</th>';
    $html .='<th width="70">Status</th>';
    $html .='</tr>';

    $cnt = 1;
    while($f_vol = $q_vol->fetch_assoc()){
        $cnt++;
        $name = $f_vol['ulname'].", ".$f_vol['ufname']." ".$f_vol['mi'];
        $address = $f_vol['address'];
        $email = $f_vol['email'];
        $username = $f_vol['username'];
        $reg_date = $f_vol['reg_date'];
        $hp = $f_vol['vhours'];
        $status = $f_vol['vstatus'];

    $html .='<tr>';
    $html .='<td align="center">'. $cnt++ .'</td>';
    $html .='<td style="padding: 0 10px;">'.$name.'</td>';
    $html .='<td style="padding: 0 10px;">'.$address.'</td>';
    $html .='<td style="padding: 0 10px;">'.$email.'</td>';
    $html .='<td style="padding: 0 10px;">'.$username.'</td>';
    $html .='<td style="padding: 0 10px;">'.$reg_date.'</td>';
    $html .='<td style="padding: 0 10px;">'.$hp.'</td>';
    $html .='<td style="padding: 0 10px;">'.$status.'</td>';
    $html .='</tr>';

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