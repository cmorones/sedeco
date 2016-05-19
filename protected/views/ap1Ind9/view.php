<?php
/* @var $this Ap1Ind9Controller */
/* @var $model Ap1Ind9 */

$this->breadcrumbs=array(
	'Ap1 Ind9s'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap1Ind9', 'url'=>array('index')),
	array('label'=>'Create Ap1Ind9', 'url'=>array('create')),
	array('label'=>'Update Ap1Ind9', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap1Ind9', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap1Ind9', 'url'=>array('admin')),
);
?>

<h1>View Ap1Ind9 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'anio',
		'rubro',
		'valor',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
		'periodo_id',
	),
)); ?>
