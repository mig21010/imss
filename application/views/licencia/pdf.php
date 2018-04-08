<?php 
$this->load->library('pdf');
$MiPDF = new TCPDF();
$MiPDF->Addpage();
$MiPDF->SetFontSize('7');
$MiPDF->Image(base_url().'/assets/img/licencia.png', 0, 0, 260, 315, '', '', '',false, 350,'',false,false,0);
$MiPDF->Multicell ('', '', $lic->lic_fech_sol, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='160', $y='39', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$tipo = $this->mtipolicencia->get(['tipo_lic_id' => $lic->tipo_lic_id],1);
if ($tipo == $this->mtipolicencia->get(['tipo_lic_id' => '1'], 1)) {
	$MiPDF->Multicell ('', '', $tipo->tipo_lic_simbolo, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='70', $y='45', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
}else if($tipo == $this->mtipolicencia->get(['tipo_lic_id' => '2'], 1)){
	$MiPDF->Multicell ('', '', $tipo->tipo_lic_simbolo, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='135', $y='45', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
}else if ($tipo == $this->mtipolicencia->get(['tipo_lic_id' => '3'], 1)) {
	$MiPDF->Multicell ('', '', $tipo->tipo_lic_simbolo, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='70', $y='55', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
}else if($tipo == $this->mtipolicencia->get(['tipo_lic_id' => '4'], 1)){
	$MiPDF->Multicell ('', '', $tipo->tipo_lic_simbolo, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='135', $y='55', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
}     
//Informacion del empleado 
$MiPDF->Multicell ('', '', $emp->emp_nom , $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='120', $y='68', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $emp->emp_ape_pat , $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='30', $y='68', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $emp->emp_ape_mat , $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='73', $y='68', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $emp->emp_matr_id, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='160', $y='68', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$cat = $this->mcategoria->get(['cat_id' => $emp->cat_id],1);
$MiPDF->Multicell ('', '', $cat->cat_desc, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='40', $y='73', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $emp->emp_adsc, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='120', $y='73', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $lic->lic_fech_ini, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='22', $y='93', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $lic->lic_fech_fin, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='60', $y='93', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $lic->lic_tot_dias, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='67', $y='105', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $lic->lic_moti, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='70', $y='116', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Output(); 
 ?>