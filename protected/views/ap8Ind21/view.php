<?php
/* @var $this Ap8Ind21Controller */
/* @var $model Ap8Ind21 */

$this->breadcrumbs=array(
	'Ap8 Ind21s'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap8Ind21', 'url'=>array('index')),
	array('label'=>'Create Ap8Ind21', 'url'=>array('create')),
	array('label'=>'Update Ap8Ind21', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap8Ind21', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap8Ind21', 'url'=>array('admin')),
);
?>

<h1>View Ap8Ind21 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'anio',
		'rubro',
		'unidades',
		'personal',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
		'periodo_id',
	),
)); ?>
