<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Crear Formato de Licencia</title>
	</head>
	<body>
		<div class="container mt-5">
			<div class="card">
				<div class="card-header bg-success text-white">
					<h1 class="text-center">Crear Formato de Licencia</h1>
				</div>

				<div class="card-body">
					
					<?= form_open('licencia/proCrear',['id' => 'formCrear', 'class' => 'was-validated']);?>

					
					<div class="row">
						<div class="col-lg-4 col-md-4 col-12">
						<label for="">Matricula</label>
						<input type="text" class="form-control" value="<?= $info->emp_matr_id ?>" required readonly name="emp_matr_id">
					</div>
					<div class="col-lg-4 col-md-4 col-12">
							<label >Fecha de Inicio</label>
							<input type="date" class="form-control" name="lic_fech_ini" id="lic_fech_ini" onkeyup="calcular()" required>
					</div>
					<div class="col-lg-4 col-md-4 col-12">
							<label >Fecha de Fin</label>
							<input type="date" class="form-control" name="lic_fech_fin" id="lic_fech_fin" onkeyup="calcular()" required>
					</div>
						
					</div>
					<br>
					<div class="text-left">
						<button type="submit" class="btn bg-info btn-lg text-white" id="calcular"><i class="fa fa-calculator"></i>Calcular días</button>
					</div>
					<br>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-12 form-group">
						<label >Fecha de Solicitud</label>
						<input type="date" class="form-control" name="lic_fech_sol">
						</div>
						<div class="col-lg-4 col-md-4 col-12 form-group">
						<label for="">Total de días:</label>
							<input type="text" name="lic_tot_dias" id="lic_tot_dias" class="form-control" required readonly>
							<span id="lic_tot_dias"></span>
						</div>
					</div>

					<div class="form-group">
						<label for="">Tipo licencia:</label>
						
							
							<?php foreach ($tipo as $value): ?>
							<br><input type="radio"  name="tipo_lic_id" id="tipo_lic_id" value="<?= $value->tipo_lic_id ?>"><?= $value->tipo_lic_desc ?></input>
							<?php endforeach ?>
						
					</div>
					
					<div class="form-group">
						<label for="">Motivo:</label>
						<input type="text" class="form-control" name="lic_moti" required>
					</div>
					<div class="text-center">
						<button type="submit" id="enviar" class="btn bg-success btn-lg text-white"><i class="fa fa-check"></i>Enviar</button>
					</div>
					
				</div>
				</div>
			</div>
		</div>
	</body>
</html>
<script type="text/javascript">
	
	$("input[type=radio]").attr('disabled', true);
		var botonCalcular = $('#calcular');
		botonCalcular.click(function() {
				
				var date1 = moment($("#lic_fech_ini").val());
				var date2 = moment($("#lic_fech_fin").val());
				var days = date2.diff(date1,"days");
				$("#lic_tot_dias").val(days);
				$("input[type=radio]").attr('disabled', false);
				// $("input[name='tipo_lic_id']").val("[4]").prop('checked',true);  
				$('input:radio[name=tipo_lic_id]:checked').val([0]);
				// $("input[name=tipo_lic_id][value='[0]']").prop("checked",true);
				});	
			$("input[name=tipo_lic_id]").change(function () {

			if($(this).val()== 1 && $("#lic_tot_dias").val()>3 && $(this).attr('checked', true)){
				sweetAlert('Es una licencia de 3 días con sueldo', 'Vuelve a intentarlo', 'error');
				$('#enviar').attr("disabled", true);
			}else if($(this).val()== 2 && $("#lic_tot_dias").val()>3 && $(this).attr('checked', true)){
				sweetAlert('Es una licencia de 3 días sin sueldo', 'Vuelve a intentarlo', 'error');
				$('#enviar').attr("disabled", true);
			}else if($(this).val()== 3 && $("#lic_tot_dias").val()>60 && $(this).attr('checked', true)){
				sweetAlert('Es una licencia de 4 días sin sueldo', 'Vuelve a intentarlo', 'error');
				$('#enviar').attr("disabled", true);
			}else if($(this).val()== 4 && $("#lic_tot_dias").val()<0 && $(this).attr('checked', true)){
				sweetAlert('Es una licencia de 60 días sin sueldo', 'Vuelve a intentarlo', 'error');
				$('#enviar').attr("disabled", true);
			}else if($("#lic_tot_dias").val()<0)
			{
				$('#enviar').attr("disabled", true);
				sweetAlert('No se admiten numeros negativos', 'Vuelve a intentarlo', 'error');
			}else if($("#lic_tot_dias").val()>0)
			{
				$('#enviar').attr("disabled", false);

			}else{
				$('#enviar').attr("disabled", false);
			}

			});


		
		$(document).ready(function() {
		
		$('#formCrear').on('submit', function(event) {
			event.preventDefault();
			var data = $(this).serialize();
			postAjax($(this).attr('action'), data, function(response){
				if (response.success != undefined) {
					swal('Se proceso la información',response.success,'info');
					setInterval(function(){ window.location = '<?= site_url()."/licencia/index" ?>';}, 3000);
				} else {
					swal('Hubo un problema.',response.error,'error');
				}
				
			});
		});
	});
	
</script>