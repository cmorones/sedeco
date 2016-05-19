<?php
/* @var $this Ap3Ind11Controller */
/* @var $model Ap3Ind11 */

$this->breadcrumbs=array(
	'Ap3 Ind11s'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap3Ind11', 'url'=>array('index')),
	array('label'=>'Create Ap3Ind11', 'url'=>array('create')),
	array('label'=>'Update Ap3Ind11', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap3Ind11', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap3Ind11', 'url'=>array('admin')),
);
?>

<h1>View Ap3Ind11 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'anio',
		'trimestre',
		'delegacion',
		'pea',
		'po',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
		'periodo_id',
	),
)); ?>
