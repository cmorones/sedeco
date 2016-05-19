<?php
/* @var $this Ap4Ind31Controller */
/* @var $model Ap4Ind31 */

$this->breadcrumbs=array(
	'Ap4 Ind31s'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap4Ind31', 'url'=>array('index')),
	array('label'=>'Create Ap4Ind31', 'url'=>array('create')),
	array('label'=>'Update Ap4Ind31', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap4Ind31', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap4Ind31', 'url'=>array('admin')),
);
?>

<h1>View Ap4Ind31 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'anio',
		'mes',
		'entidad',
		'valor',
		'columna',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
		'periodo_id',
	),
)); ?>
