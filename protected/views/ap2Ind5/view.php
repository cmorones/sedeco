<?php
/* @var $this Ap2Ind5Controller */
/* @var $model Ap2Ind5 */

$this->breadcrumbs=array(
	'Ap2 Ind5s'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ap2Ind5', 'url'=>array('index')),
	array('label'=>'Create Ap2Ind5', 'url'=>array('create')),
	array('label'=>'Update Ap2Ind5', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ap2Ind5', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ap2Ind5', 'url'=>array('admin')),
);
?>

<h1>View Ap2Ind5 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
	),
)); ?>
