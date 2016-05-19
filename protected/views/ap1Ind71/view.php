<?php
/* @var $this Ap1Ind71Controller */
/* @var $model Ap1Ind71 */

$this->breadcrumbs=array(
	'Ap1 Ind71s'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap1Ind71', 'url'=>array('index')),
	array('label'=>'Create Ap1Ind71', 'url'=>array('create')),
	array('label'=>'Update Ap1Ind71', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap1Ind71', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap1Ind71', 'url'=>array('admin')),
);
?>

<h1>View Ap1Ind71 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'entidad',
		'valor',
		'anio',
		'mes',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
		'columna',
		'periodo_id',
	),
)); ?>
