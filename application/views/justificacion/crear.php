<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Crear Formato de Justificacion</title>
	</head>
	<body>
		<div class="container mt-5">
			<div class="card">
				<div class="card-header bg-success text-white">
					<h1 class="text-center">Crear Formato de Justificación</h1>
				</div>
				<div class="card-body">
					<?= form_open('justificacion/proCrear',['id' => 'formCrear', 'class' => 'was-validated']);?>
					<!-- <div class="form-group">
						<label for="">Fecha</label>
						<input type="text" class="form-control" disabled value="">
					</div> -->
					<div class="col-lg-4 col-md-4 col-8 form-group">
						<label for="">Matricula</label>
						<input type="text" class="form-control" value="<?= $info->emp_matr_id ?>" required readonly name="emp_matr_id">
					</div>
					<div class="col-lg-4 col-md-4 col-8 form-group">
							<label >Fecha de Justificación</label>
							<input type="text" class="form-control" name="jus_fech">
					</div>
					<div class="form-group">
						<label for="">Motivo:</label>
						<input type="text" class="form-control" name="jus_moti" required>
					</div>
					<div class="text-center">
						<button type="submit" class="btn bg-success btn-lg text-white"><i class="fa fa-check"></i>Enviar</button>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<script type="text/javascript">

$(document).ready(function() {

		$('#formCrear').on('submit', function(event) {
			event.preventDefault();
			var data = $(this).serialize();
			postAjax($(this).attr('action'), data, function(response){
				if (response.success != undefined) {
					swal('Se proceso la información',response.success,'info');
					setInterval(function(){ window.location = '<?= site_url()."/justificacion/index" ?>';}, 3000);
				} else {
					swal('Hubo un problema.',response.error,'error');
				}
				
			});
		});
	});
	
</script>
