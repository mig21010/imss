<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Crear Formato de Pase</title>
	</head>
	<body>
		<div class="container mt-5">
			<div class="card">
				<div class="card-header bg-success text-white">
					<h1 class="text-center">Crear Formato de Pase</h1>
				</div>
				<div class="card-body">
					<?= form_open('pase/proCrear',['id' => 'formCrear', 'class' => 'was-validated']);?>
					<div class="form-group">
						<label for="">Fecha</label>
						<input type="text" class="form-control" disabled value="<?= date('d-m-y') ?>">
					</div>
					<div class="form-group">
						<label for="">Matricula</label>
						<input type="text" class="form-control" value="<?= $usuario->emp_matr_id ?>" required readonly name="emp_matr_id">
					</div>
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label for="">Horario</label>
								<select name="pas_hora" class="form-control" required>
									<option disabled selected>Elija un horario</option>
									<option value="0">De entrada</option>
									<option value="1">Intermedio</option>
									<option value="2">De Salida</option>
								</select>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label for="">Asunto</label>
								<select name="pas_asun" class="form-control" required>
									<option disabled selected>Elija un asunto</option>
									<option value="0">Particular</option>
									<option value="1">Oficial</option>
									<option value="2">Medico</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="">Hora de ausencia:</label>
						<select name="pas_hora_ini" class="form-control" required>
							<option disabled selected>Elija una hora</option>
							<?php foreach ($time as $value): ?>
							<option value="<?= $value ?>"><?= $value ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Para ocurrir a:</label>
						<input type="text" class="form-control" name="pas_acti" required>
					</div>
					<div class="form-group">
						<label for="">Motivo:</label>
						<input type="text" class="form-control" name="pas_moti" required>
					</div>
					<div class="text-center">
						<button type="submit" class="btn bg-success btn-lg text-white"><i class="fa fa-check"></i>Enviar</button>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<script>
	$(document).ready(function() {

		$('#formCrear').on('submit', function(event) {
			event.preventDefault();
			var data = $(this).serialize();
			postAjax($(this).attr('action'), data, function(response){
				if (response.success != undefined) {
					swal('Se proceso la información',response.success,'info');
					setInterval(function(){ window.location = '<?= site_url()."/pase/index" ?>';}, 3000);
				} else {
					swal('Hubo un problema.',response.error,'error');
				}
				
			});
		});
	});
</script>