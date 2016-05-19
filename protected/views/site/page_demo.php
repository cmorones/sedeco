<?php
$baseUrl2 = YiiBase::getPathOfAlias("webroot");

;
		
$id2=154;
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
    'order'=>'id'
  )));
echo CHtml::tag('ul',array('id'=>'my-list'));
foreach ($resultado as $key => $row) {

                    
                    echo CHtml::tag('li');
                    echo CHtml::link($row->label, $row->id);
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

<!-- aqui va el contenido -->
	
			              
<!-- aca termina la tabla -->
     
     
    <div>
     <div align="center"></div>
     <div align="center"></div>
    </div>
</div>

		        <div class="row">       
<div class="col-md-4">
<div align="center">
	    <?php
                  $this->widget('zii.widgets.jui.CJuiButton', array(
                        'buttonType'=>'link',
                        'name'=>'Inicio2',
                        'caption'=>'Grafico',
                        'value'=>'Inicio2',
                        'htmlOptions'=>array('class'=>'btn btn-warning','style'=>'padding: 0px;'),

                        'url' => array('site/grafico/156'),
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
                        'caption'=>'Inversión extranjera<br> directa en el Distrito Federal',
                        'value'=>'Grafico2',
                        'htmlOptions'=>array('class'=>'btn btn-warning','style'=>'padding: 0px;'),

                        'url' => array('site/main/157'),
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