<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Crear Formato Sustitución</title>
	</head>
	<body>
		<div class="container mt-5">
			<div class="card">
				<div class="card-header bg-success text-white">
					<h1 class="text-center">Formato Sustitución</h1>
				</div>
				<div class="card-body">
					<?= form_open('sustitucion/proCrear', ['id'=> 'formCrear', 'class'=> 'was-validated']); ?>
					<h3 class="text-center"><hr>Empleado sustituido<hr></h3>
					<div class="form-group">
						<label for="">Matricula:</label>
						<input type="text" class="form-control" required maxlength="20" value="<?= $info->emp_matr_id ?>" readonly id="emp_matr_id">
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-12">
							<div class="form-group">
								<label for="">Nombre(s):</label>
								<input readonly type="text" class="form-control" maxlength="50" value="<?= $info->emp_nom?>">
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<div class="form-group">
								<label for="">Apellido Paterno:</label>
								<input readonly type="text" class="form-control" maxlength="50" value="<?= $info->emp_ape_pat ?>">
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<div class="form-group">
								<label for="">Apellido Materno:</label>
								<input readonly type="text" class="form-control" maxlength="50" value="<?= $info->emp_ape_mat ?>">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="">Adscripción:</label>
						<input readonly type="text" class="form-control" maxlength="200" value="<?= $info->emp_adsc ?>">
					</div>
					<div class="form-group">
						<label for="">Categoria:</label>
						<?php $result = $this->mcategoria->get(['cat_id' => $info->cat_id], 1); ?>
						<input type="text" value="<?= $result->cat_desc ?>" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label for="">Departamento:</label>
						<?php $result = $this->mdepartamento->get(['dep_id' => $info->dep_id], 1); ?>
						<input type="text" value="<?= $result->dep_desc ?>" class="form-control" readonly>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-12">
							<label for="">Horario Entrada:</label>
							<input type="text" class="form-control" readonly value="<?= $info->emp_entr ?>">
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<label for="">Horario Salida:</label>
							<input type="text" class="form-control" readonly value="<?= $info->emp_sali ?>">
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<label for="">Turno:</label>
							<input type="text" class="form-control" readonly value="<?= $info->emp_turn ?>">
						</div>
						
					</div>
					<div class="form-group">
						<label for="">Dias descanso</label>
						<input type="text" class="form-control" value="<?= $info->emp_dia_desc ?>" readonly>
					</div>
					<h3 class="text-center"><hr>Empleado sustituto<hr></h3>
					<div class="form-group">
						<label for="">Matricula:</label>
						<input type="text" class="form-control" required maxlength="20" id="sus_emp" onfocusout="obtainInfo(this)">
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-12">
							<div class="form-group">
								<label for="">Nombre(s):</label>
								<input readonly type="text" class="form-control" maxlength="50" id="sus_emp_nom">
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<div class="form-group">
								<label for="">Apellido Paterno:</label>
								<input readonly type="text" class="form-control" maxlength="50" id="sus_emp_ape_pat">
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<div class="form-group">
								<label for="">Apellido Materno:</label>
								<input readonly type="text" class="form-control" maxlength="50" id="sus_emp_ape_mat">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="">Adscripción:</label>
						<input readonly type="text" class="form-control" maxlength="200" id="sus_emp_adsc">
					</div>
					<div class="form-group">
						<label for="">Categoria:</label>
						<input type="text" disabled class="form-control" id="sus_emp_cat">
					</div>
					<div class="form-group">
						<label for="">Departamento:</label>
						<input type="text" disabled class="form-control" id="sus_emp_dep">
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-12">
							<label for="">Horario Entrada:</label>
							<input type="text" class="form-control" readonly id="sus_emp_entr">
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<label for="">Horario Salida:</label>
							<input type="text" class="form-control" readonly id="sus_emp_sali">
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<label for="">Turno:</label>
							<input type="text" class="form-control" readonly id="sus_emp_turn">
						</div>
					</div>
					<div class="form-group">
						<label for="">Dias descanso</label>
						<input type="text" class="form-control" id="sus_emp_dias_desc" readonly>
					</div>
					<h3 class="text-center"><hr>Información de la sustitución<hr></h3>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-12 form-group">
							<label >Fecha de sustitución</label>
							<input type="text" class="form-control" id="sus_fech">
						</div>
						<div class="col-lg-2 col-md-2 col-6 form-group">
							<label>Hora inicio: </label>
							<select class="form-control" id="sus_hora_ini">
								<option disabled selected>hora</option>
								<?php foreach ($time as $value): ?>
									<option value="<?= $value ?>"><?= $value ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="col-lg-2 col-md-2 col-12">
							<label>Hora fin: </label>
							<select class="form-control" id="sus_hora_fin">
								<option disabled selected>hora</option>
								<?php foreach ($time as $value): ?>
									<option value="<?= $value ?>"><?= $value ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<label>Turno: </label>
							<select class="form-control" id="sus_turn">
								<option disabled selected>Elija un opción</option>
								<option value="Matutino">Matutino</option>
								<option value="Vespertino">Vespertino</option>
								<option value="Mixto">Mixto</option>
							</select>
						</div>
					</div>
					<div class="row">
						
					</div>
					<div class="text-center">
						<button type="submit" id="send" class="btn bg-success text-white" disabled><i class="fa fa-check"></i> Generar</button>
					</div>
					<?= form_close(); ?>
				</div>
			</div>
		</div>
	</body>
