<div class="container mt-5">
	<div class="card">
		<div class="card-header bg-success text-white">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-6">
					<h1 class="text-center">Categorias</h1>		
				</div>
				<div class="col-lg-6 col-md-6 col-6 text-right">
					<button class="btn bg-success btn-lg text-white" onclick="catCrear()">Crear</button>
				</div>
			</div>
			
		</div>
		<div class="card-body">	
			<table class="table table-responsive">
				<thead>
					<th>Categoria</th>
					<th>Editar</th>
					<th>Borrar</th>
				</thead>
				<tbody>
					<?php foreach ($categorias as $value): ?>
						<tr>
							<td><input type="text" value="<?= $value->cat_desc ?>" class="form-control"></td>
							<td><button class="btn btn-info" onclick="editarCat(this, '<?= $value->cat_id ?>')">Editar</button></td>
							<?php $borrar = (!empty($this->mempleado->get(['cat_id'=> $value->cat_id]))) ? 'disabled' : '';  ?>
							<td><button onclick="eliminarCat('<?= $value->cat_id ?>')" class="btn btn-danger" <?= $borrar ?>>Eliminar</button></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="crearCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open('categoria/proCrear', ['id'=> 'formCrearCat', 'class'=> 'was-validated']); ?>
        <div class="form-group">
        	<label for="">Nombre Categoria</label>
        	<input type="text" class="form-control" name="cat_desc">
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
		$('#formCrearCat').on('submit', function(event) {
			event.preventDefault();
			var data = $(this).serialize();
			$('#crearCategoria').modal('hide');
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

	function catCrear(){
		$('#crearCategoria').modal('show');
	}

	function editarCat(elem, cat_id){
		var cat_desc = $(elem).parent().prev().children().val();
		data = {
			cat_id:cat_id,
			cat_desc:cat_desc
		};
		console.log(data);
		postAjax('<?= site_url()."/categoria/proEditar" ?>', data, function(response){
		if (response.success != undefined) {
					swal('Se proceso la información',response.success,'info');
					setInterval(function(){ window.location = '<?= site_url()."/administrador/index" ?>';}, 2000);
				} else {
					swal('Hubo un problema.',response.error,'error');
				}
		});
	}

	function eliminarCat(cat_id){
		data = {cat_id:cat_id};
		postAjax('<?= site_url()."/categoria/proEliminar" ?>', data, function(response){
		if (response.success != undefined) {
					swal('Se proceso la información',response.success,'warning');
					setInterval(function(){ window.location = '<?= site_url()."/administrador/index" ?>';}, 2000);
				} else {
					swal('Hubo un problema.',response.error,'error');
				}
		});
	}
</script>