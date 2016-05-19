<?php
$baseUrl2 = YiiBase::getPathOfAlias("webroot");

$grafico= $baseUrl2.'/static/ap1Ind1.json';

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

                    if($id=$row->id){
						echo CHtml::tag('li', array('class'=>'active'));
                    }else{
                    	echo CHtml::tag('li');
                    	
                    }
                    
                    echo CHtml::link($row->label, array('/site/main/'.$row->id));
                    echo CHtml::closeTag('li');
}
echo CHtml::closeTag('ul');
?>
 <ul class="nav nav-pills">
                                  <?php
                                        $resultado = Menus::model()->findAll((array(
                                            'condition'=>"parent_id=$id2",
                                            'order'=>'position'
                                          )));
                                      //  echo CHtml::tag('ul',array('nav'=>'nav nav-pills'));
                                        foreach ($resultado as $key => $row) {

                                                           if($id=$row->id){
																	echo CHtml::tag('li',array('role'=>'presentation'));
											                    }else{
											                    	echo CHtml::tag('li',array('role'=>'presentation'));
											                    	
											                    }  
                                                           
                                                            echo CHtml::link($row->label, array('/site/main/'.$row->id));
                                                            echo CHtml::closeTag('li');
                                        }
                                       // echo CHtml::closeTag('ul');
                                  ?>
                                   </ul>

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
		        	VALOR AGREGADO CENSAL BRUTO EN EL DISTRITO FEDERAL POR DELEGACIÓN Y SUBSECTOR DE ACTIVIDAD ECONÓMICA, 2009
		        </p>
		        
		       
		        
		        <div class="default">
		        	<table class="table600_stats">
			        	<tr>
			        		<td class="invisible"></td>
			        		<td colspan="19" class="span_time">Valor agregado censal bruto</td>
			        	</tr>



			        	<tr class="cell_label">
			        		<td>Subsector de actividad económica</td>
			        		<td>Distrito Federal</td>
			        		<td>Azcapotzalco</td>
			        		<td>Coyoacán</td>
							<td>Cuajimalpa de Morelos</td>
							<td>Gustavo A. Madero</td>
							<td>Iztacalco</td>
							<td>Iztapalapa</td>
							<td>Magdalena Contreras</td>
							<td>Milpa Alta</td>
							<td>Álvaro Obregón</td>
							<td>Tláhuac</td>
							<td>Tlalpan</td>
							<td>Xochimilco</td>
							<td>Benito Juárez</td>
							<td>Cuauhtémoc</td>
							<td>Miguel Hidalgo</td>
							<td>Venustiano Carranza</td>
			        	</tr>


			     <?php 
$totaldf =0;
echo "<tr class=\"rEven\">			        		
			        		<td>Total</td>
			        		<td class=\"data\">".$gran_totaldf."</td>
			        		<td class=\"data\">".$gran_azcapotzalco."</td>
			        		<td class=\"data\">".$gran_coyoacan."</td>
			        		<td class=\"data\">".$gran_cuajimalpa."</td>
			        		<td class=\"data\">".$gran_gam."</td>
			        		<td class=\"data\">".$gran_iztacalco."</td>
			        		<td class=\"data\">".$gran_iztapalapa."</td>
			        		<td class=\"data\">".$gran_contreras."</td>
			        		<td class=\"data\">".$gran_milpaalta."</td>
			        		<td class=\"data\">".$gran_obregon."</td>
			        		<td class=\"data\">".$gran_tlahuac."</td>
			        		<td class=\"data\">".$gran_tlalpan."</td>
			        		<td class=\"data\">".$gran_xochimilco."</td>
			        		<td class=\"data\">".$gran_benito."</td>
			        		<td class=\"data\">".$gran_cuautemoc."</td>
			        		<td class=\"data\">".$gran_hidalgo."</td>
			        		<td class=\"data\">".$gran_venustiano."</td>
			        	</tr>";
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
					   		}
			   			}
			   		}
			   	}



    $azcapotzalco =number_format($model[$indice][$indice2]['2'][$indice4],0);
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

}



?>
		
			        </table>
			        
			        <div class="table_explanation">
				        <p class="table_exp_source"><span>Fuente:</span>INEGI, Censo Económico 2009, consulta electrónica en: http://www.inegi.org.mx/est/contenidos/espanol/proyectos/censos/ce2009/default.asp?s=est&c=14220</p>
			        </div>
			       <div>
			       	<div align="center"></div>
			       	<div align="center"></div>
			       </div>
		        </div>

		        <div class="row">       
<div class="col-md-4">
<div align="center">
	
</div>
</div>
<div class="col-md-4">
<div align="center">
	 <?php
                  $this->widget('zii.widgets.jui.CJuiButton', array(
                        'buttonType'=>'link',
                        'name'=>'Grafico2',
                        'caption'=>'Mostrar Grafico',
                        'value'=>'Grafico2',
                        'htmlOptions'=>array('class'=>'btn btn-warning','style'=>'padding: 0px;'),


                        'url' => array('site/grafico/'.$id.''),
                        //'onclick'=>new CJavaScriptExpression('function(){alert("Save button has been clicked"); this.blur(); return false;}'),
                  ));
            ?>
</div>
</div>
<div class="col-md-4">
<div align="center">
	
</div>
</div>
</div>
</div>
