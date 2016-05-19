<?php
/* @var $this Ap2Ind3Controller */
/* @var $model Ap2Ind3 */

$this->breadcrumbs=array(
	'Ap2 Ind3s'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap2Ind3', 'url'=>array('index')),
	array('label'=>'Create Ap2Ind3', 'url'=>array('create')),
	array('label'=>'Update Ap2Ind3', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap2Ind3', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap2Ind3', 'url'=>array('admin')),
);
?>

<h1>View Ap2Ind3 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'anio',
		'mes',
		'df',
		'nacional',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
		'periodo_id',
	),
)); ?>
