<?php

require_once('tcpdf/tcpdf.php');


$pdf = new TCPDF();


$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Votre Nom');
$pdf->SetTitle('Votre CV');
$pdf->SetSubject('CV');


$pdf->AddPage();


ob_start();
include 'cv3.php';
$content = ob_get_clean();


$pdf->writeHTML($content);


$pdf->Output('cv.pdf', 'D');


exit;
?>
