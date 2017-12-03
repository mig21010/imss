<div class="container mt-5">
	<div class="card">
		<div class="card-header bg-success text-white">
			<h1 class="text-center">Tipo Licencias</h1>
		</div>
		<div class="card-body">	
			<table class="table table-responsive">
				<thead>
					<th>Tipo Licencia</th>
					<th>Editar</th>
					<th>Borrar</th>
				</thead>
				<tbody>
					<?php foreach ($tipolicencias as $value): ?>
						<tr>
							<td><input type="text" value="<?= $value->tipo_lic_desc ?>" class="form-control"></td>
							<td><button class="btn btn-info" onclick="editartipo(this, '<?= $value->tipo_lic_id ?>')">Editar</button></td>
							<?php $borrar = (!empty($this->mlicencia->get(['tipo_lic_id'=> $value->tipo_lic_id]))) ? 'disabled' : '';  ?>
							<td><button onclick="eliminartipo(this, '<?= $value->tipo_lic_id?>')" class="btn btn-danger" <?= $borrar ?>>Eliminar</button></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
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
					swal('Se proceso la información',response.success,'success');
					setInterval(function(){ window.location = '<?= site_url()."/administrador/index" ?>';}, 3000);
				} else {
					swal('Hubo un problema.',response.error,'error');
				}
				
			});
		});
	});
</script>