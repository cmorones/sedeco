  <?php
/* @var $this Ap1ind1JorgeController */
/* @var $model Ap1ind1Jorge */

$this->breadcrumbs=array(
	'Regresar'=>array('index'),
	//"Previo"=>array('previo','id'=>$model->id),
	'Previo',
);

?>

<div id="main_content">
        	
        		
        	<p>

        	<p class="table_title default">
		        	Vista Previa del Indicador
		        </p>
        		<div>
        	  	
	  	<?php
				  if($autoriza){
				  $this->widget('zii.widgets.jui.CJuiButton', array(
				  	    'buttonType'=>'link',
						'name'=>'datos'.$registro['periodo'].'',
						'caption'=>'Autorizar',
						'value'=>'Autorizar',
						'htmlOptions'=>array('class'=>'btn btn-success','style'=>'padding: 0px;'),


						//'url' => array('apa1ind1/admin/'.$registro['id'].''),
						'onclick'=>new CJavaScriptExpression('function(){alert("Al autorizar se publicara en la pagina web"); this.blur(); return false;}'),
				  ));
				}
			?>

			<?php
				  $this->widget('zii.widgets.jui.CJuiButton', array(
				  	    'buttonType'=>'link',
						'name'=>'validar'.$registro['periodo'].'',
						'caption'=>'Validar',
						'value'=>'Validar',
						'htmlOptions'=>array('class'=>'btn btn-info','style'=>'padding: 0px;'),


						//'url' => array('apa1ind1/admin/'.$registro['id'].''),
						'onclick'=>new CJavaScriptExpression('function(){alert("Al autorizar se publicara en la pagina web"); this.blur(); return false;}'),
				  ));
			?>
		

			<?php
				  $this->widget('zii.widgets.jui.CJuiButton', array(
				  	    'buttonType'=>'link',
						'name'=>'pedf'.$registro['periodo'].'',
						'caption'=>'Exportar PDF',
						'value'=>'pedf',
						'htmlOptions'=>array('class'=>'btn btn-primary','style'=>'padding: 0px;'),


						//'url' => array('apa1ind1/grafico/'.$registro['id'].''),
						//'onclick'=>new CJavaScriptExpression('function(){alert("Al autorizar se publicara en la pagina web"); this.blur(); return false;}'),
				  ));
			?>

			<?php
				  $this->widget('zii.widgets.jui.CJuiButton', array(
				  	    'buttonType'=>'link',
						'name'=>'Excel'.$registro['periodo'].'',
						'caption'=>'Exportar Excel',
						'value'=>'Excel',
						'htmlOptions'=>array('class'=>'btn btn-primary','style'=>'padding: 0px;'),


						//'url' => array('apa1ind1/admin/'.$registro['id'].''),
						'onclick'=>new CJavaScriptExpression('function(){alert("Al autorizar se publicara en la pagina web"); this.blur(); return false;}'),
				  ));
			?>
		

			 <?php
                  $this->widget('zii.widgets.jui.CJuiButton', array(
                        'buttonType'=>'link',
                        'name'=>'Grafico'.$registro['periodo'].'',
                        'caption'=>'Mostrar Grafico',
                        'value'=>'Grafico',
                        'htmlOptions'=>array('class'=>'btn btn-warning','style'=>'padding: 0px;'),


                        'url' => array('ap1Ind2aHist/grafico/'.$id.''),
                        //'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
                  ));
            ?>
