<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
		<a class="navbar-brand" href="#">Navbar</a>
		<button class="navbar-toggler btn btn-success text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<i class="fa fa-bars"></i>
		</button>
		<div class="collapse navbar-collapse " id="navbarSupportedContent">
			<ul class="nav nav-pills ml-auto" id="pills-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active text-white" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
				</li>
				<?php if (!$this->session->has_userdata('admin') and !$this->session->has_userdata('emp')): ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Iniciar Sesión
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?= site_url().'/administrador/iniciar_sesion' ?>">Administrador</a>
						<a class="dropdown-item" href="<?= site_url().'/empleado/iniciar_sesion' ?>">Empleado</a>
					</div>
				</li>
				<?php endif ?>
				<?php if ($this->session->has_userdata('emp')): ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Empleado
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<h6 class="dropdown-header">Empleado</h6>
						<a class="dropdown-item" href="<?= site_url().'/empleado/index' ?>">Perfil</a>
						<a class="dropdown-item" href="<?= site_url().'/empleado/index' ?>">Guardias</a>
						<div class="dropdown-divider"></div>
						<h6 class="dropdown-header">Formatos</h6>
						<a class="dropdown-item" href="<?= site_url().'/sustitucion/index' ?>">Formato sustitución</a>
						<a class="dropdown-item" href="<?= site_url().'/pase/index' ?>">Formato pase</a>
						<a class="dropdown-item" href="<?= site_url().'/comision/index' ?>">Formato comisión</a>
						<a class="dropdown-item" href="<?= site_url().'/justificacion/index' ?>">Formato justificación</a>
						<a class="dropdown-item" href="<?= site_url().'/licencia/index' ?>">Formato licencia</a>
						<div class="dropdown-divider"></div>
						<h6 class="dropdown-header">Cerra Sesión</h6>
						<a class="dropdown-item" href="<?= site_url().'/main/close_session' ?>">Cerrar Sesión</a>
					</div>
				</li>
				<?php elseif($this->session->has_userdata('admin')): ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Administrador
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<h6 class="dropdown-header">Administrador</h6>
						<a class="dropdown-item" href="<?= site_url().'/administrador/index' ?>">Perfil</a>
						<div class="dropdown-divider"></div>
						<h6 class="dropdown-header">Registro</h6>
						<a class="dropdown-item" href="<?= site_url().'/administrador/registro' ?>">Registrar Administrador</a>
						<a class="dropdown-item" href="<?= site_url().'/empleado/registro' ?>">Registrar Empleado</a>
						<div class="dropdown-divider"></div>
						<h6 class="dropdown-header">Formatos</h6>
						<a class="dropdown-item" href="<?= site_url().'/sustitucion/index' ?>">Formato sustitución</a>
						<a class="dropdown-item" href="<?= site_url().'/pase/index' ?>">Formato pase</a>
						<a class="dropdown-item" href="<?= site_url().'/comision/index' ?>">Formato comisión</a>
						<a class="dropdown-item" href="<?= site_url().'/justificación/index' ?>">Formato justificación</a>
						<a class="dropdown-item" href="<?= site_url().'/licencia/index' ?>">Formato licencia</a>
						<div class="dropdown-divider"></div>
						<h6 class="dropdown-header">Cerra Sesión</h6>
						<a class="dropdown-item" href="<?= site_url().'/main/close_session' ?>">Cerrar Sesión</a>
					</div>
				</li>
				<?php endif ?>
			</ul>
		</div>
	</div>
</nav>