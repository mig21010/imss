<div class="container-fluid">
	<div class="row">
		<div class="col-2">
			<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
				<a class="nav-link active" id="v-pills-categoria-tab" data-toggle="pill" href="#v-pills-categoria" role="tab" aria-controls="v-pills-categoria" aria-selected="true">Categoria</a>
				<a class="nav-link" id="v-pills-Departamento-tab" data-toggle="pill" href="#v-pills-Departamento" role="tab" aria-controls="v-pills-Departamento" aria-selected="false">Departamento</a>
				<a class="nav-link" id="v-pills-Tipo-licencia-tab" data-toggle="pill" href="#v-pills-Tipo-licencia" role="tab" aria-controls="v-pills-Tipo-licencia" aria-selected="false">Tipo licencia</a>
			</div>
		</div>
		<div class="col-10">
			<div class="tab-content" id="v-pills-tabContent">
				<div class="tab-pane fade show active" id="v-pills-categoria" role="tabpanel" aria-labelledby="v-pills-categoria-tab">
					<?php $this->load->view('categoria/index'); ?>
				</div>
				<div class="tab-pane fade" id="v-pills-Departamento" role="tabpanel" aria-labelledby="v-pills-Departamento-tab">
					<?php $this->load->view('departamento/index'); ?>
				</div>
				<div class="tab-pane fade" id="v-pills-Tipo-licencia" role="tabpanel" aria-labelledby="v-pills-Tipo-licencia-tab">
					<?php $this->load->view('tipolicencia/index'); ?>
				</div>
			</div>
		</div>
	</div>
	
	
</div>