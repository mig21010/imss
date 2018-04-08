<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Crear Formato de Comision</title>
	</head>
	<body>
		<div class="container mt-5">
			<div class="card">
				<div class="card-header bg-success text-white">
					<h1 class="text-center">Crear Formato de Comisión</h1>
				</div>
				<div class="card-body">
					
					<?= form_open('comision/proCrear',['id' => 'formCrear', 'class' => 'was-validated']);?>
					<div class="form-group">
						<label for="">Motivo:</label>
						<input type="text" class="form-control" name="com_obje" required >
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-12">
						<label for="">Matricula</label>
						<input type="text" class="form-control" value="<?= $info->emp_matr_id ?>"  readonly name="emp_matr_id" required>
					</div>
					<div class="col-lg-4 col-md-4 col-12">
							<label >Lugar</label>
							<input type="text" class="form-control" name="com_luga" id="com_luga" required>
					</div>
					<div class="col-lg-4 col-md-4 col-12">
							<label >Medio de Transporte</label>
							<select class="form-control" required name="com_medi_tran">
								<option disabled selected>Elija un medio de transporte</option>
								<option value="0">Vehiculo Particular</option>
								<option value="1">Vehiculo Oficial</option>
							</select>
					</div>
						
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-4 col-12 form-group">
						<label >Gastos de alimentacion</label>
						<input type="text"  class="c1 form-control" name="com_ant_alim" id="com_ant_alim" onchange="calcular()" required>
					</div>
					<div class="col-lg-4 col-md-4 col-12">
							<label >Anticipo de pasajes</label>
							<input type="text"  class="c1 form-control" name="com_ant_pasa" id="com_ant_pasa" onchange="calcular()" required>
					</div>
					<div class="col-lg-4 col-md-4 col-12">
							<label >Anticipo de Vehiculo</label>
							<input type="text"  class="c1 form-control" name="com_ant_vehi" id="com_ant_vehi" onchange="calcular()" required>
					</div>
				</div>
				<div class="row">
					<!-- <div class="text-center col-lg-4 col-md-4 col-12">
						<br>
						<button type="submit" class="btn bg-info btn-lg text-white" id="calculartotal"><i class="fa fa-calculator"></i>Calcular Total</button>	
					</div> -->
					
					<div class="col-lg-4 col-md-4 col-12 form-group">
						<label for="">Total:</label>
						<input type="text" name="com_suma" id="com_suma" class="form-control" readonly required>
					</div>
					
					<div class="form-group col-lg-4 col-md-4 col-12">
						<label for="">Anticipo otorgado:</label>
						<input type="text" class=" form-control" name="com_ant_otor" id="com_ant_otor" onchange="calcular()" readonly="" required>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-lg-4 col-md-4 col-12">
						<label for="">Comprobantes presentados:</label>
						<input type="text" class="form-control" name="com_comp_pres" id="com_comp_pres" onchange="calcular()" required>
					</div>
					<!-- <div class="text-center col-lg-4 col-md-4 col-12">
						<br>
						<button type="submit" class="btn bg-primary btn-lg text-white" id="calcularsaldo"><i class="fa fa-calculator"></i>Calcular Saldo</button>
					</div> -->
					<div class="col-lg-4 col-md-4 col-12 form-group">
						<label for="">Saldo:</label>
						<input type="text" name="com_saldo" id="com_saldo" class="form-control" readonly required>
					</div>
					<div class="text-center col-lg-4 col-md-4 col-12">
						<button type="submit" id="send" class="btn bg-success btn-lg text-white"><i class="fa fa-check"></i>Enviar</button>
					</div>
				</div>
				</div>
			</div>
		</div>
	</body>
</html>
<script type="text/javascript">
	// function calcular()	{
	// 	var data1 = parseFloat($("#com_ant_alim").val());
	// 	var data2 = parseFloat($("#com_ant_pasa").val());
	// 	var data3 = parseFloat($("#com_ant_vehi").val());
	// 	var result = data1 + data2 + data3;
	// 	$("#com_suma").val(result);
	// 	$("#com_ant_otor").val(result);
	// 	var data4 = parseFloat($("#com_ant_otor").val());
	// 	var data5 = parseFloat($("#com_comp_pres").val());
	// 	var result2 = data4 - data5;
	// 	$("#com_saldo").val(result2);
	// }
	function calcular() {
      var add = 0;
      $('.c1').each(function() {
          if (!isNaN($(this).val())) {
              add += Number($(this).val());
          }
      });
      $('#com_suma').val(add);
      $('#com_ant_otor').val(add);
    var resultado = 0;
  	var data4 = parseFloat($("#com_ant_otor").val());
	var data5 = parseFloat($("#com_comp_pres").val());
    resultado = data4 - data5;
      $('#com_saldo').val(resultado);
  
  };

	//metodo con botones
// var botonCalculart = $('#calculartotal');
// 		botonCalculart.click(function() {
// 				var data1 = parseFloat($("#com_ant_alim").val());
// 				var data2 = parseFloat($("#com_ant_pasa").val());
// 				var data3 = parseFloat($("#com_ant_vehi").val());
// 				var result = data1 + data2 + data3;
// 				$("#com_suma").val(result);
// 				$("#com_ant_otor").val(result);
// 				});
// 		var botonCalcularSaldo = $('#calcularsaldo');
// 		botonCalcularSaldo.click(function() {
// 				var data4 = parseFloat($("#com_ant_otor").val());
// 				var data5 = parseFloat($("#com_comp_pres").val());
// 				var result2 = data4 - data5;
// 				$("#com_saldo").val(result2);

// 				});	
$(document).ready(function() {
		
		$('#formCrear').on('submit', function(event) {
			event.preventDefault();
			var data = $(this).serialize();
			postAjax($(this).attr('action'), data, function(response){
				if (response.success != undefined) {
					swal('Se proceso la información',response.success,'info');
					setInterval(function(){ window.location = '<?= site_url()."/comision/index" ?>';}, 3000);
				} else {
					swal('Hubo un problema.',response.error,'error');
				}
				
			});
		});
	});
	
</script>