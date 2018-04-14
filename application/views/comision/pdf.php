<?php 
$this->load->library('pdf');
$MiPDF = new TCPDF();
$MiPDF->Addpage();
$MiPDF->SetFontSize('7');
$MiPDF->Image(base_url().'/assets/img/comision.png', 0, 0, 250, 315, '', '', '',false, 350,'',false,false,0);

$MiPDF->Multicell ('', '', $emp->emp_nom.' '.$emp->emp_ape_pat.' '.$emp->emp_ape_mat , $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='85', $y='53', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$cat = $this->mcategoria->get(['cat_id' => $emp->cat_id],1);
$MiPDF->Multicell ('', '', $cat->cat_desc, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='65', $y='62', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $emp->emp_matr_id, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='166', $y='62', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$dep = $this->mdepartamento->get(['dep_id' => $emp->dep_id],1);
$MiPDF->Multicell ('', '', $dep->dep_desc, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='114', $y='69', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $com->com_obje, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='60', $y='73', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $com->com_luga, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='60', $y='82', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);

$comision = $this->mcomision->get(['com_medi_tran' =>$com->com_medi_tran ],1);
if ($comision == $this->mcomision->get(['com_medi_tran' => '0'], 1)) {
	 $MiPDF->Multicell('','', $com->com_simbolo, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='75', $y='88', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
}elseif ($comision == $this->mcomision->get(['com_medi_tran' => '1'], 1)) {
	$MiPDF->Multicell('','', $com->com_simbolo, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='141', $y='88', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
}
$MiPDF->Multicell ('', '', $com->com_ant_alim, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='83', $y='117', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $com->com_ant_pasa, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='83', $y='121', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $com->com_ant_vehi, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='83', $y='125', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $com->com_suma, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='83', $y='128', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $com->com_luga, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='83', $y='132', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $com->com_ant_otor, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='72', $y='228', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $com->com_comp_pres, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='72', $y='236', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $com->com_saldo, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='72', $y='244', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Output(); 
?>