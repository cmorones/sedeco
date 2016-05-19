<?php
/* @var $this QueEsController */
/* @var $model QueEs */

$this->breadcrumbs=array(
	'Que Es'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List QueEs', 'url'=>array('index')),
	array('label'=>'Create QueEs', 'url'=>array('create')),
	array('label'=>'Update QueEs', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete QueEs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage QueEs', 'url'=>array('admin')),
);
?>

<h1>View QueEs #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'titulo',
		'detalle',
	),
)); ?>
