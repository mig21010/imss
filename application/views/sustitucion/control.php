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
				<div class="row">

					<div class="col-lg-4 col-md-8 col-8">
					<input type="text" name="query" id="query" class="form-control">
				</div>
				<div class="">
					<button  class="btn bg-success text-white">Buscar</button>
				</div>
			
				</div>
				
					<table id="tblsustitucion" class="table table-responsive">
						<thead>
							<th>Número de Sustituciones</th>
							<th>Matrícula</th>
							<th>Nombre</th>
							<th>Apellido Paterno</th>
							<th>Apellido Materno</th>
							<th>Mes de susutitución</th>
							<th>Año de sustitución</th>
						</thead>
						<tbody>
						
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		postAjax('<?= site_url()."/sustitucion/control" ?>',
			'<?php echo $this->security->get_csrf_token_name() ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
		function(data) {

			// alert(data);
			var obj = JSON.parse(data);
			$.each(obj, function(i, item){
				$('#tblsustitucion').append(
					'<tr>'+
					'<td>'+item.num_sust+'</td>'+
					'<td>'+item.emp_matr_id+'</td>'+
					'<td>'+item.month+'</td>'+
					'<td>'+item.year+'</td>'+
					'</tr>'
					);

			});
			
		});
	});
 	
	// $('#tblsustitucion').DataTable({
	// 	'paging':true,
	// 	'info':false,
	// 	'filter':true 

	// });
</script>