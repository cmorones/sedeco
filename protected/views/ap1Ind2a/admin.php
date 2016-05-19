<?php
/* @var $this Ap1Ind2aController */
/* @var $model Ap1Ind2a */

$this->breadcrumbs=array(
	'Ap1 Ind2as'=>array('index'),
	'Manage',
);

//variable de sesion y periodo activo
$id = Yii::app()->request->getQuery('id');

$this->menu=array(
	//array('label'=>'List Ap9Ind2', 'url'=>array('index')),
	array('label'=>'Agregar', 'url'=>array('create?id='.$id)),
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ap1-ind2a-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-header">
  <h2>Administrar Datos de este periodo</h2>
</div>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ap1-ind2a-grid',
	'dataProvider'=>$model->search($id),
	//'filter'=>$model,
	'columns'=>array(
		//'id',
		
		array(
            'name'=>'id_entidad',
            'value'=>'$data->Entidades->nombre',
            'filter'=>Entidades::model()->options,
            'htmlOptions'=>array('style'=>'width: 200px;  text-align:center;'),
                    ),
		'valor',
		//'fecha_reg',
		//'fecha_mod',
		//'user_reg',
		/*
		'user_mod',
		'anio',
		'periodo_id',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{borrar}',
		    'buttons'=>array
		    (
		        'borrar' => array
		        (
		            'label'=>'',
		            'imageUrl'=>Yii::app()->request->baseUrl.'/images/incorrecto.png',
		            'url'=>'Yii::app()->createUrl("ap1Ind2a/borrar", array("id"=>$data->id))',
		            'options' => array(
		            'confirm'=>'Estas seguro de eliminar?',
		            ),
		        ),
		),
	),
),
)); ?>