</div>
        	</p>
		        
		        <p class="table_title option_2">
		        	Estructura productiva del Distrito Federal, 2012
		        </p>
		        
		        <p class="table_title option_3">
		        	Participación de las entidades en el PIB nacional, 2012
		        </p>
		        
		        <div class="default">
		        	<table class="table_stats">
		        		<tr class="cell_label"> 
							 <td>Periodo / sector económico</td> 
							 <td>2008</td> 
							 <td>2009</td> 
							 <td>2010</td> 
							 <td>2011</td> 
							 <td>2012</td>
						</tr>
			        	<tr class="cell_label"> 
							 <td colspan="6">Sector primario</td>
						</tr>
						<tr class="rOdd"> 
							 <td>Distrito Federal </td> 
							 <td class="data">0.06%</td>	
							 <td class="data">0.07%</td>	
							 <td class="data">0.06%</td>	
							 <td class="data">0.06%</td>	
							 <td class="data">0.06%</td> 
						</tr>
						<tr class="rEven"> 
							 <td>Estado de México</td> 
							 <td class="data">1.61%</td>	
							 <td class="data">1.47%</td>	
							 <td class="data">1.45%</td>
							 <td class="data">1.17%</td>	
							 <td class="data">1.32%</td> 
						</tr>
						<tr class="rOdd"> 
							 <td>Nuevo León</td>  
							 <td class="data">0.66%</td>	
							 <td class="data">0.73%</td>	
							 <td class="data">0.71%</td>	
							 <td class="data">0.60%</td>	
							 <td class="data">0.57%</td> 
						</tr>
						<tr class="rEven"> 
							 <td>Jalisco</td> 
							 <td class="data">5.26%</td>	
							 <td class="data">5.29%</td>	
							 <td class="data">5.45%</td>	
							 <td class="data">5.04%</td>	
							 <td class="data">5.08%</td> 
						</tr>
						<tr class="rOdd"> 
							 <td>Veracruz</td> 
							 <td class="data">4.61%	</td>
							 <td class="data">4.54%</td>	
							 <td class="data">4.39%</td>	
							 <td class="data">4.21%</td>	
							 <td class="data">4.26%</td> 
						</tr>
						<tr class="cell_label"> 
							 <td colspan="6">Sector secundario</td>
						</tr>
						<tr class="rOdd"> 
							 <td>Distrito Federal </td> 
							 <td class="data">13.90%</td>	
							 <td class="data">13.60%</td>	
							 <td class="data">12.32%</td>	
							 <td class="data">12.01%</td>	
							 <td class="data">11.71%</td> 
						</tr>
						<tr class="rEven"> 
							 <td>Estado de México</td> 
							 <td class="data">33.60%</td>	
							 <td class="data">32.81%</td>	
							 <td class="data">34.45%</td>	
							 <td class="data">33.82%</td>	
							 <td class="data">32.82%</td> 
						</tr>
						<tr class="rOdd"> 
							 <td>Nuevo León</td> 
							 <td class="data">39.00%</td>	
							 <td class="data">38.08%</td>	
							 <td class="data">39.03%</td>	
							 <td class="data">39.15%</td>	
							 <td class="data">38.52%</td> 
						</tr>
						<tr class="rEven"> 
							 <td>Jalisco</td> 
							 <td class="data">32.31%</td>	
							 <td class="data">30.87%</td>	
							 <td class="data">30.47%</td>	
							 <td class="data">30.79%</td>	
							 <td class="data">30.16%</td> 
						</tr>
						<tr class="rOdd"> 
							 <td>Veracruz</td> 
							 <td class="data">41.37%</td>	
							 <td class="data">42.61%</td>	
							 <td class="data">42.19%</td>	
							 <td class="data">41.74%</td>	
							 <td class="data">41.59%</td> 
						</tr>
						<tr class="cell_label"> 
							 <td colspan="6">Sector terciario</td>
						</tr>
						<tr class="rOdd"> 
							 <td>Distrito Federal </td> 
							 <td class="data">86.03%</td>	
							 <td class="data">86.33%</td>	
							 <td class="data">87.62%</td>	
							 <td class="data">87.93%</td>	
							 <td class="data">88.23%</td> 
						</tr>
						<tr class="rEven"> 
							 <td>Estado de México</td> 
							 <td class="data">64.79%</td>	
							 <td class="data">65.72%</td>	
							 <td class="data">64.10%</td>	
							 <td class="data">65.01%</td>	
							 <td class="data">65.86%</td> 
						</tr>
						<tr class="rOdd"> 
							 <td>Nuevo León</td> 
							 <td class="data">60.34%</td>	
							 <td class="data">61.19%</td>	
							 <td class="data">60.26%</td>	
							 <td class="data">60.25%</td>	
							 <td class="data">60.91%</td> 
						</tr>
						<tr class="rEven"> 
							 <td>Jalisco</td> 
							 <td class="data">62.42%</td>	
							 <td class="data">63.84%</td>	
							 <td class="data">64.08%</td>	
							 <td class="data">64.17%</td>	
							 <td class="data">64.76%</td> 
						</tr>
						<tr class="rOdd"> 
							 <td>Veracruz</td> 
							 <td class="data">54.01%</td>	
							 <td class="data">52.85%</td>	
							 <td class="data">53.42%</td>	
							 <td class="data">54.04%</td>	
							 <td class="data">54.15%</td> 
						</tr>
						
			        	




			     <?php 

