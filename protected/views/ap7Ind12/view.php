<?php
/* @var $this Ap7Ind12Controller */
/* @var $model Ap7Ind12 */

$this->breadcrumbs=array(
	'Ap7 Ind12s'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap7Ind12', 'url'=>array('index')),
	array('label'=>'Create Ap7Ind12', 'url'=>array('create')),
	array('label'=>'Update Ap7Ind12', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap7Ind12', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap7Ind12', 'url'=>array('admin')),
);
?>

<h1>View Ap7Ind12 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'anio',
		'valor',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
	),
)); ?>
