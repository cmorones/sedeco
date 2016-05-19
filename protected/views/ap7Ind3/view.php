<?php
/* @var $this Ap7Ind3Controller */
/* @var $model Ap7Ind3 */

$this->breadcrumbs=array(
	'Ap7 Ind3s'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap7Ind3', 'url'=>array('index')),
	array('label'=>'Create Ap7Ind3', 'url'=>array('create')),
	array('label'=>'Update Ap7Ind3', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap7Ind3', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap7Ind3', 'url'=>array('admin')),
);
?>

<h1>View Ap7Ind3 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'rubro',
		'saldo1',
		'colocacion1',
		'amortizacion1',
		'colocacion2',
		'amortizacion2',
		'actualizacion2',
		'saldo2',
		'endeudamiento',
		'anio',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
		'periodo_id',
	),
)); ?>
