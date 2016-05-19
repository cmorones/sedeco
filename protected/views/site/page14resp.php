<?php
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
		        
		        <p class="table_title default">
		        	PARTICIPACIÓN PORCENTUAL DE ENTIDADES FEDERATIVAS EN LA
ACTIVIDAD ECONÓMICA. ENTIDADES FEDERATIVAS CON MAYOR
PARTICIPACIÓN EN 2012. (PRECIOS DE 2008)
		        </p>
		   		        <div class="default">
		        	<table class="table600_stats">
			        	<tr class="cell_label">
			        		<td>Entidad Federativa</td>
			        		<td>Participación porcentual en el PIB nacional</td>
			        	</tr>




			     <?php 

foreach ($model as $indice => $valor) {
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
}





?>
		
			        </table>

<div class="row">       
<div class="col-md-4">
<div align="center">
<?php
                  $this->widget('zii.widgets.jui.CJuiButton', array(
                        'buttonType'=>'link',
                        'name'=>'Grafico',
                        'caption'=>'Ver Participación por sector',
                        'value'=>'Grafico',
                        'htmlOptions'=>array('class'=>'btn btn-warning','style'=>'padding: 0px;'),


                        'url' => array('site/grafico/'.$id.''),
                        //'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
                  ));
            ?>

</div>
</div>
<div class="col-md-4">
<div align="center">
	 <?php
                  $this->widget('zii.widgets.jui.CJuiButton', array(
                        'buttonType'=>'link',
                        'name'=>'Grafico1',
                        'caption'=>'Ver Gráfica Participación en las Entidades',
                        'value'=>'Grafico1',
                        'htmlOptions'=>array('class'=>'btn btn-warning','style'=>'padding: 0px;'),


                        'url' => array('site/grafico/'.$id.''),
                        //'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
                  ));
            ?>
</div>
</div>
<div class="col-md-4">
<div align="center">
<?php
                  $this->widget('zii.widgets.jui.CJuiButton', array(
                        'buttonType'=>'link',
                        'name'=>'Grafico2',
                        'caption'=>'Ver Participación por sector',
                        'value'=>'Grafico2',
                        'htmlOptions'=>array('class'=>'btn btn-warning','style'=>'padding: 0px;'),


                        'url' => array('site/grafico/'.$id.''),
                        //'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
                  ));
            ?>
</div>
</div>
</div>
</div>