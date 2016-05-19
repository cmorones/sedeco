<?php
/* @var $this Ap7Ind2Controller */
/* @var $model Ap7Ind2 */

$this->breadcrumbs=array(
	'Ap7 Ind2s'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap7Ind2', 'url'=>array('index')),
	array('label'=>'Create Ap7Ind2', 'url'=>array('create')),
	array('label'=>'Update Ap7Ind2', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap7Ind2', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap7Ind2', 'url'=>array('admin')),
);
?>

<h1>View Ap7Ind2 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'rubro',
		'ejercicio',
		'estructura',
		'anio',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
		'periodo_id',
	),
)); ?>
