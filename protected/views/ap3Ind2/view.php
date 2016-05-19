<?php
/* @var $this Ap3Ind2Controller */
/* @var $model Ap3Ind2 */

$this->breadcrumbs=array(
	'Ap3 Ind2s'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap3Ind2', 'url'=>array('index')),
	array('label'=>'Create Ap3Ind2', 'url'=>array('create')),
	array('label'=>'Update Ap3Ind2', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap3Ind2', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap3Ind2', 'url'=>array('admin')),
);
?>

<h1>View Ap3Ind2 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'anio',
		'trimestre',
		'delegacion',
		'rubro',
		'valor',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
	),
)); ?>