</html>
<script>
$(document).ready(function() {
	$( "#sus_fech" ).datepicker({dateFormat: 'yy-mm-dd' });
	$("#formCrear").on('submit', function(event) {
		event.preventDefault();
		/* Act on the event */
		var data = {
			emp_matr_id: $('#emp_matr_id').val(),
			sus_emp: $('#sus_emp').val(),
			sus_fech:$('#sus_fech').val(),
			sus_hora:$('#sus_hora_ini').val()+'-'+$('#sus_hora_fin').val(),
			sus_turn: $('#sus_turn').val()
		};
		console.log(data);
		postAjax($(this).attr('action'), data, function(response){
			if (response.success != undefined) {
				swal('Se proceso la información',response.success,'info');
				/*setInterval(function(){ window.location = '<?= site_url()."/administrador/index" ?>';}, 3000);*/
			} else {
				swal('Hubo un problema.',response.error,'error');
			}
		});		
	});
});
function obtainInfo(matricula = ''){
data = {sus_emp:$('#sus_emp').val()};
postAjax('<?= site_url()."/empleado/info" ?>', data, function(response){
if (response.info != undefined) {
console.log(response.info);
console.log(response.cat);
console.log(response.dep);
$('#sus_emp_nom').val(response.info.emp_nom);
$('#sus_emp_ape_pat').val(response.info.emp_ape_pat);
$('#sus_emp_ape_mat').val(response.info.emp_ape_mat);
$('#sus_emp_adsc').val(response.info.emp_adsc);
$('#sus_emp_dias_desc').val(response.info.emp_dia_desc);
$('#sus_emp_dep').val(response.dep);
$('#sus_emp_cat').val(response.cat);
$('#sus_emp_entr').val(response.info.emp_entr);
$('#sus_emp_sali').val(response.info.emp_sali);
$('#sus_emp_turn').val(response.info.emp_turn);
$('#send').removeAttr('disabled');
}else{
$('#sus_emp_nom').val('');
$('#sus_emp_ape_pat').val();
$('#sus_emp_ape_mat').val('');
$('#sus_emp_adsc').val('');
$('#sus_emp_dias_desc').val('');
$('#sus_emp_dep').val('');
$('#sus_emp_cat').val('');
$('#sus_emp_entr').val('');
$('#sus_emp_sali').val('');
$('#sus_emp_turn').val('');
$('#send').attr('disabled', '');
}
});
}
</script>