/*foreach ($model as $indice => $valor) {
//echo ("El indice1 $indice tiene el valor: $valor<br>");
	if (is_array($valor)){ 
   		foreach ($valor as $indice2 => $valor2) {
   			//echo ("El indice2 $indice2 tiene el valor: $valor2<br>");

   				if (is_array($valor2)){ 
			   		foreach ($valor2 as $indice3 => $valor3) {
			   			//echo ("El indice3 $indice3 tiene el valor: $valor3<br>");
			   			if (is_array($valor3)){ 
					   		foreach ($valor3 as $indice4 => $valor4) {
					   			//echo ("El indice4 $indice4 tiene el valor: $valor4<br>");

					   			echo "<tr class=\"rEven\"> 
							 <td>$indice3</td> 
							 <td class=\"data\">$valor4</td> 
						</tr>";
					   		}
			   			}
			   			
			   		}
			   	}
		}
	}
}*/



   /* $azcapotzalco =number_format($model[$indice][$indice2]['2'][$indice4],0);
    $coyoacan =number_format($model[$indice][$indice2]['3'][$indice4],0);
    $cuajimalpa =number_format($model[$indice][$indice2]['4'][$indice4],0);
    $gam =number_format($model[$indice][$indice2]['5'][$indice4],0);
    $iztacalco =number_format($model[$indice][$indice2]['6'][$indice4],0);
    $iztapalapa =number_format($model[$indice][$indice2]['7'][$indice4],0);
    $contreras =number_format($model[$indice][$indice2]['8'][$indice4],0);
    $milpaalta =number_format($model[$indice][$indice2]['9'][$indice4],0);
    $obregon =number_format($model[$indice][$indice2]['10'][$indice4],0);
    $tlahuac =number_format($model[$indice][$indice2]['11'][$indice4],0);
    $tlalpan =number_format($model[$indice][$indice2]['12'][$indice4],0);
    $xochimilco =number_format($model[$indice][$indice2]['13'][$indice4],0);
    $benito =number_format($model[$indice][$indice2]['14'][$indice4],0);
    $cuautemoc =number_format($model[$indice][$indice2]['15'][$indice4],0);
    $hidalgo =number_format($model[$indice][$indice2]['16'][$indice4],0);
    $venustiano =number_format($model[$indice][$indice2]['17'][$indice4],0);

    /*$total = $azcapotzalco + $coyoacan + $cuajimalpa + $gam + $iztacalco + $iztapalapa + $contreras + $milpaalta + $obregon + $tlahuac + $tlalpan + $xochimilco + $benito + $cuautemoc + $hidalgo + $venustiano;
    
    $totaldf = $totaldf + $total;
    $totaldf =number_format($total,0); */


    



/*

    $sql = "SELECT nombre from actividades_economicas where id=$indice2"; 
	$actividad = Yii::app()->db->createCommand($sql)->queryRow();



     echo "<tr class=\"rEven\">			        		
			        		<td>".$actividad['nombre']."</td>
			        		<td class=\"data\">".$totaldf."</td>
			        		<td class=\"data\">".$azcapotzalco."</td>
			        		<td class=\"data\">".$coyoacan."</td>
			        		<td class=\"data\">".$cuajimalpa."</td>
			        		<td class=\"data\">".$gam."</td>
			        		<td class=\"data\">".$iztacalco."</td>
			        		<td class=\"data\">".$iztapalapa."</td>
			        		<td class=\"data\">".$contreras."</td>
			        		<td class=\"data\">".$milpaalta."</td>
			        		<td class=\"data\">".$obregon."</td>
			        		<td class=\"data\">".$tlahuac."</td>
			        		<td class=\"data\">".$tlalpan."</td>
			        		<td class=\"data\">".$xochimilco."</td>
			        		<td class=\"data\">".$benito."</td>
			        		<td class=\"data\">".$cuautemoc."</td>
			        		<td class=\"data\">".$hidalgo."</td>
			        		<td class=\"data\">".$venustiano."</td>
			        	</tr>";
   	}
 }

}*/



