<?php
/* @var $this Ap1Ind81Controller */
/* @var $model Ap1Ind81 */

$this->breadcrumbs=array(
	'Ap1 Ind81s'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap1Ind81', 'url'=>array('index')),
	array('label'=>'Create Ap1Ind81', 'url'=>array('create')),
	array('label'=>'Update Ap1Ind81', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap1Ind81', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap1Ind81', 'url'=>array('admin')),
);
?>

<h1>View Ap1Ind81 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'anio',
		'entidad',
		'valor',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
		'periodo_id',
	),
)); ?>
