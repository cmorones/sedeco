<?php
/* @var $this Ap4Ind12aController */
/* @var $model Ap4Ind12a */

$this->breadcrumbs=array(
	'Ap4 Ind12as'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap4Ind12a', 'url'=>array('index')),
	array('label'=>'Create Ap4Ind12a', 'url'=>array('create')),
	array('label'=>'Update Ap4Ind12a', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap4Ind12a', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap4Ind12a', 'url'=>array('admin')),
);
?>

<h1>View Ap4Ind12a #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'rubro',
		'valor',
		'rubro2',
		'trimestre',
		'apartado',
		'anio',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
		'periodo_id',
	),
)); ?>
