<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Registro Empleado</title>
	</head>
	<body>
		<div class="container mt-5">
			<div class="card">
				<div class="card-header bg-success text-white">
					<h1 class="text-center">Registrar Empleado</h1>
				</div>
				<div class="card-body">
					<?= form_open('empleado/proRegistro', ['id' => 'formAdmin', 'class' => 'was-validated']); ?>
					<div class="form-group">
						<label for="">Matricula:</label>
						<input type="text" class="form-control" required name="emp_matr_id" maxlength="20">
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-12">
							<div class="form-group">
								<label for="">Nombre(s):</label>
								<input type="text" class="form-control" required name="emp_nom" maxlength="50">
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<div class="form-group">
								<label for="">Apellido Paterno:</label>
								<input type="text" class="form-control" required name="emp_ape_pat" maxlength="50">
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<div class="form-group">
								<label for="">Apellido Materno:</label>
								<input type="text" class="form-control" required name="emp_ape_mat" maxlength="50">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="">Adscripción:</label>
						<input type="text" class="form-control" required name="emp_adsc" maxlength="200">
					</div>
					<div class="form-group">
						<label for="">Categoria:</label>
						<select class="form-control" required name="cat_id">
							<option disabled selected>Elija una categoria</option>
							<?php foreach ($categorias as $value): ?>
							<option value="<?= $value->cat_id ?>"><?= $value->cat_desc ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Departamento:</label>
						<select class="form-control" required name="dep_id">
							<option disabled selected>Elija un Departamento</option>
							<?php foreach ($departamentos as $value): ?>
							<option value="<?= $value->dep_id ?>"><?= $value->dep_desc ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-12">
							<label for="">Horario Entrada:</label>
							<select class="form-control" required name="emp_entr">
								<option disabled selected>Elija un horario</option>
								<?php foreach ($time as $value): ?>
								<option value="<?= $value ?>"><?= $value ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<label for="">Horario Salida:</label>
							<select class="form-control" required name="emp_sali">
								<option disabled selected>Elija un horario</option>
								<?php foreach ($time as $value): ?>
								<option value="<?= $value ?>"><?= $value ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<label for="">Turno:</label>
							<select class="form-control" required name="emp_turn">
								<option disabled selected>Elija un horario</option>
								<option value="Matutino">Matutino</option>
								<option value="Vespertino">Vespertino</option>
								<option value="Mixto">Mixto</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="">Dias de descanso:</label>
						<input type="text" class="form-control" name="emp_dia_desc">
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-12">
							<div class="form-group">
								<label for="">Correo Electrónico:</label>
								<input type="email" class="form-control" required name="usu_corr" maxlength="100">
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<div class="form-group">
								<label for="">Contraseña:</label>
								<input type="password" class="form-control" required name="usu_pass" id="usu_pass" maxlength="20">
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<div class="form-group">
								<label for="">Confirmar Contraseña:</label>
								<input type="password" class="form-control" required name="usu_pass_c" id="usu_pass_c" maxlength="20">
							</div>
						</div>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-lg bg-success text-white"><i class="fa fa-check"></i> Enviar</button>
					</div>
					<?= form_close(); ?>
				</div>
			</div>
		</div>
	</body>
</html>
<script>
	$(document).ready(function() {

		$('#formAdmin').on('submit', function(event) {
			event.preventDefault();
			var data = $(this).serialize();
			postAjax($(this).attr('action'), data, function(response){
				if (response.success != undefined) {
					swal('Se proceso la información',response.success,'success');
					setInterval(function(){ window.location = '<?= site_url()."/administrador/index" ?>';}, 3000);
				} else {
					swal('Hubo un problema.',response.error,'error');
				}
				
			});
		});
	});
</script>