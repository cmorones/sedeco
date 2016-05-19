<?php
/* @var $this Ap3Ind31Controller */
/* @var $model Ap3Ind31 */

$this->breadcrumbs=array(
	'Ap3 Ind31s'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap3Ind31', 'url'=>array('index')),
	array('label'=>'Create Ap3Ind31', 'url'=>array('create')),
	array('label'=>'Update Ap3Ind31', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap3Ind31', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap3Ind31', 'url'=>array('admin')),
);
?>

<h1>View Ap3Ind31 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'anio',
		'mes',
		'entidad',
		'valor',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
	),
)); ?>
