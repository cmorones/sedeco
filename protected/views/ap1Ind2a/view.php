<?php
/* @var $this Ap1Ind2aController */
/* @var $model Ap1Ind2a */

$this->breadcrumbs=array(
	'Ap1 Ind2as'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap1Ind2a', 'url'=>array('index')),
	array('label'=>'Create Ap1Ind2a', 'url'=>array('create')),
	array('label'=>'Update Ap1Ind2a', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap1Ind2a', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap1Ind2a', 'url'=>array('admin')),
);
?>

<h1>View Ap1Ind2a #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_entidad',
		'valor',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
		'anio',
		'periodo_id',
	),
)); ?>
