<div class="container mt-5">
	<div class="card">
		<div class="card-header bg-success text-white">
			<h1 class="text-center">Informacion Administrador</h1>
		</div>
		<div class="card-body">
			<?= form_open('administrador/proEditar', ['id' => 'formEditar', 'class' => 'was-validated']); ?>
			<div class="form-group">
				<label for="">Matricula:</label>
				<input type="text" class="form-control" required maxlength="20" value="<?= $usuario->emp_matr_id ?>" readonly name="emp_matr_id">
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-4 col-12">
					<div class="form-group">
						<label for="">Nombre(s):</label>
						<input type="text" class="form-control" required name="emp_nom" maxlength="50" value="<?= $usuario->emp_nom?>">
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-12">
					<div class="form-group">
						<label for="">Apellido Paterno:</label>
						<input type="text" class="form-control" required name="emp_ape_pat" maxlength="50" value="<?= $usuario->emp_ape_pat ?>">
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-12">
					<div class="form-group">
						<label for="">Apellido Materno:</label>
						<input type="text" class="form-control" required name="emp_ape_mat" maxlength="50" value="<?= $usuario->emp_ape_mat ?>">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="">Adscripción:</label>
				<input type="text" class="form-control" required name="emp_adsc" maxlength="200" value="<?= $usuario->emp_adsc ?>">
			</div>
			<div class="form-group">
				<label for="">Categoria:</label>
				<select class="form-control" required name="cat_id">
					<option disabled selected>Elija una categoria</option>
					<?php foreach ($categorias as $value): ?>
					<?php $selected = ($value->cat_id == $usuario->cat_id) ? 'selected' : ''; ?>
					<option value="<?= $value->cat_id ?>" <?= $selected ?>><?= $value->cat_desc ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<label for="">Departamento:</label>
				<select class="form-control" required name="dep_id">
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
					<select class="form-control" required name="emp_entr">
						<option disabled selected>Elija un horario</option>
						<?php foreach ($time as $value): ?>
						<?php $selected = ($value.':00' == $usuario->emp_entr) ? 'selected' : ''; ?>
						<option value="<?= $value ?>" <?= $selected ?>><?= $value ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="col-lg-4 col-md-4 col-12">
					<label for="">Horario Salida:</label>
					<select class="form-control" required name="emp_sali">
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
					<?= form_dropdown('emp_turn', $options , $usuario->emp_sali, ["class" => "form-control", 'required' => '']); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="">Dias de descanso:</label>
				<input type="text" class="form-control" name="emp_dia_desc" value="<?= $usuario->emp_dia_desc ?>">
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-lg bg-success text-white"><i class="fa fa-check"></i>Cambiar</button>
			</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {

		$('#formEditar').on('submit', function(event) {
			event.preventDefault();
			var data = $(this).serialize();
			postAjax($(this).attr('action'), data, function(response){
				if (response.success != undefined) {
					swal('Se proceso la información',response.success,'info');
					setInterval(function(){ window.location = '<?= site_url()."/administrador/index" ?>';}, 3000);
				} else {
					swal('Hubo un problema.',response.error,'error');
				}
				
			});
		});
	});
</script>