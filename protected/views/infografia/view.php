<?php
/* @var $this InfografiaController */
/* @var $model Infografia */

$this->breadcrumbs=array(
	'Infografias'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Infografia', 'url'=>array('index')),
	array('label'=>'Create Infografia', 'url'=>array('create')),
	array('label'=>'Update Infografia', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Infografia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Infografia', 'url'=>array('admin')),
);
?>

<h1>View Infografia #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'filename',
		'alt',
		'status',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
	),
)); ?>
