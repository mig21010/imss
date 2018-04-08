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
				<span>Verifica que tu contraseña tenga más de 7 caracteres</span>
			</div>
			<div class="form-group">
				<label for="">Confirmar Contraseña:</label>
				<input type="password" class="form-control" required name="usu_pass_c" id="usu_pass_c" maxlength="20">
				<span>Verifica la contraseña es incorrecta</span>
			</div>
			<div class="text-center">
				<button type="submit" id="submit" class="btn btn-lg bg-success text-white"><i class="fa fa-check"></i>Cambiar</button>
			</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>
<script>
	$("form span").hide();
	$("#usu_pass").keyup(errorMessageEvent).keyup(enableButton);
	$("#usu_pass_c").keyup(matchPass).keyup(enableButton);
	function isPassValid(){
		return $("#usu_pass").val().length > 6;
	}
	function isPassMatching(){
		return $("#usu_pass_c").val() === $("#usu_pass").val();
	}
	function isButtonEnabled()
	{
		return isPassValid() && isPassMatching();
	}
	function errorMessageEvent(){
		if(isPassValid()){
			$(this).next().hide();
		}
		else{
			$(this).next().show();
		}

	}
	function matchPass(){
		if(isPassMatching()){
			$(this).next().hide();
		}
		else{
			$(this).next().show();
		}
	}
	function enableButton(){
		$("#submit").prop("disabled", !isButtonEnabled());
		if (!isButtonEnabled()) {
			$("#submit").css({backgroundColor: "#D3D3D3", color: "#000"});
		}
		else{
			$("#submit").css({backgroundColor: "#2F558E", color: "#FFF"});
		}
	}
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