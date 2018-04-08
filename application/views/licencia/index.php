<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Formatos de Licencia</title>
	</head>
	<body>
		<div class="container mt-5">
			<div class="card">
				<div class="card-header bg-success text-white">
					<div class="row">
						<div class="col-10">
							<h1 class="text-center">Formatos de Licencia</h1>
						</div>
						<div class="col-2 text-right">
							<button class="btn bg-success btn-lg text-white" onclick="crearFormato()">Crear</button>
						</div>
					</div>
					
				</div>
				<div class="card-body">
					<table class="table table-responsive">
						<thead>
							<th>Tipo de Licencia</th>
							<th>Matricula de empleado</th>
							<th>Fecha Inicial</th>
							<th>Fecha Final</th>
							<th>Total de dias</th>
							<th>Motivo</th>
							<th>Estatus</th>
							<th>Eliminar</th>
							<th>Pdf</th>
						</thead>
						<tbody>
							<?php if (!empty($licencias)): ?>
							<?php foreach ($licencias as $value): ?>
							<tr>
								<th><?= $value->tipo_lic_id?></th>
								<th><?= $value->emp_matr_id?></th>
								<th><?= $value->lic_fech_ini ?></th>
								<th><?= $value->lic_fech_fin?></th>
								<th><?= $value->lic_tot_dias?></th>
								<th><?= $value->lic_moti ?></th>
								<?php $status = ($value->lic_est == 1) ? 'Aprobada' : 'No aprobada'; ?>
								<th><?= $status ?></th>
								<?php $status = ($value->lic_est == 1) ? 'disabled' : ''; ?>
								<th><button class="btn btn-danger text-white" <?= $status ?> onclick="eliminar('<?= $value->lic_id?>')">Eliminar</button></th>
								<th><a href="<?= site_url().'/licencia/pdf/'.$value->lic_id ?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</a></th>
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
window.location = '<?= site_url()."/licencia/crear" ?>';
}
</script>