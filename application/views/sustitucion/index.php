<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Formatos de Sustitución</title>
	</head>
	<body>
		<div class="container mt-5">
			<div class="card">
				<div class="card-header bg-success text-white">
					<div class="row">
						<div class="col-10">
							<h1 class="text-center">Formatos de Sustituciones</h1>
						</div>
						<div class="col-2 text-right">
							<button class="btn bg-success btn-lg text-white" onclick="crearFormato()">Crear</button>
						</div>
					</div>
					
				</div>
				<div class="card-body">
					<table class="table table-responsive">
						<thead>
							<th>Matricula Sustitución</th>
							<th>Fecha de susutitución</th>
							<th>Horario Sustitución</th>
							<th>Turno de sustitución</th>
							<th>Estatus</th>
							<th>Eliminar</th>
						</thead>
						<tbody>
							<?php if (!empty($sustituciones)): ?>
							<?php foreach ($sustituciones as $value): ?>
							<tr>
								<th><?= $value->emp_matr_id ?></th>
								<th><?= $value->sus_fech ?></th>
								<th><?= $value->sus_hora ?></th>
								<th><?= $value->sus_turn ?></th>
								<th><?= $value->sus_est ?></th>
								<?php $status = ($value->sus_est == 1) ? 'disabled' : ''; ?>
								<th><button class="btn btn-danger text-white" <?= $status ?> onclick="eliminar('<?= $value->sus_id?>')">Eliminar</button></th>
								<th><a href="<?= site_url().'/sustitucion/pdf/'.$value->sus_id ?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</a></th>
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
window.location = '<?= site_url()."/sustitucion/crear" ?>';
}
</script>