<?php
$baseUrl2 = YiiBase::getPathOfAlias("webroot");

$grafico= $baseUrl2.'/static/ap1Ind4b.json';

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
		        
            <div class="table_explanation">
                <p class="table_exp_title"><sup>*</sup>Promedio trimestral</p>
                <p class="table_exp_title"><sup>**</sup>El dato del cuarto trimestre del 2013 corresponde a estimaciones propias con base en los datos de la serie desestacionalizada del ITAEE del Distrito Federal</p>
                <p class="table_exp_source"><span>Fuente:</span>INEGI. Banco de Información Económica. Cifras preliminares.</p>   
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
                        'name'=>'Grafico1',
                        'caption'=>'Ver Gráfica',
                        'value'=>'Grafico1',
                        'htmlOptions'=>array('class'=>'btn btn-warning','style'=>'padding: 0px;'),


                        'url' => array('site/grafico/31'),
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