<div class="container mt-5">
	<div class="card">
		<div class="card-header bg-success text-white">
			<h1 class="text-center">Cambiar Contraseña</h1>
		</div>
		<div class="card-body">	
			<?= form_open('administrador/changePass', ['id'=> 'formChange', 'class'=> 'was-validated'],['usu_id' => $this->session->userdata('admin')]); ?>
			<div class="form-group">
				<label for="">Nueva contraseña:</label>
				<input type="password" class="form-control" required name="usu_pass" id="usu_pass" maxlength="20">
			</div>
			<div class="form-group">
				<label for="">Confirmar Contraseña:</label>
				<input type="password" class="form-control" required name="usu_pass_c" id="usu_pass_c" maxlength="20">
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

		$('#formChange').on('submit', function(event) {
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