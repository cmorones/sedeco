<?
$baseUrl2 = YiiBase::getPathOfAlias("webroot");

$grafico= $baseUrl2.'/static/ap1Ind2a.json';

//echo $grafico;
$datos = file_get_contents($grafico);
$model = json_decode($datos, true);
		/*$url = "http://localhost/recm/index.php/api2/ap1Ind1";
        //$url = $baseUrl;
        $data = file_get_contents($url);
        $model= CJSON::decode($data);*/
   $id2=10;
 ?>
 <div class="customContent">
 <div class="row">       
<div class="col-md-2 apartado">
Produccion
</div>
<div class="col-md-10">
<div>
<?php
$resultado = Menus::model()->findAll((array(
    'condition'=>"parent_id=$id2",
    'order'=>'position'
  )));
echo CHtml::tag('ul',array('id'=>'my-list'));
foreach ($resultado as $key => $row) {

                    
                    echo CHtml::tag('li');
                    echo CHtml::link($row->label, array('/site/main/'.$row->id));
                    echo CHtml::closeTag('li');
}
echo CHtml::closeTag('ul');
?>
</div>
</div>
</div>
<div class="row">       
<div class="col-md-4">
<div align="center">
	
</div>
</div>
<div class="col-md-4">
<div align="center">

</div>
</div>
<div class="col-md-4">
<div align="center">

</div>
</div>
</div>

</p>
		<!-- ESTA GRAFICA TIENE UNA FALLA EN EL JSON POR EL MOMENTPO ESTA ESTATIC -->        
		       </p>
		        
		        <p class="table_title default">Producto interno bruto por habitante, 2012</p>
		        
		        <div class="default">
		        	<table class="table600_stats">
			        	
			        	<tr class="cell_label">
			        		<td></td>
			        		<td>PIB a precios constantes (millones de pesos)</td>	
			        		<td>Tipo de cambio dólar 2012 Banxico</td> 	
			        		<td>Dólares (millones de dólares)</td>	
			        		<td>Población 2012 CONAPO</td>	
			        		<td>PIB per cápita a precios constantes (pesos)</td>	
			        		<td>PIB per cápita a precios constantes (dólares)</td>
			        	</tr>
			        	
			        	<tr class="rEven">
			        		<td>Distrito Federal</td>
			        		<td class="data">2,204,492</td>	
			        		<td class="data">13.1689</td>	
			        		<td class="data">167</td>	
			        		<td class="data">8,911,665</td>	
			        		<td class="data">247,372</td>	
			        		<td class="data">18,784</td>
			        	</tr>
			        	
			        	<tr class="rOdd">
			        		<td>Nacional</td>
			        		<td class="data">12,912,907</td>
			        		<td class="data">13.1689</td>	
			        		<td class="data">981</td>	
			        		<td class="data">117,053,750</td>	
			        		<td class="data">110,316</td>	
			        		<td class="data">8,377</td>
			        	</tr>
			        	
			        	<tr class="cell_label">
			        		<td></td>
			        		<td>PIB a precios corrientes (millones de pesos)</td>	
			        		<td>Tipo de cambio dólar 2012 Banxico</td> 	
			        		<td>Dólares (millones de dólares)</td>	
			        		<td>Población 2012 CONAPO</td>	
			        		<td>PIB per cápita a precios corrientes (pesos)</td>	
			        		<td>PIB per cápita a precios corrientes (dólares)</td>
			        	</tr>
			        		
			        	<tr class="rEven">
			        		<td>Distrito Federal</td>
			        		<td class="data">2,472,925</td>	
			        		<td class="data">13.1689</td>	
			        		<td class="data">188</td>	
			        		<td class="data">8,911,665</td>	
			        		<td class="data">277,493</td>	
			        		<td class="data">21,072</td>
			        	</tr>
			        	
			        	<tr class="rOdd">
			        		<td>Nacional</td>
			        		<td class="data">15,078,276</td>
			        		<td class="data">13.1689</td>	
			        		<td class="data">1,145</td>	
			        		<td class="data">117,053,750</td>	
			        		<td class="data">128,815</td>	
			        		<td class="data">9,782</td>
			        	</tr>
			        	
			        	

			        </table>
			        
			      <div class="table_explanation">
				        <p class="table_exp_source"><span>Fuente: </span>Sistema de Cuentas Nacionales; CONAPO, Proyecciones de población 2010-2030</p>
			        </div>
		        </div>

		      
		        
</div>

	