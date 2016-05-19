<?php
/* @var $this Ap3Ind11aController */
/* @var $model Ap3Ind11a */

$this->breadcrumbs=array(
	'Ap3 Ind11as'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap3Ind11a', 'url'=>array('index')),
	array('label'=>'Create Ap3Ind11a', 'url'=>array('create')),
	array('label'=>'Update Ap3Ind11a', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap3Ind11a', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap3Ind11a', 'url'=>array('admin')),
);
?>

<h1>View Ap3Ind11a #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'anio',
		'trimestre',
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
