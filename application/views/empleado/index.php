<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Perfil Empleado</title>
	</head>
	<body>
		<div class="container mt-5">
			<div class="card">
				<div class="card-header bg-success text-white">
					<h1 class="text-center">Informacion del Empleado</h1>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label for="">Matricula:</label>
						<input type="text" class="form-control" required readonly maxlength="20" value="<?= $usuario->emp_matr_id ?>" readonly name="emp_matr_id">
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-12">
							<div class="form-group">
								<label for="">Nombre(s):</label>
								<input type="text" class="form-control" required readonly name="emp_nom" maxlength="50" value="<?= $usuario->emp_nom?>">
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<div class="form-group">
								<label for="">Apellido Paterno:</label>
								<input type="text" class="form-control" required readonly name="emp_ape_pat" maxlength="50" value="<?= $usuario->emp_ape_pat ?>">
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<div class="form-group">
								<label for="">Apellido Materno:</label>
								<input type="text" class="form-control" required readonly name="emp_ape_mat" maxlength="50" value="<?= $usuario->emp_ape_mat ?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="">Adscripción:</label>
						<input type="text" class="form-control" required readonly name="emp_adsc" maxlength="200" value="<?= $usuario->emp_adsc ?>">
					</div>
					<div class="form-group">
						<label for="">Categoria:</label>
						<select class="form-control" required readonly name="cat_id">
							<option disabled selected>Elija una categoria</option>
							<?php foreach ($categorias as $value): ?>
							<?php $selected = ($value->cat_id == $usuario->cat_id) ? 'selected' : ''; ?>
							<option value="<?= $value->cat_id ?>" <?= $selected ?>><?= $value->cat_desc ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Departamento:</label>
						<select class="form-control" required readonly name="dep_id" disabled>
							<option disabled selected>Elija un Departamento</option>
							<?php foreach ($departamentos as $value): ?>
							<?php $selected = ($value->dep_id == $usuario->dep_id) ? 'selected' : ''; ?>
							<option value="<?= $value->dep_id ?>" <?= $selected ?>><?= $value->dep_desc ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-12">
							<label for="">Horario Entrada:</label>
							<select class="form-control" required readonly name="emp_entr" disabled>
								<option disabled selected>Elija un horario</option>
								<?php foreach ($time as $value): ?>
								<?php $selected = ($value.':00' == $usuario->emp_entr) ? 'selected' : ''; ?>
								<option value="<?= $value ?>" <?= $selected ?>><?= $value ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<label for="">Horario Salida:</label>
							<select class="form-control" required readonly name="emp_sali" disabled>
								<option disabled selected>Elija un horario</option>
								<?php foreach ($time as $value): ?>
								<?php $selected = ($value.':00' == $usuario->emp_sali ) ? 'selected' : ''; ?>
								<option value="<?= $value ?>" <?= $selected ?>><?= $value ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<label for="">Turno:</label>
							<?php $options = array(
							'Matutino' => 'Matutino',
							'Vespertino' => 'Vespertino',
							'Mixto' => 'Mixto',
							); ?>
							<?= form_dropdown('emp_turn', $options , $usuario->emp_sali, ["class" => "form-control", 'readonly' => '', 'disabled' => '']); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="">Dias de descanso:</label>
						<input type="text" class="form-control" name="emp_dia_desc" value="<?= $usuario->emp_dia_desc ?>" readonly>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>