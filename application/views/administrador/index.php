<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Perfil Administrador</title>
	</head>
	<body>
		<div class="container-fluid mt-5">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="perfil-tab" data-toggle="tab" href="#perfil" role="tab" aria-controls="perfil" aria-selected="true">Información Administrador</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pass-tab" data-toggle="tab" href="#pass" role="tab" aria-controls="pass" aria-selected="false">Cambiar Contraseña</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="empledos-tab" data-toggle="tab" href="#empledos" role="tab" aria-controls="empledos" aria-selected="false">Empleados</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="catalogos-tab" data-toggle="tab" href="#catalogos" role="tab" aria-controls="catalogos" aria-selected="false">Catalogos</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="perfil" role="tabpanel" aria-labelledby="perfil-tab">
					<?php $this->load->view('administrador/perfil'); ?>
				</div>
				<div class="tab-pane fade" id="pass" role="tabpanel" aria-labelledby="pass-tab">
					<?php $this->load->view('administrador/change_pass'); ?>
				</div>
				<div class="tab-pane fade" id="empledos" role="tabpanel" aria-labelledby="empledos-tab">
					<?php $this->load->view('administrador/empleados'); ?>
				</div>
				<div class="tab-pane fade" id="catalogos" role="tabpanel" aria-labelledby="catalogos-tab">
					<?php $this->load->view('administrador/catalogo'); ?>
				</div>

			</div>
		</div>
	</body>
</html>