<?php
/* @var $this HomeReportesController */
/* @var $model HomeReportes */

$this->breadcrumbs=array(
	'Home Reportes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List HomeReportes', 'url'=>array('index')),
	array('label'=>'Create HomeReportes', 'url'=>array('create')),
	array('label'=>'Update HomeReportes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete HomeReportes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HomeReportes', 'url'=>array('admin')),
);
?>

<h1>View HomeReportes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre_btn',
		'archivo',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
	),
)); ?>
