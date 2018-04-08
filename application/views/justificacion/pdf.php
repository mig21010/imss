<?php 
$this->load->library('pdf');
$MiPDF = new TCPDF();
$MiPDF->Addpage();
$MiPDF->SetFontSize('7');
$MiPDF->Image(base_url().'/assets/img/justificacion.png', 0, 0, 245, 320, '', '', '',false, 300,'',false,false,0);
//Informacion del empleado 
$MiPDF->Multicell ('', '', $emp->emp_nom.' '.$emp->emp_ape_pat.' '.$emp->emp_ape_mat , $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='85', $y='76', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$cat = $this->mcategoria->get(['cat_id' => $emp->cat_id],1);
$MiPDF->Multicell ('', '', $cat->cat_desc, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='65', $y='84', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $emp->emp_matr_id, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='148', $y='84', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$dep = $this->mdepartamento->get(['dep_id' => $emp->dep_id],1);
$MiPDF->Multicell ('', '', $dep->dep_desc, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='134', $y='90', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $jus->jus_moti, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='65', $y='115', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Output(); 
?>