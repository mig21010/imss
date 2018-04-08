<?php 
$this->load->library('pdf');
$MiPDF = new TCPDF();
$MiPDF->Addpage();
$MiPDF->SetFontSize('7');
$MiPDF->Image(base_url().'/assets/img/comision.png', 0, 0, 250, 315, '', '', '',false, 350,'',false,false,0);

$MiPDF->Output(); 
?>