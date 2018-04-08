<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Formatos de Comisión</title>
	</head>
	<body>
		<div class="container mt-5">
			<div class="card">
				<div class="card-header bg-success text-white">
					<div class="row">
						<div class="col-10">
							<h1 class="text-center">Formatos de Comision</h1>
						</div>
						<div class="col-2 text-right">
							<button class="btn bg-success btn-lg text-white" onclick="crearFormato()">Crear</button>
						</div>
					</div>
					
				</div>
				<div class="card-body">
					<table class="table table-responsive">
						<thead>
							<th>Matricula de empleado</th>
							<th>Lugar</th>
							<th>Medio de Transporte</th>
							<th>Anticipo de Alimentación</th>
							<th>Anticipo de pasajes</th>
							<th>Anticipo de Vehiculo</th>
							<th>Total</th>
							<th>Anticipos Otorgados</th>
							<th>Comprobantes Presentados</th>
							<th>Saldo</th>
							<th>Eliminar</th>
							<th>Pdf</th>
						</thead>
						<tbody>
							<?php if (!empty($comisiones)): ?>
							<?php foreach ($comisiones as $value): ?>
							<tr>
								<th><?= $value->emp_matr_id?></th>
								<th><?= $value->com_luga?></th>
								
								<?php
								switch ($value->com_medi_tran) {
									case 0:
										$opc = 'Vehiculo Particular';
										break;
									case 1:
										$opc = 'Vehiculo Oficial';
										break;
								}
								?>
								<th><?= $opc ?></th>
								<th><?= $value->com_ant_alim?></th>
								<th><?= $value->com_ant_pasa?></th>
								<th><?= $value->com_ant_vehi?></th>
								<th><?= $value->com_suma?></th>
								<th><?= $value->com_ant_otor?></th>
								<th><?= $value->com_comp_pres?></th>
								<th><?= $value->com_saldo?></th>
								<?php $status = ($value->com_est == 1) ? 'Aprobada' : 'No aprobada'; ?>
								<!-- <th><?= $status ?></th> -->
								<?php $status = ($value->com_est == 1) ? 'disabled' : ''; ?>
								<th><button class="btn btn-danger text-white" <?= $status ?> onclick="eliminar('<?= $value->com_id?>')">Eliminar</button></th>
								<th><a href="<?= site_url().'/comision/pdf/'.$value->com_id ?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</a></th>
							</tr>
							<?php endforeach ?>
							<?php endif ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>
<script>
function crearFormato(){
window.location = '<?= site_url()."/comision/crear" ?>';
}
</script>