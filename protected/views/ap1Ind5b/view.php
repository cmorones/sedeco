<?php
/* @var $this Ap1Ind5bController */
/* @var $model Ap1Ind5b */

$this->breadcrumbs=array(
	'Ap1 Ind5bs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap1Ind5b', 'url'=>array('index')),
	array('label'=>'Create Ap1Ind5b', 'url'=>array('create')),
	array('label'=>'Update Ap1Ind5b', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap1Ind5b', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap1Ind5b', 'url'=>array('admin')),
);
?>

<h1>View Ap1Ind5b #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'entidad',
		'anio',
		'mes',
		'rubro',
		'valor',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
		'periodo_id',
	),
)); ?>
