<?php
/* @var $this DelegacionesController */
/* @var $model Delegaciones */

$this->breadcrumbs=array(
	'Delegaciones'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Delegaciones', 'url'=>array('index')),
	array('label'=>'Create Delegaciones', 'url'=>array('create')),
	array('label'=>'Update Delegaciones', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Delegaciones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Delegaciones', 'url'=>array('admin')),
);
?>

<h1>View Delegaciones #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'orden',
	),
)); ?>
