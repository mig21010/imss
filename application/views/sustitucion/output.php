<?php
	if(!empty($query ))  
 { 
    
      $output = '';
      $outputdata = '';  
      $outputtail ='';

      $output .= '<div class="container">
              
                   <table class="table table-responsive">
	                <thead>
                          <tr>
			                      <th>Número de Sustituciones</th>
                            <th>Matrícula</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Mes de susutitución</th>
                            <th>Año de sustitución</th>
 		                       </tr>
				   
                   </thead>
                   <tbody>
                   ';
                  
      foreach ($query as $objects)    
	   {   
           $outputdata .= ' 
                
                    <tr> 
		            <td >'.$objects->num_sust.'</td>
		            <td >'.$objects->emp_matr_id.'</td>
		            <td>'.$objects->emp_nom.'</td>
                <td>'.$objects->emp_ape_pat.'</td>
                <td>'.$objects->emp_ape_mat.'</td>
                <td>'.$objects->month.'</td>
                <td>'.$objects->year.'</td>
                    </tr> 
                
           ';
        //  echo $outputdata; 
                
          }  

         $outputtail .= ' 
                         </tbody>
                         </table>
                         </div>
                         </div> ';
         
         echo $output; 
         echo $outputdata; 
         echo $outputtail; 
 }  
 
 else  
 {  
      echo 'Los datos no fueron encontrados';  
 } 