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
						<div class="col-4 text-right">
							<button class="btn bg-success btn-lg text-white" onclick="control()">Control</button>
						</div>
						<div class="col-4 text-right">
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
							<?php if ($this->session->has_userdata('admin')): ?>
							<th>Cambiar Estatus</th>
							<?php endif ?>
							<th>Estatus</th>
							<th>Eliminar</th>
							<th>PDF</th>
						</thead>
						<tbody>
							<?php if (!empty($sustituciones)): ?>
							<?php foreach ($sustituciones as $value): ?>
							<tr>
								<th><?= $value->emp_matr_id ?></th>
								<th><?= $value->sus_fech ?></th>
								<th><?= $value->sus_hora ?></th>
								<th><?= $value->sus_turn ?></th>
								<?php if ($this->session->has_userdata('admin')): ?>
								<th><button class="btn btn-warning text-white" onclick="cambiarEstatus('<?= $value->sus_id ?>')">Cambiar Estatus</button></th>
								<?php endif ?>
								<?php $status = ($value->sus_est == 1) ? 'Aprobada' : 'No aprobada'; ?>
								<th><?= $status ?></th>
								<?php $disabled = ($value->sus_est == 1) ? 'disabled' : ''; ?>
								<th><button class="btn btn-danger text-white" <?= $disabled ?> onclick="eliminar('<?= $value->sus_id?>')">Eliminar</button></th>
								<th><a href="<?= site_url().'/sustitucion/pdf/'.$value->sus_id ?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</a></th>
							</tr>
							<?php endforeach ?>
							<?php endif ?>
						</tbody>
						<?= form_open(); ?>
						<?= form_close(); ?>
					</table>
				</div>
			</div>
		</div>
	<?php echo $count;  ?>
	</body>
</html>
<script>
function crearFormato(){
window.location = '<?= site_url()."/sustitucion/crear" ?>';
}
function control(){
	window.location = '<?= site_url()."/sustitucion/control" ?>';
}

function eliminar(id = ''){
	data = {sus_id:id};
	postAjax('<?= site_url()."/sustitucion/proEliminar" ?>', data, function(response){
		if (response.success != undefined) {
					swal('Se proceso la información',response.success,'info');
					setInterval(function(){ window.location = '<?= site_url()."/sustitucion/index" ?>';}, 2000);
				} else {
					swal('Hubo un problema.',response.error,'error');
				}
	});
}

function cambiarEstatus(id = ''){
	data = {sus_id:id};
	postAjax('<?= site_url()."/sustitucion/proEstatus" ?>', data, function(response){
		if (response.success != undefined) {
					swal('Se proceso la información',response.success,'info');
					setInterval(function(){ window.location = '<?= site_url()."/sustitucion/index" ?>';}, 2000);
				} else {
					swal('Hubo un problema.',response.error,'error');
				}
	});
}
</script>