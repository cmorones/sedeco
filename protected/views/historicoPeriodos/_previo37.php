<div id="main_content">

  <?php

   $this->renderPartial('_btnvista', array('id'=>$id, 'ind'=>$ind));     

?>
<hr>
<?

$sql = "SELECT * from historico_periodos  where id=$id"; 
$indicador = Yii::app()->db->createCommand($sql)->queryRow();


 $data1 =  json_decode($indicador['config'], true);

 $arr = json_decode($indicador['config'], true);


 $var ='';
if(is_array($arr['config'])){
foreach ($arr['config'] as $k=>$v){
   $var .= $v.',';
}
$var= substr( $var, 0,-1);
}else {
 $var ='';	
}


	





$baseUrl = Yii::app()->params['baserecm'];
$url = $baseUrl. "/index.php/api2/ap1Ind5a?id=$id&anio=$data1[anios_ini]&trim=$var";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);

//echo $url;

$trim=array();

if(is_array($model)){
foreach ($model as $indice => $valor) {
//echo ("El indice1 $indice tiene el valor: $valor<br>");
	if (is_array($valor)){ 
   		foreach ($valor as $indice2 => $valor2) {
   			//echo ("El indice2 $indice2 tiene el valor2: $valor2<br>");
   				if (is_array($valor2)){ 
   					foreach ($valor2 as $indice3 => $valor3) {
   						//echo ("El indice3 $indice3 tiene el valor3: $valor3<br>");
   						if (is_array($valor3)){ 
   							foreach ($valor3 as $indice4 => $valor4) {
   								//echo ("El indice4 $indice4 tiene el valor4: $valor4<br>");
   									if (is_array($valor4)){ 
			   							foreach ($valor4 as $indice5 => $valor5) {
			   								//echo ("El indice5 $indice5 tiene el valor5: $valor5<br>");
			   								//$promedio =$model[$indice][$indice2][$indice3][$indice4]['promedio'];

			   								//$var .= "<td class=\"data\">$promedio</td>";
			   							}
			   						}	
   								
   								$trim[]=$indice4;
   								
   							}
   						}
   					}
   				}
   				//echo "$indice4";
   			}
   	}
}

//print_r($trim);

$resultado = array_unique($trim);

//print_r($resultado);

//die();


//die();


?>


 
     <div class="row-fluid">
	
     	 <div class="span12 alinear">
	
		<h3><?php echo $indicador['titulo1']?></h3>
		</div>	
	</div>					
			
	<div class="row-fluid">
			<div class="span12 alinear">
			<table class="table400 table-bordered table-condensed">

			             <tr class="cell_label"> 
			               <td colspan="4">Índicid de actividad Industrial, 2014<br> Índice 2008=100, promedio trimestral</td>
			                
			               
			            </tr>
			        	<tr class="cell_label"> 
							 <td></td>

			<?php

			foreach ($resultado as $indice => $valor) {
				echo "<td>$data1[anios_ini].0$valor</td> ";
}

?>				


						
							  
							 
						</tr>
<?php
$var ='';
foreach ($model as $indice => $valor) {
//echo ("El indice1 $indice tiene el valor: $valor<br>");
	if (is_array($valor)){ 
   		foreach ($valor as $indice2 => $valor2) {
   			//echo ("El indice2 $indice2 tiene el valor2: $valor2<br>");
   			echo "<tr class=\"rEven\">";
   			echo "<td >$indice2</td>";
   				if (is_array($valor2)){ 
   					foreach ($valor2 as $indice3 => $valor3) {
   						//echo ("El indice3 $indice3 tiene el valor3: $valor3<br>");
   						if (is_array($valor3)){ 
   							foreach ($valor3 as $indice4 => $valor4) {
   								//echo ("El indice4 $indice4 tiene el valor4: $valor4<br>");
   									if (is_array($valor4)){ 
			   							foreach ($valor4 as $indice5 => $valor5) {
			   								//echo ("El indice5 $indice5 tiene el valor5: $valor5<br>");
			   								$promedio =$model[$indice][$indice2][$indice3][$indice4]['promedio'];

			   								//$var .= "<td class=\"data\">$promedio</td>";
			   							}
			   						}	
   								//$trim[]=$indice4;
			   						echo "<td class=\"data\">$promedio</td>";
   								
   							}
   						}
   					}
   				}


   			
   		

		
		    echo"</tr>";
   			}
   	}
}

 ?>


						
						
			        	
			     



				        		
		
			        </table>
									
					 <div class="table_explanation">

                <?php if($indicador['nota1']){  echo $indicador['nota1']; }?>
                <?php if($indicador['nota2']){  echo $indicador['nota2']; }?>
                <?php if($indicador['nota3']){  echo $indicador['nota3']; }?>
          	  	<p class="table_exp_source"><?php echo $indicador['fuente']?></p>
           	 </div>
       

      </div>                  	

</div>

<?php
}
else {

 echo "<h3>Ni existe información para esta configuración</h3>";
}
    
?>             