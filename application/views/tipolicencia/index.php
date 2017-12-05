<div class="container mt-5">
	<div class="card">
		<div class="card-header bg-success text-white">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-6">
					<h1 class="text-center">Tipo Licencias</h1>
				</div>
				<div class="col-lg-6 col-md-6 col-6 text-right">
					<button class="btn bg-success btn-lg text-white" onclick="tipoCrear()">Crear</button>
				</div>
			</div>
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
						<td><button onclick="eliminartipo('<?= $value->tipo_lic_id?>')" class="btn btn-danger" <?= $borrar ?>>Eliminar</button></td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="crearTipo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Crear Tipo Licencia</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('tipolicencia/proCrear', ['id'=> 'formCrearTipo', 'class'=> 'was-validated']); ?>
				<div class="form-group">
					<label for="">Tipo Licencia</label>
					<input type="text" class="form-control" name="tipo_lic_desc">
				</div>
				<div class="text-center">
					<button type="submit" class="btn bg-success"><i class="fa fa-check"></i> Crear</button>
				</div>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function() {
		$('#formCrearTipo').on('submit', function(event) {
			event.preventDefault();
			var data = $(this).serialize();
			$('#crearTipo').modal('hide');
			postAjax($(this).attr('action'), data, function(response){
				if (response.success != undefined) {
					swal('Se proceso la información',response.success,'success');
setInterval(function(){ window.location = '<?= site_url()."/administrador/index" ?>';}, 2000);
} else {
swal('Hubo un problema.',response.error,'error');
}
});
});
});
function tipoCrear(){
$('#crearTipo').modal('show');
}
function editartipo(elem, id){
var cat_desc = $(elem).parent().prev().children().val();
data = {
tipo_lic_id:id,
tipo_lic_desc:cat_desc
};
console.log(data);
postAjax('<?= site_url()."/tipolicencia/proEditar" ?>', data, function(response){
if (response.success != undefined) {
swal('Se proceso la información',response.success,'info');
setInterval(function(){ window.location = '<?= site_url()."/administrador/index" ?>';}, 2000);
} else {
swal('Hubo un problema.',response.error,'error');
}
});
}
function eliminartipo(id){
data = {tipo_lic_id:id};
postAjax('<?= site_url()."/tipolicencia/proEliminar" ?>', data, function(response){
if (response.success != undefined) {
swal('Se proceso la información',response.success,'warning');
setInterval(function(){ window.location = '<?= site_url()."/administrador/index" ?>';}, 2000);
} else {
swal('Hubo un problema.',response.error,'error');
}
});
}
</script>