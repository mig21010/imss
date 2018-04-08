<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Guardias del Empleado</title>
	</head>
	<body>
		<div class="container mt-5">
			<div class="card">
				<div class="card-header bg-success text-white">
					<h1 class="text-center">Guardias del Empleado</h1>
				</div>
				<div class="card-body">
					<table class="table table-responsive">
						<thead>
							<th>Empleado Sustituido</th>
							<th>Departamento</th>
							<th>Categoria</th>
							<th>Fecha de sustitución</th>
							<th>Horario</th>
							<th>Turno</th>
							<th>PDF</th>
						</thead>
						<tbody>
							<?php if (!empty($guardias)): ?>
							<?php foreach ($guardias as $value): ?>
								<tr>
									<?php $emp = $this->mempleado->get(['emp_matr_id'=>$value->emp_matr_id],1); ?>
									<td><?= $emp->emp_nom.' '.$emp->emp_ape_pat.' '.$emp->emp_ape_mat ?></td>
									<?php $dep = $this->mdepartamento->get(['dep_id'=>$emp->dep_id],1); ?>
									<td><?= $dep->dep_desc ?></td>
									<?php $cat = $this->mcategoria->get(['cat_id'=>$emp->cat_id],1); ?>
									<td><?= $cat->cat_desc ?></td>
									<td><?= $value->sus_fech ?></td>
									<td><?= $value->sus_hora ?></td>
									<td><?= $value->sus_turn ?></td>
									<td><a class="btn btn-danger" href="<?= site_url().'/sustitucion/pdf/'.$value->sus_id ?>"><i class="fa fa-file-pdf-o"></i> PDF</a></td>
								</tr>		
							<?php endforeach ?>
							<?php endif ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>