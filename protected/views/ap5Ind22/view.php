<?php
/* @var $this Ap5Ind22Controller */
/* @var $model Ap5Ind22 */

$this->breadcrumbs=array(
	'Ap5 Ind22s'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap5Ind22', 'url'=>array('index')),
	array('label'=>'Create Ap5Ind22', 'url'=>array('create')),
	array('label'=>'Update Ap5Ind22', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap5Ind22', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap5Ind22', 'url'=>array('admin')),
);
?>

<h1>View Ap5Ind22 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'rubro',
		'df',
		'total',
		'anio',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
		'periodo_id',
	),
)); ?>
