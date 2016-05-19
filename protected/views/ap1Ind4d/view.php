<?php
/* @var $this Ap1Ind4dController */
/* @var $model Ap1Ind4d */

$this->breadcrumbs=array(
	'Ap1 Ind4ds'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap1Ind4d', 'url'=>array('index')),
	array('label'=>'Create Ap1Ind4d', 'url'=>array('create')),
	array('label'=>'Update Ap1Ind4d', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap1Ind4d', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap1Ind4d', 'url'=>array('admin')),
);
?>

<h1>View Ap1Ind4d #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_periodo',
		'id_entidad',
		'anio',
		'id_trimestre',
		'vp',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
	),
)); ?>
