<?php
/* @var $this Ap6Ind11Controller */
/* @var $model Ap6Ind11 */

$this->breadcrumbs=array(
	'Ap6 Ind11s'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap6Ind11', 'url'=>array('index')),
	array('label'=>'Create Ap6Ind11', 'url'=>array('create')),
	array('label'=>'Update Ap6Ind11', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap6Ind11', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap6Ind11', 'url'=>array('admin')),
);
?>

<h1>View Ap6Ind11 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'rubro',
		'df',
		'nacional',
		'mes',
		'anio',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
		'periodo_id',
	),
)); ?>
