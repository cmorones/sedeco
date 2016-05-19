<?php
/* @var $this Ap1Ind4bController */
/* @var $model Ap1Ind4b */

$this->breadcrumbs=array(
	'Ap1 Ind4bs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap1Ind4b', 'url'=>array('index')),
	array('label'=>'Create Ap1Ind4b', 'url'=>array('create')),
	array('label'=>'Update Ap1Ind4b', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap1Ind4b', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap1Ind4b', 'url'=>array('admin')),
);
?>

<h1>View Ap1Ind4b #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'anio',
		'id_trimestre',
		'id_sector',
		'valor',
		'vp',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
		'periodo_id',
	),
)); ?>
