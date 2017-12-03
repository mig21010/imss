<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Iniciar sesion administrador</title>
</head>
<body>
	<div class="container mt-5">
		<div class="card">
			<div class="card-header bg-success text-white">
				<h1 class="text-center">Iniciar Sesión Administrador</h1>
			</div>
			<div class="card-body">
				<?= form_open('administrador/proLogin', ['id'=> 'formIni', 'class'=> 'was-validated']); ?>
				<div class="form-group">
					<label>Correo Electrónico:</label>
					<input type="email" class="form-control" name="usu_corr" required>
				</div>
				<div class="form-group">
					<label>Contraseña:</label>
					<input type="password" class="form-control" name="usu_pass" required>
				</div>
				<div class="text-center">
					<button type="submit" class="btn bg-success text-white"><i class="fa fa-check"></i> Iniciar sesión</button>
				</div>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</body>
</html>
<script>
	$(document).ready(function() {

		$('#formIni').on('submit', function(event) {
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