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
				
		
				<!-- <span class="input-group-addon" >SEARCH</span>  -->
  				<input autocomplete="off" id="search"  type="text" class="form-control input-sm" placeholder="Realiza tu búsqueda por Matrícula o Nombre del empleado" >
	
				<div id="txtHint" style="padding-top:50px; text-align:center;" ><b>Después de hacer una búsqueda tu información será mostrada aquí...</b></div>
			   
				</div>

				</div>

			</div>

		</div>
	</body>
</html>
<script>
$(document).ready(function(){
   $("#search").keyup(function(){
       var str=  $("#search").val();
       if(str == "") {
               $( "#txtHint" ).html("<b>Después de hacer una búsqueda tu información será mostrada aquí...</b>"); 
       }else {
               $.get( "<?php echo site_url();?>/sustitucion/control?sus_id="+str, function( data ){
                   $( "#txtHint" ).html( data );  
            });
       }
   });  
});  
</script>