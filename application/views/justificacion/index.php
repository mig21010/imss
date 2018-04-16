<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Formatos de Justificacion</title>
	</head>
	<body>
		<div class="container mt-5">
			<div class="card">
				<div class="card-header bg-success text-white">
					<div class="row">
						<div class="col-10">
							<h1 class="text-center">Formatos de Justificacion</h1>
						</div>
						<div class="col-2 text-right">
							<button class="btn bg-success btn-lg text-white" onclick="crearFormato()">Crear</button>
						</div>
					</div>
					
				</div>
				<div class="card-body">
					<table class="table table-responsive">
						<thead>
							<th>Fecha de Justificacion</th>
							<th>Omisión</th>
							<th>Motivo</th>
							<th>Estatus</th>
							<th>Eliminar</th>
							<th>Pdf</th>
						</thead>
						<tbody>
							<?php if (!empty($justificaciones)): ?>
							<?php foreach ($justificaciones as $value): ?>
							<tr>
								<th><?= $value->jus_fech ?></th>
								<th><?= $value->jus_omi ?></th>
								<th><?= $value->jus_moti ?></th>
								<?php $status = ($value->jus_est == 1) ? 'Aprobada' : 'No aprobada'; ?>
								<th><?= $status ?></th>
								<?php $status = ($value->jus_est == 1) ? 'disabled' : ''; ?>
								<th><button class="btn btn-danger text-white" <?= $status ?> onclick="eliminar('<?= $value->jus_id?>')">Eliminar</button></th>
								<th><a href="<?= site_url().'/justificacion/pdf/'.$value->jus_id ?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</a></th>
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
window.location = '<?= site_url()."/justificacion/crear" ?>';
}
</script>