
<div class="page-header">
  <h2>Infografías (Apéndice)</h2>
</div>

<a href="<?php echo CController::createUrl('infografia/create'); ?>" class="btn btn-success pull-left"><i class="glyphicon glyphicon-plus"></i> Agregar</a>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'infografia-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		//'id',
		'nombre',
		'filename',
		'alt',
	//	'status',
	//	'fecha_reg',
		/*
		'fecha_mod',
		'user_reg',
		'user_mod',
		*/
			array
(
    'class'=>'CButtonColumn',
    'template'=>'{update}{borrar}',
    'buttons'=>array
    (
        'borrar' => array
        (
            'label'=>'',
            'imageUrl'=>Yii::app()->request->baseUrl.'/images/incorrecto.png',
            'url'=>'Yii::app()->createUrl("infografia/borrar", array("id"=>$data->id))',
            'options' => array(
            'confirm'=>'Estas seguro de eliminar?',
            ),
        ),
        
    ),
),
	
	),
)); ?>
