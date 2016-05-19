<?php
/* @var $this Ap9Ind1Controller */
/* @var $model Ap9Ind1 */

$this->breadcrumbs=array(
	'Ap9 Ind1s'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap9Ind1', 'url'=>array('index')),
	array('label'=>'Create Ap9Ind1', 'url'=>array('create')),
	array('label'=>'Update Ap9Ind1', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap9Ind1', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap9Ind1', 'url'=>array('admin')),
);
?>

<h1>View Ap9Ind1 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'habitaciones',
		'ocupacion',
		'anio',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
		'periodo_id',
	),
)); ?>
