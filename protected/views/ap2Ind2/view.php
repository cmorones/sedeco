<?php
/* @var $this Ap2Ind2Controller */
/* @var $model Ap2Ind2 */

$this->breadcrumbs=array(
	'Ap2 Ind2s'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap2Ind2', 'url'=>array('index')),
	array('label'=>'Create Ap2Ind2', 'url'=>array('create')),
	array('label'=>'Update Ap2Ind2', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap2Ind2', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap2Ind2', 'url'=>array('admin')),
);
?>

<h1>View Ap2Ind2 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
	),
)); ?>
