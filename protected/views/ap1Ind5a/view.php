<?php
/* @var $this Ap1Ind5aController */
/* @var $model Ap1Ind5a */

$this->breadcrumbs=array(
	'Ap1 Ind5as'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap1Ind5a', 'url'=>array('index')),
	array('label'=>'Create Ap1Ind5a', 'url'=>array('create')),
	array('label'=>'Update Ap1Ind5a', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap1Ind5a', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap1Ind5a', 'url'=>array('admin')),
);
?>

<h1>View Ap1Ind5a #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_periodo',
		'id_entidad',
		'anio',
		'id_mes',
		'valor_entidad',
		'valor_nacional',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
	),
)); ?>
