<?php
/* @var $this Ap1Ind1Controller */
/* @var $model Ap1Ind1 */

$this->breadcrumbs=array(
	'Ap1 Ind1s'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap1Ind1', 'url'=>array('index')),
	array('label'=>'Create Ap1Ind1', 'url'=>array('create')),
	array('label'=>'Update Ap1Ind1', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap1Ind1', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap1Ind1', 'url'=>array('admin')),
);
?>

<h1>View Ap1Ind1 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_periodo',
		'entidad',
		'municipio',
		'actividad',
		'valor',
		'usuario',
		'fecha_reg',
	),
)); ?>
