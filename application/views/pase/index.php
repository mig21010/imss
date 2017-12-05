<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Formatos de Pase</title>
	</head>
	<body>
		<div class="container mt-5">
			<div class="card">
				<div class="card-header bg-success text-white">
					<div class="row">
						<div class="col-10">
							<h1 class="text-center">Formatos de Pase</h1>
						</div>
						<div class="col-2 text-right">
							<button class="btn bg-success btn-lg text-white" onclick="crearFormato()">Crear</button>
						</div>
					</div>
					
				</div>
				<div class="card-body">
					<table class="table table-responsive">
						<thead>
							<th>Fecha de pase</th>
							<th>Horario</th>
							<th>Asunto</th>
							<th>Hora de inicio</th>
							<th>Actividad</th>
							<th>Motivo</th>
							<th>Estatus</th>
							<th>Eliminar</th>
							<th>Pdf</th>
						</thead>
						<tbody>
							<?php if (!empty($pases)): ?>
							<?php foreach ($pases as $value): ?>
							<tr>
								<th><?= $value->create_at ?></th>
								<?php
								switch ($value->pas_hora) {
									case 0:
										$opc = 'De entrada';
										break;
									case 1:
										$opc = 'Intermedio';
										break;
									case 2:
										$opc = 'De Salida';
									break;
								}
								?>
								<th><?= $opc ?></th>
								<?php
								switch ($value->pas_asun) {
									case 0:
										$opc = 'Particular';
										break;
									case 1:
										$opc = 'Oficial';
										break;
									case 2:
										$opc = 'Médico';
									break;
								}
								?>
								<th><?= $opc ?></th>
								<th><?= $value->pas_hora_ini ?></th>
								<th><?= $value->pas_acti ?></th>
								<th><?= $value->pas_moti ?></th>
								<?php $status = ($value->pas_est == 1) ? 'Aprobada' : 'No aprobada'; ?>
								<th><?= $status ?></th>
								<?php $status = ($value->pas_est == 1) ? 'disabled' : ''; ?>
								<th><button class="btn btn-danger text-white" <?= $status ?> onclick="eliminar('<?= $value->pas_id?>')">Eliminar</button></th>
								<th><a href="<?= site_url().'/pase/pdf/'.$value->pas_id ?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</a></th>
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
window.location = '<?= site_url()."/pase/crear" ?>';
}
</script>