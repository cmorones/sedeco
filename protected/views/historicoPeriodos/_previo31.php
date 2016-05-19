<div id="main_content">

  <?php

   $this->renderPartial('_btnvista', array('id'=>$id, 'ind'=>$ind));     

?>

<?php


$sql = "SELECT * from historico_periodos  where id=$id"; 
$indicador = Yii::app()->db->createCommand($sql)->queryRow();


 $data1 =  json_decode($indicador['config'], true);

 $arr = json_decode($indicador['config'], true);






$baseUrl = Yii::app()->params['baserecm'];
//$url = $baseUrl. "/index.php/api2/ap1Ind4as?id=$id&anio=$data1[anios_ini]&trim=$var";
$url = $baseUrl. "/index.php/api2/ap1Ind4c?id=23&anioini=$data1[anios_ini]&aniofin=$data1[anios_fin]";
//$url = $baseUrl; ap1Ind4c?id=23&anioini=2010&aniofin=2014&trim=1,2
//echo $url;
//die();

$data = file_get_contents($url);
$model= CJSON::decode($data);



?>
	
<br>
<br>
<br>
<br>
	 <div class="table-responsive" id="tabla_r">

                    <div class="col-md-12 alinear">

                    <?php if($indicador['titulo1']){  echo $indicador['titulo1']; }?>
                    <?php if($indicador['titulo2']){  echo $indicador['titulo2']; }?>
                    <?php if($indicador['titulo3']){  echo $indicador['titulo3']; }?>

                     
                      
                   
<table class="table table-bordered table-condensed table400">
                <tr class="cell_label"> 
               <td colspan="5">Periodo</td>
               <td>PIB</td> 
               <td>IGAE<sup>1</sup></td> 
               <td>ITTAEE D.F.<sup>2</sup></td> 
            </tr>
            


<?php

if(is_array($model)){
	foreach ($model as $indice => $valor) {
	//echo ("El indice1 $indice tiene el valor: $valor<br>");
		if(is_array($valor)){
			foreach ($valor as $indice2 => $valor2) {
			//echo ("El indice2 $indice2 tiene el valor: $valor2<br>");
				if(is_array($valor2)){
					foreach ($valor2 as $indice3 => $valor3) {
					//echo ("El indice3 $indice3 tiene el valor: $valor3<br>");

					echo "<tr class=\"rEven\">";
					echo "<td colspan=\"4\" rowspan=\"4\">$indice3</td>";
        
        
						if(is_array($valor3)){
							foreach ($valor3 as $indice4 => $valor4) {
							//echo ("El indice4 $indice4 tiene el valor: $valor4<br>");
									if(is_array($valor4)){
										$contador=0;
										foreach ($valor4 as $indice5 => $valor5) {
										//echo ("El indice5 $indice5 tiene el valor: $valor5<br>");

										
										switch ($indice5) {
											case '1':
												echo "<td colspan=\"1\">I</td>";
											break;
										
											case '2':
												echo "<tr class=\"rEven\"><td>II</td>";
											break;
										
											case '3':
												echo "<tr class=\"rEven\"><td>III</td>";
											break;
										
											case '4':
												echo "<tr class=\"rEven\"><td>IV</td>";

											break;
										}
										
										
										



												if(is_array($valor5)){
													
														foreach ($valor5 as $indice6 => $valor6) {

															//echo ("El indice6 $indice6 tiene el valor: $valor6<br>");
																switch ($indice5) {
																			case '1':
																					echo "<td class=\"data\">$valor6</td>";
																			break;
																		
																			case '2':
																				echo "<td class=\"data\">$valor6</td>";
																			break;
																		
																			case '3':
																				echo "<td class=\"data\">$valor6</td>";
																			break;
																		
																			case '4':
																				echo "<td class=\"data\">$valor6</td>";

																			break;
																		}
																						
													//echo " <td class=\"data\">$valor6</td>";
														}
												}
	
										$contador++;
										}
									}
							}
						}
						echo " </tr>";

					}
				}

			}
		}
	}
}




?>

</table>
			     </div>
	 		 <div class="table_explanation">

                <?php if($indicador['nota1']){  echo $indicador['nota1']; }?>
                <?php if($indicador['nota2']){  echo $indicador['nota2']; }?>
                <?php if($indicador['nota3']){  echo $indicador['nota3']; }?>
          	  	<p class="table_exp_source"><?php echo $indicador['fuente']?></p>
           	 </div>

</div>
