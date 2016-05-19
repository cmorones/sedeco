<?php
/* @var $this Ap3Ind2aController */
/* @var $model Ap3Ind2a */

$this->breadcrumbs=array(
	'Ap3 Ind2as'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap3Ind2a', 'url'=>array('index')),
	array('label'=>'Create Ap3Ind2a', 'url'=>array('create')),
	array('label'=>'Update Ap3Ind2a', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap3Ind2a', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap3Ind2a', 'url'=>array('admin')),
);
?>

<h1>View Ap3Ind2a #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'trimestre',
		'anio',
		'rubro',
		'pea',
		'po',
		'pdes',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
	),
)); ?>
