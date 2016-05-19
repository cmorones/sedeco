<div id="main_content">

  <?php

   $this->renderPartial('_btnvista', array('id'=>$id, 'ind'=>$ind));     

?>

<?php


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
$url = $baseUrl. "/index.php/api2/ap1Ind4as?id=$id&anio=$data1[anios_ini]&trim=$var";
//$url = $baseUrl;
//echo $url;

$data = file_get_contents($url);
$model= CJSON::decode($data);

$url2 = $baseUrl. "/index.php/api2/ap1Ind4ad?id=$id&anio=$data1[anios_ini]&trim=$var";
//$url = $baseUrl;
//echo $url;

$data2 = file_get_contents($url2);
$model2= CJSON::decode($data2);



?>
	
<br>
<br>
<br>
<br>
	 <div class="table-responsive" id="tabla_r">

                    <div class="col-md-12 alinear">

                    <?php echo $indicador['titulo1']?>
                    <?php echo $indicador['titulo2']?>
                   <?php echo $indicador['titulo3']?>
                     
                      
                   
<table class="table600 table-bordered table-condensed table400">


			        	<tr class="cell_label">
			        		<td>Series originales</td>
			        		<td>Total de la Actividad Económica</td>
                  <td>Var. % respecto al mismo periodo del año anterior</td>
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
						if(is_array($valor3)){
							foreach ($valor3 as $indice4 => $valor4) {
							//echo ("El indice4 $indice4 tiene el valor: $valor4<br>");
									if(is_array($valor4)){
										$contador=0;
										foreach ($valor4 as $indice5 => $valor5) {
										//echo ("El indice5 $indice5 tiene el valor: $valor5<br>");


										echo " <tr class=\"rEven\">";
										
									
											echo " <td>$indice3.0$indice5</td>";
										

												if(is_array($valor5)){
													
														foreach ($valor5 as $indice6 => $valor6) {

															//echo ("El indice6 $indice6 tiene el valor: $valor6<br>");
															echo " <td class=\"data\">$valor6</td>";
														}
												}

										echo " </tr>";

										$contador++;
										}
									}
							}
						}
					}
				}

			}
		}
	}
}




?>




                <tr class="rEven">
                  <td>Series desestacionalizadas
</td>
                  <td>Total de la Actividad Económica</td>
                  <td>Var. % respecto al mismo periodo del año anterior</td>
                </tr>




<?php

if(is_array($model2)){
	foreach ($model2 as $indice => $valor) {
	//echo ("El indice1 $indice tiene el valor: $valor<br>");
		if(is_array($valor)){
			foreach ($valor as $indice2 => $valor2) {
			//echo ("El indice2 $indice2 tiene el valor: $valor2<br>");
				if(is_array($valor2)){
					foreach ($valor2 as $indice3 => $valor3) {
					//echo ("El indice3 $indice3 tiene el valor: $valor3<br>");
						if(is_array($valor3)){
							foreach ($valor3 as $indice4 => $valor4) {
							//echo ("El indice4 $indice4 tiene el valor: $valor4<br>");
									if(is_array($valor4)){
										$contador=0;
										foreach ($valor4 as $indice5 => $valor5) {
										//echo ("El indice5 $indice5 tiene el valor: $valor5<br>");

										echo " <tr class=\"rEven\">";
										
										
											echo " <td>$indice3.0$indice5</td>";
									

												if(is_array($valor5)){
													
														foreach ($valor5 as $indice6 => $valor6) {

															//echo ("El indice6 $indice6 tiene el valor: $valor6<br>");
															echo " <td class=\"data\">$valor6</td>";
														}
												}

										echo " </tr>";


										}
									}
							}
						}
					}
				}

			}
		}
	}
}




?>



		
		
			        </table>


			         <div class="table_explanation">
                
          			  <p class="table_exp_source"><?php echo $indicador['fuente']?></p>
           		   </div>
</div>
</div>
