<?php 
$this->load->library('pdf');
$MiPDF=new TCPDF();
# creamos una página en blanco
$MiPDF->Addpage();
$MiPDF->SetFontSize('7');
$MiPDF->Image(base_url().'/assets/img/pase.png', 0, 0, 230, 297, '', '', '',false, 340,'',false,false,0);
// Información del empleado
$pase = $this->mpase->get(['pas_hora' =>$pas->pas_hora ],1);
if ($pase == $this->mpase->get(['pas_hora' => '0'], 1)) {
	 $MiPDF->Multicell('','', $pas->pase_simbolo, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='23', $y='30', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
}elseif ($pase == $this->mpase->get(['pas_hora' => '1'], 1)) {
	$MiPDF->Multicell('','', $pas->pase_simbolo, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='51', $y='30', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
}elseif ($pase == $this->mpase->get(['pas_hora' => '2'],1)) {
	$MiPDF->Multicell('','', $pas->pase_simbolo, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='75', $y='30', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
}
$asunto = $this->mpase->get(['pas_asun' =>$pas->pas_asun],1);
if ($asunto == $this->mpase->get(['pas_asun' => '0'],1)) {
	$MiPDF->Multicell('','', $pas->pase_simbolo, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='104', $y='31', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
}elseif($asunto == $this->mpase->get(['pas_asun' => '1'],1)){
	$MiPDF->Multicell('','', $pas->pase_simbolo, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='130', $y='31', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
}elseif($asunto == $this->mpase->get(['pas_asun' => '2'],1)){
	$MiPDF->Multicell('','', $pas->pase_simbolo, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='150', $y='31', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
}

$MiPDF->Multicell ('', '', $emp->emp_nom.' '.$emp->emp_ape_pat.' '.$emp->emp_ape_mat , $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='70', $y='52', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$cat = $this->mcategoria->get(['cat_id' => $emp->cat_id],1);
$MiPDF->Multicell ('', '', $cat->cat_desc, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='65', $y='60', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $emp->emp_matr_id, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='145', $y='60', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$dep = $this->mdepartamento->get(['dep_id' => $emp->dep_id],1);
$MiPDF->Multicell ('', '', $dep->dep_desc, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='104', $y='68', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
// Información Pase
$MiPDF->Multicell ('', '', $pas->pas_hora_ini, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='45', $y='85', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $pas->pas_acti, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='95', $y='85', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $pas->pas_moti, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='45', $y='93', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
// Copia del formato
$pase = $this->mpase->get(['pas_hora' =>$pas->pas_hora ],1);
if ($pase == $this->mpase->get(['pas_hora' => '0'], 1)) {
	 $MiPDF->Multicell('','', $pas->pase_simbolo, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='23', $y='159', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
}elseif ($pase == $this->mpase->get(['pas_hora' => '1'], 1)) {
	$MiPDF->Multicell('','', $pas->pase_simbolo, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='51', $y='159', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
}elseif ($pase == $this->mpase->get(['pas_hora' => '2'],1)) {
	$MiPDF->Multicell('','', $pas->pase_simbolo, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='76', $y='159', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
}
$asunto = $this->mpase->get(['pas_asun' =>$pas->pas_asun],1);
if ($asunto == $this->mpase->get(['pas_asun' => '0'],1)) {
	$MiPDF->Multicell('','', $pas->pase_simbolo, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='104', $y='159', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
}elseif($asunto == $this->mpase->get(['pas_asun' => '1'],1)){
	$MiPDF->Multicell('','', $pas->pase_simbolo, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='130', $y='159', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
}elseif($asunto == $this->mpase->get(['pas_asun' => '2'],1)){
	$MiPDF->Multicell('','', $pas->pase_simbolo, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='150', $y='159', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
}
$MiPDF->Multicell ('', '', $emp->emp_nom.' '.$emp->emp_ape_pat.' '.$emp->emp_ape_mat , $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='70', $y='182', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $cat->cat_desc, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='65', $y='190', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $emp->emp_matr_id, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='145', $y='190', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $dep->dep_desc, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='104', $y='200', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $pas->pas_hora_ini, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='45', $y='217', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $pas->pas_acti, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='95', $y='217', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $pas->pas_moti, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='45', $y='226', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);

$MiPDF->Output();
 ?>