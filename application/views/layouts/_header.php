<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
		<a class="navbar-brand" href="#">Navbar</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>
				<li class="nav-item">
					<a class="nav-link btn btn-success text-white" href="#">Disabled</a>
				</li>
				<?php if ($this->session->has_userdata('empleado')): ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle btn btn-success text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Dropdown
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Perfil</a>
						<a class="dropdown-item" href="#">Guardias</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Formato sustitución</a>
						<a class="dropdown-item" href="#">Formato pase</a>
						<a class="dropdown-item" href="#">Formato comisión</a>
						<a class="dropdown-item" href="#">Formato justificación</a>
						<a class="dropdown-item" href="#">Formato licencia</a>
					</div>
				</li>
				<?php elseif($this->session->has_userdata('administrador')): ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Dropdown
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Perfil</a>
						<a class="dropdown-item" href="#">Catalogos</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Formato sustitución</a>
						<a class="dropdown-item" href="#">Formato pase</a>
						<a class="dropdown-item" href="#">Formato comisión</a>
						<a class="dropdown-item" href="#">Formato justificación</a>
						<a class="dropdown-item" href="#">Formato licencia</a>
					</div>
				</li>
				<?php endif ?>
			</ul>
		</div>
	</div>
</nav>
<script>
	$(document).ready(function() {
		$('.nav-item').on('click', function(event) {
			event.preventDefault();
			/* Act on the event */
			
		});
	});
</script>