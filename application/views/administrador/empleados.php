<div class="container mt-5">
	<div class="card">
		<div class="card-header bg-success text-white">
			<h1 class="text-center">Empleados</h1>
		</div>
		<div class="card-body">	
			<table class="table table-responsive">
				<thead>
					<th>Matricula</th>
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Adscripción</th>
					<th>Categoria</th>
					<th>Departamento</th>
					<th>Status</th>
					<th>Administrador</th>
					<th>Editar</th>
				</thead>
				<tbody>
					<?php foreach ($empleados as $value): ?>
						<tr>
							<td><?= $value->emp_matr_id ?></td>
							<td><?= $value->emp_nom ?></td>
							<td><?= $value->emp_ape_pat ?></td>
							<td><?= $value->emp_ape_mat ?></td>
							<td><?= $value->emp_adsc ?></td>
							<?php $categoria = $this->mcategoria->get(['cat_id' => $value->cat_id ], 1)?>
							<td><?= $categoria->cat_desc ?></td>
							<?php $depto = $this->mdepartamento->get(['dep_id' => $value->dep_id ], 1)?>
							<td><?= $depto->dep_desc ?></td>
							<?php $status = ($value->emp_est == 1) ? 'Activo' : 'Baja'; ?>
							<td><?= $status ?></td>
							<?php $admin = (!empty($this->madministrador->get(['usu_id' => $value->usu_id], 1))) ? 'Si' : 'No'; ?>
							<td><button class="btn bg-success text-white" onclick="administrador('<?= $value->usu_id ?>')"><?= $admin ?></button></td>
							<td><a href="<?= site_url().'/empleado/editar/'.$value->emp_matr_id ?>" class="btn btn-info">Editar</a></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	
</script>