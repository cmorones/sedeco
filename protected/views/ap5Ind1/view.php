<?php
/* @var $this Ap5Ind1Controller */
/* @var $model Ap5Ind1 */

$this->breadcrumbs=array(
	'Ap5 Ind1s'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap5Ind1', 'url'=>array('index')),
	array('label'=>'Create Ap5Ind1', 'url'=>array('create')),
	array('label'=>'Update Ap5Ind1', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap5Ind1', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap5Ind1', 'url'=>array('admin')),
);
?>

<h1>View Ap5Ind1 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'entidad',
		'valor',
		'rubro',
		'anio',
		'mes',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
		'periodo_id',
	),
)); ?>
