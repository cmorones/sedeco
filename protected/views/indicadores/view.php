<?php
/* @var $this IndicadoresController */
/* @var $model Indicadores */

$this->breadcrumbs=array(
	'Indicadores'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Indicadores', 'url'=>array('index')),
	array('label'=>'Create Indicadores', 'url'=>array('create')),
	array('label'=>'Update Indicadores', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Indicadores', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Indicadores', 'url'=>array('admin')),
);
?>

<h1>View Indicadores #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_ind',
		'descripcion',
		'img',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
	),
)); ?>
