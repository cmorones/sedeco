<div class="row botonera-autorizar">
        <?php
        			error_reporting(0);
        		$indicador=$this->traerIndicador($ind);
				 
				  $this->widget('zii.widgets.jui.CJuiButton', array(
				  	    'buttonType'=>'link',
						'name'=>'Regresar',
						'caption'=>'Regresar',
						'value'=>'Regresar',
						'htmlOptions'=>array('class'=>'btn btn-info pull-left','style'=>'padding: 0px;'),


						'url' => array('historicoPeriodos/'.$ind.''),
						//'onclick'=>new CJavaScriptExpression('function(){alert("Al autorizar se publicara en la pagina web"); this.blur(); return false;}'),
				  ));
				
			?>

			</div>

<div class="page-header">
  <h2><?=$indicador?></h2>
</div>
<div class="span12">

<?php $this->renderPartial('_form'.$config.'', array('model'=>$model, 'ind'=>$ind, 'config'=>$config)); ?>
</div>