<?php
$this->load->library('pdf');

$MiPDF=new TCPDF();
# creamos una página en blanco
$MiPDF->Addpage();
$MiPDF->SetFontSize('7');
$MiPDF->Image(base_url().'/assets/img/sustitucion.png', 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
$MiPDF->Multicell ('', '', $emp_a->emp_matr_id, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='140', $y='58', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);

$MiPDF->Multicell ('', '', $emp_a->emp_nom.' '.$emp_a->emp_ape_pat.''.$emp_a->emp_ape_mat , $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='70', $y='58', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$cat = $this->mcategoria->get(['cat_id' => $emp_a->cat_id],1);
$MiPDF->Multicell ('', '', $cat->cat_desc, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='47', $y='63', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);

$MiPDF->Multicell ('', '', $emp_a->emp_adsc, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='110', $y='63', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$dep = $this->mdepartamento->get(['dep_id' => $emp_a->dep_id],1);
$MiPDF->Multicell ('', '', $dep->dep_desc, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='134', $y='63', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);

$MiPDF->Multicell ('', '', $emp_a->emp_turn, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='50', $y='68', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);

$MiPDF->Multicell ('', '', $emp_a->emp_entr.'-'.$emp_a->emp_sali, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='90', $y='68', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);

$MiPDF->Multicell ('', '', $emp_a->emp_dia_desc, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='138', $y='68', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
/*empleado b*/
$MiPDF->Multicell ('', '', $emp_b->emp_matr_id, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='140', $y='78', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);

$MiPDF->Multicell ('', '', $emp_b->emp_nom.' '.$emp_b->emp_ape_pat.''.$emp_b->emp_ape_mat , $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='70', $y='78', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$cat = $this->mcategoria->get(['cat_id' => $emp_b->cat_id],1);
$MiPDF->Multicell ('', '', $cat->cat_desc, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='47', $y='83', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);

$MiPDF->Multicell ('', '', $emp_b->emp_adsc, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='110', $y='83', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$dep = $this->mdepartamento->get(['dep_id' => $emp_b->dep_id],1);
$MiPDF->Multicell ('', '', $dep->dep_desc, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='134', $y='83', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);

$MiPDF->Multicell ('', '', $emp_b->emp_turn, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='50', $y='88', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);

$MiPDF->Multicell ('', '', $emp_b->emp_entr.'-'.$emp_b->emp_sali, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='90', $y='88', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);

$MiPDF->Multicell ('', '', $emp_b->emp_dia_desc, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='138', $y='88', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
/*info sustitucion*/
$MiPDF->Multicell ('', '', $sus->sus_fech, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='70', $y='100', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $sus->sus_hora, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='140', $y='100', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $sus->sus_turn, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='70', $y='105', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$dep = $this->mdepartamento->get(['dep_id' => $emp_a->dep_id],1);
$MiPDF->Multicell ('', '', $dep->dep_desc, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='128', $y='105', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
/*se compromete*/
$MiPDF->Multicell ('', '', $emp_a->emp_nom.' '.$emp_a->emp_ape_pat.''.$emp_a->emp_ape_mat , $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='60', $y='165', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $emp_a->emp_matr_id, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='140', $y='165', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$cat = $this->mcategoria->get(['cat_id' => $emp_a->cat_id],1);
$MiPDF->Multicell ('', '', $cat->cat_desc, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='47', $y='170', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);
$MiPDF->Multicell ('', '', $emp_a->emp_adsc, $borde=0, $alineacion='', $fondo=false, $salto_de_linea=1, $x='112', $y='170', $reseth=true, $ajuste_horizontal=0, $ishtml=false, $autopadding=true, $maxh=0, $alineacion_vertical='T', $fitcell=false);

$MiPDF->Addpage();
$MiPDF->Image(base_url().'/assets/img/licencia.jpeg', 0, 0, 210, 160, '', '', '', false, 300, '', false, false, 0);

$MiPDF->Output();

