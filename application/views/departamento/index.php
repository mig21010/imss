<div class="container mt-5">
	<div class="card">
		<div class="card-header bg-success text-white">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-6">
					<h1 class="text-center">DEpartamentos</h1>
				</div>
				<div class="col-lg-6 col-md-6 col-6 text-right">
					<button class="btn bg-success btn-lg text-white" onclick="depcrear()">Crear</button>
				</div>
			</div>
		</div>
		<div class="card-body">	
			<table class="table table-responsive">
				<thead>
					<th>Departamento</th>
					<th>Editar</th>
					<th>Borrar</th>
				</thead>
				<tbody>
					<?php foreach ($departamentos as $value): ?>
						<tr>
							<td><input type="text" value="<?= $value->dep_desc ?>" class="form-control"></td>
							<td><button class="btn btn-info" onclick="editardep(this, '<?= $value->dep_id ?>')">Editar</button></td>
							<?php $borrar = (!empty($this->mempleado->get(['dep_id'=> $value->dep_id]))) ? 'disabled' : '';  ?>
							<td><button onclick="eliminardep('<?= $value->dep_id ?>')" class="btn btn-danger" <?= $borrar ?>>Eliminar</button></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="crearDep" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Crear Departamento</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('departamento/proCrear', ['id'=> 'formCrearDep', 'class'=> 'was-validated']); ?>
				<div class="form-group">
					<label for="">Departamento</label>
					<input type="text" class="form-control" name="dep_desc">
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
		$('#formCrearDep').on('submit', function(event) {
			event.preventDefault();
			var data = $(this).serialize();
			$('#crearDep').modal('hide');
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
function depcrear(){
$('#crearDep').modal('show');
}
function editardep(elem, id){
var cat_desc = $(elem).parent().prev().children().val();
data = {
dep_id:id,
dep_desc:cat_desc
};
console.log(data);
postAjax('<?= site_url()."/departamento/proEditar" ?>', data, function(response){
if (response.success != undefined) {
swal('Se proceso la información',response.success,'info');
setInterval(function(){ window.location = '<?= site_url()."/administrador/index" ?>';}, 2000);
} else {
swal('Hubo un problema.',response.error,'error');
}
});
}
function eliminardep(id){
data = {dep_id:id};
postAjax('<?= site_url()."/departamento/proEliminar" ?>', data, function(response){
if (response.success != undefined) {
swal('Se proceso la información',response.success,'warning');
setInterval(function(){ window.location = '<?= site_url()."/administrador/index" ?>';}, 2000);
} else {
swal('Hubo un problema.',response.error,'error');
}
});
}
</script>