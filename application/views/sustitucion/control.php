<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Control de las Sustituciones</title>
	</head>
	<body>
		<div class="container mt-5">
			<div class="card">
				<div class="card-header bg-success text-white">
					<div class="row">
						<div class="col-10">
							<h1 class="text-center">Control de las Susutituciones</h1>
						</div>
					</div>
					
				</div>
				<div class="card-body">
					<table class="table table-responsive">
						<thead>
							<th>Número de Sustituciones</th>
							<th>Empleado</th>
							<th>Fecha de susutitución</th>
							<th>Matricula</th>
						</thead>
						<tbody>
							<?php foreach($query as $value):?> 
							<tr>
								<th><?=$value->num_sust ?></th>
							</tr>
							<?php endforeach ?>
						
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>