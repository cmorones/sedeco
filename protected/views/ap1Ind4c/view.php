<?php
/* @var $this Ap1Ind4cController */
/* @var $model Ap1Ind4c */

$this->breadcrumbs=array(
	'Ap1 Ind4cs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap1Ind4c', 'url'=>array('index')),
	array('label'=>'Create Ap1Ind4c', 'url'=>array('create')),
	array('label'=>'Update Ap1Ind4c', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap1Ind4c', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap1Ind4c', 'url'=>array('admin')),
);
?>

<h1>View Ap1Ind4c #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_periodo',
		'anio',
		'id_trimestre',
		'pib',
		'igae',
		'itaee',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
	),
)); ?>
