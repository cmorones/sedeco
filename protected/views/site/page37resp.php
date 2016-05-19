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
		        
		      <p class="table_title default">
		        	Índice de actividad industrial, 2014, Índice 2008=100, promedio trimestral
		        </p>
		        
		      
		        <div class="default">
		        
		        	
		        	
		        	<table class="table600_stats">
			        	<tr class="cell_label"> 
							 <td></td>
							 <td>Trimestre I</td> 
							 <td>Trimesre II</td> 
							 
						</tr>
						<tr class="rEven">
							<td>Distrito Federal</td>
							<td class="data">-5.23</td>
							<td class="data">-5.25</td>
						
						</tr>
						<tr class="rEven">
							<td>Nacional</td>
							<td class="data">-5.23</td>
							<td class="data">-5.25</td>
						
						</tr>
						
			        	
			     



				        		
		
			        </table>
			        
			     <div class="table_explanation">
				       <p class="table_exp_source"><span>Fuente:</span>INEGI. Banco de Información Económica. Cifras preliminares.</p>		
			        </div>
		        </div>

		      
		        
</div>

	