?>
		<!--	        <tr class="rEven">			        		
			        		<td>Total</td>
			        		<td class="data">1,057,312,682</td>
			        		<td class="data">84,259,698</td>
			        		<td class="data">35,333,865</td>
			        		<td class="data">42,745,952</td>
			        		<td class="data">21,356,387</td>
			        		<td class="data">15,729,610</td>
			        		<td class="data">31,703,038</td>
			        		<td class="data">2,803,504</td>
			        		<td class="data">429,646</td>
			        		<td class="data">120,794,330</td>
			        		<td class="data">2,619,633</td>
			        		<td class="data">51,309,966</td>
			        		<td class="data">14,099,934</td>
			        		<td class="data">133,136,835</td>
			        		<td class="data">230,580,346</td>
			        		<td class="data">239,283,038</td>
			        		<td class="data">31,126,900</td>
			        	</tr>
			        	<tr class="rOdd">
			        	<td>Minería</td>
			        	<td class="data">-907,709</td>
			        	<td class="data">-373</td>
			        	<td class="data">0</td>
			        	<td class="data">7,158</td>
			        	<td class="data">0</td>
			        	<td class="data">0</td>
			        	<td class="data">12,490</td>
			        	<td class="data">0</td>
			        	<td class="data">0</td>
			        	<td class="data">-5,552</td>
			        	<td class="data">0</td>
			        	<td class="data">0</td>
			        	<td class="data">0</td>
			        	<td class="data">546</td>
			        	<td class="data">1,009,919</td>
			        	<td class="data">-1,931,897</td>
			        	<td class="data">0</td>			        		
			        	</tr>
			        	<tr class="rEven">
			        	<td>Generación, transmisión y distribución de energía eléctrica, suministro de agua y de gas por ductos al consumidor final</td>
			        	<td class="data">19,066,717</td>
			        	<td class="data">0</td>
			        	<td class="data">0</td>
			        	<td class="data">6,222</td>
			        	<td class="data">0</td>
			        	<td class="data">3,339,383</td>
			        	<td class="data">0</td>
			        	<td class="data">0</td>
			        	<td class="data">0</td>
			        	<td class="data">0</td>
			        	<td class="data">0</td>
			        	<td class="data">0</td>
			        	<td class="data">0</td>
			        	<td class="data">0</td>
			        	<td class="data">4,251,887</td>
			        	<td class="data">11,469,225</td>
			        	<td class="data">0</td>
			        	</tr>
			        	<tr class="rOdd">
			        	<td>Construcción</td>
			        	<td class="data">19,173,162</td>
			        	<td class="data">501,932</td>
			        	<td class="data">400,565</td>
			        	<td class="data">237,664</td>
			        	<td class="data">374,937</td>
			        	<td class="data">147,226</td>
			        	<td class="data">353,193</td>
			        	<td class="data">39,334</td>
			        	<td class="data">4,880</td>
			        	<td class="data">2,852,250</td>
			        	<td class="data">52,734</td>
			        	<td class="data">1,857,496</td>
			        	<td class="data">88,181</td>
			        	<td class="data">3,452,821</td>
			        	<td class="data">2,769,785</td>
			        	<td class="data">5,937,732</td>
			        	<td class="data">102,432</td>			        		
			        	</tr>
			        	<tr class="rEven">
			        	<td>Industrias manufactureras</td>
			        	<td class="data">130,324,236</td>
			        	<td class="data">51,812,185</td>
			        	<td class="data">11,898,778</td>
			        	<td class="data">911,929</td>
			        	<td class="data">6,285,815</td>
			        	<td class="data">5,895,575</td>
			        	<td class="data">12,844,931</td>
			        	<td class="data">-78,587</td>
			        	<td class="data">103,471</td>
			        	<td class="data">1,239,560</td>
			        	<td class="data">1,386,264</td>
			        	<td class="data">7,856,890</td>
			        	<td class="data">10,703,569</td>
			        	<td class="data">9,760,057</td>
			        	<td class="data">6,327,290</td>
			        	<td class="data">619,226</td>
			        	<td class="data">2,757,283</td>		        		
			        	</tr>
			        	<tr class="rOdd">
			        	<td>Comercio al por mayor</td>
			        	<td class="data">62,665,201</td>
			        	<td class="data">3,407,185</td>
			        	<td class="data">2,263,894</td>
			        	<td class="data">2,420,067</td>
			        	<td class="data">3,032,248</td>
			        	<td class="data">2,519,029</td>
			        	<td class="data">6,133,503</td>
			        	<td class="data">63,646</td>
			        	<td class="data">19,659</td>
			        	<td class="data">7,063,653</td>
			        	<td class="data">24,332</td>
			        	<td class="data">1,490,362</td>
			        	<td class="data">367,988</td>
			        	<td class="data">8,165,184</td>
			        	<td class="data">10,375,201</td>
			        	<td class="data">14,730,076</td>
			        	<td class="data">589,174</td>			        		
			        	</tr>
			        	<tr class="rEven">
			        	<td>Comercio al por menor</td>
			        	<td class="data">51,225,054</td>
			        	<td class="data">1,735,185</td>
			        	<td class="data">4,179,873</td>
			        	<td class="data">3,148,321</td>
			        	<td class="data">4,017,779</td>
			        	<td class="data">1,192,036</td>
			        	<td class="data">5,564,190</td>
			        	<td class="data">345,016</td>
			        	<td class="data">158,666</td>
			        	<td class="data">3,602,943</td>
			        	<td class="data">579,222</td>
			        	<td class="data">2,277,659</td>
			        	<td class="data">859,151</td>
			        	<td class="data">5,699,778</td>
			        	<td class="data">8,822,295</td>
			        	<td class="data">6,468,772</td>
			        	<td class="data">2,574,168</td>	        		
			        	</tr>
			        	<tr class="rOdd">
			        	<td>Transportes, correos y almacenamiento</td>
			        	<td class="data">67,792,707</td>
			        	<td class="data">2,921,916</td>
			        	<td class="data">1,445,070</td>
			        	<td class="data">375,223</td>
			        	<td class="data">1,991,610</td>
			        	<td class="data">682,041</td>
			        	<td class="data">1,056,466</td>
			        	<td class="data">40,390</td>
			        	<td class="data">25,206</td>
			        	<td class="data">5,339,228</td>
			        	<td class="data">19,612</td>
			        	<td class="data">1,394,979</td>
			        	<td class="data">357,988</td>
			        	<td class="data">2,310,695</td>
			        	<td class="data">12,367,578</td>
			        	<td class="data">17,586,076</td>
			        	<td class="data">19,878,629</td>			        		
			        	</tr>
			        	<tr class="rEven">
			        	<td>Información en medios masivos</td>
			        	<td class="data">64,954,048</td>
			        	<td class="data">133,242</td>
			        	<td class="data">609,185</td>
			        	<td class="data">11,922,348</td>
			        	<td class="data">87,624</td>
			        	<td class="data">19,055</td>
			        	<td class="data">-73,928</td>
			        	<td class="data">13,176</td>
			        	<td class="data">2,676</td>
			        	<td class="data">8,470,121</td>
			        	<td class="data">3,610</td>
			        	<td class="data">5,063,189</td>
			        	<td class="data">7,862</td>
			        	<td class="data">5,707,524</td>
			        	<td class="data">19,275,945</td>
			        	<td class="data">13,707,714</td>
			        	<td class="data">4,705</td>        		
			        	</tr>
			        	<tr class="rOdd">
			        	<td>Servicios financieros y de seguros</td>
			        	<td class="data">363,520,346</td>
			        	<td class="data">20,085</td>
			        	<td class="data">6,609,340</td>
			        	<td class="data">7,188,453</td>
			        	<td class="data">57,271</td>
			        	<td class="data">5,247</td>
			        	<td class="data">117,474</td>
			        	<td class="data">-192,607</td>
			        	<td class="data">8,450</td>
			        	<td class="data">68,408,010</td>
			        	<td class="data">22,372</td>
			        	<td class="data">18,982,728</td>
			        	<td class="data">23,704</td>
			        	<td class="data">78,396,001</td>
			        	<td class="data">119,049,986</td>
			        	<td class="data">64,800,604</td>
			        	<td class="data">23,228</td>			        		
			        	</tr>
			        	<tr class="rEven">
			        	<td>Servicios inmobiliarios y de alquiler de bienes muebles e intangibles</td>
			        	<td class="data">12,045,411</td>
			        	<td class="data">866,559</td>
			        	<td class="data">536,270</td>
			        	<td class="data">679,942</td>
			        	<td class="data">226,203</td>
			        	<td class="data">76,481</td>
			        	<td class="data">197,354</td>
			        	<td class="data">21,739</td>
			        	<td class="data">4,535</td>
			        	<td class="data">4,028,581</td>
			        	<td class="data">30,280</td>
			        	<td class="data">329,557</td>
			        	<td class="data">33,760</td>
			        	<td class="data">783,700</td>
			        	<td class="data">842,930</td>
			        	<td class="data">3,225,692</td>
			        	<td class="data">161,828</td>			        		
			        	</tr>
			        	<tr class="rOdd">
			        	<td>Servicios profesionales, científicos y técnicos</td>
			        	<td class="data">43,013,434</td>
			        	<td class="data">321,183</td>
			        	<td class="data">1,606,972</td>
			        	<td class="data">765,434</td>
			        	<td class="data">491,932</td>
			        	<td class="data">213,328</td>
			        	<td class="data">333,275</td>
			        	<td class="data">51,735</td>
			        	<td class="data">3,621</td>
			        	<td class="data">4,275,828</td>
			        	<td class="data">27,006</td>
			        	<td class="data">654,838</td>
			        	<td class="data">22,109</td>
			        	<td class="data">7,319,328</td>
			        	<td class="data">8,434,952</td>
			        	<td class="data">18,311,080</td>
			        	<td class="data">180,813</td>			        		
			        	</tr>
			        	<tr class="rEven">
			        	<td>Corporativos
			        	<td class="data">72,752,969</td>
			        	<td class="data">4,318,320</td>
			        	<td class="data">42,390</td>
			        	<td class="data">5,328,853</td>
			        	<td class="data"></td>
			        	<td class="data"></td>
			        	<td class="data">14,360</td>
			        	<td class="data"></td>
			        	<td class="data"></td>
			        	<td class="data">3,158,668</td>
			        	<td class="data"></td>
			        	<td class="data">3,278,752</td>
			        	<td class="data"></td>
			        	<td class="data">-3,903</td>
			        	<td class="data">-1,848,388</td>
			        	<td class="data">58,485,727</td>
			        	<td class="data">-21,810</td>		
			        	</tr>
			        	<tr class="rOdd">
			        	<td>Servicios de apoyo a los negocios y manejo de desechos y servicios de remediación</td>
			        	<td class="data">73,062,332</td>
			        	<td class="data">16,709,867</td>
			        	<td class="data">2,069,791</td>
			        	<td class="data">8,047,662</td>
			        	<td class="data">973,030</td>
			        	<td class="data">575,975</td>
			        	<td class="data">2,587,279</td>
			        	<td class="data">395,410</td>
			        	<td class="data">8,168</td>
			        	<td class="data">6,525,858</td>
			        	<td class="data">56,039</td>
			        	<td class="data">2,201,629</td>
			        	<td class="data">953,464</td>
			        	<td class="data">4,776,119</td>
			        	<td class="data">7,187,556</td>
			        	<td class="data">16,782,874</td>
			        	<td class="data">3,211,611</td>	        		
			        	</tr>
			        	<tr class="rEven">
			        	<td>Servicios educativos</td>
			        	<td class="data">16,683,182</td>
			        	<td class="data">593,422</td>
			        	<td class="data">1,438,884</td>
			        	<td class="data">903,515</td>
			        	<td class="data">1,122,195</td>
			        	<td class="data">174,040</td>
			        	<td class="data">710,912</td>
			        	<td class="data">279,038</td>
			        	<td class="data">13,519</td>
			        	<td class="data">2,656,846</td>
			        	<td class="data">109,279</td>
			        	<td class="data">2,681,269</td>
			        	<td class="data">243,849</td>
			        	<td class="data">1,992,500</td>
			        	<td class="data">2,306,883</td>
			        	<td class="data">1,287,588</td>
			        	<td class="data">169,443</td>			        		
			        	</tr>
			        	<tr class="rOdd">
			        	<td>Servicios de salud y asistencia social</td>
			        	<td class="data">8,951,336</td>
			        	<td class="data">72,314</td>
			        	<td class="data">145,419</td>
			        	<td class="data">376,397</td>
			        	<td class="data">419,359</td>
			        	<td class="data">108,312</td>
			        	<td class="data">249,208</td>
			        	<td class="data">1,428,706</td>
			        	<td class="data">12,801</td>
			        	<td class="data">627,735</td>
			        	<td class="data">81,191</td>
			        	<td class="data">1,211,530</td>
			        	<td class="data">69,814</td>
			        	<td class="data">487,218</td>
			        	<td class="data">2,108,011</td>
			        	<td class="data">1,440,888</td>
			        	<td class="data">112,433</td>			        		
			        	</tr>
			        	<tr class="rEven">
			        	<td>Servicios de esparcimiento culturales y deportivos, y otros servicios recreativos</td>
			        	<td class="data">5,927,702</td>
			        	<td class="data">26,918</td>
			        	<td class="data">454,682</td>
			        	<td class="data">217,947</td>
			        	<td class="data">115,601</td>
			        	<td class="data">81,897</td>
			        	<td class="data">105,961</td>
			        	<td class="data">32,607</td>
			        	<td class="data">3,927</td>
			        	<td class="data">309,595</td>
			        	<td class="data">9,129</td>
			        	<td class="data">479,232</td>
			        	<td class="data">129,677</td>
			        	<td class="data">935,482</td>
			        	<td class="data">1,949,384</td>
			        	<td class="data">1,042,227</td>
			        	<td class="data">33,436</td>			        		
			        	</tr>
			        	<tr class="rOdd">
			        	<td>Servicios de alojamiento temporal y de preparación de alimentos y bebidas</td>
			        	<td class="data">17,362,259</td>
			        	<td class="data">439,147</td>
			        	<td class="data">1,015,889</td>
			        	<td class="data">5,636</td>
			        	<td class="data">1,070,810</td>
			        	<td class="data">337,205</td>
			        	<td class="data">835,340</td>
			        	<td class="data">106,266</td>
			        	<td class="data">36,530</td>
			        	<td class="data">1,182,917</td>
			        	<td class="data">112,733</td>
			        	<td class="data">917,556</td>
			        	<td class="data">169,963</td>
			        	<td class="data">1,827,784</td>
			        	<td class="data">4,832,424</td>
			        	<td class="data">3,407,541</td>
			        	<td class="data">1,064,518</td>	        		
			        	</tr>
			        	<tr class="rEven">
			        	<td>Otros servicios excepto actividades gubernamentales</td>
			        	<td class="data">29,700,295</td>
			        	<td class="data">380,611</td>
			        	<td class="data">616,863</td>
			        	<td class="data">203,181</td>
			        	<td class="data">1,089,973</td>
			        	<td class="data">362,780</td>
			        	<td class="data">661,030</td>
			        	<td class="data">257,635</td>
			        	<td class="data">23,537</td>
			        	<td class="data">1,058,089</td>
			        	<td class="data">105,830</td>
			        	<td class="data">632,300</td>
			        	<td class="data">68,855</td>
			        	<td class="data">1,526,001</td>
			        	<td class="data">20,516,708</td>
			        	<td class="data">1,911,893</td>
			        	<td class="data">285,009</td>			        		
			        	</tr> -->
			        </table>
			        
			        <div class="table_explanation">
				        <p class="table_exp_source"><span>Fuente:</span>INEGI, Censo Económico 2009, consulta electrónica en: http://www.inegi.org.mx/est/contenidos/espanol/proyectos/censos/ce2009/default.asp?s=est&c=14220</p>
			        </div>
		        </div>

		      
		        
</div>


          