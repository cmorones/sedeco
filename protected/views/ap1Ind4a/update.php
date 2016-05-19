<?php
/* @var $this Ap1Ind4aController */
/* @var $model Ap1Ind4a */

$this->breadcrumbs=array(
	'Ap1 Ind4as'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ap1Ind4a', 'url'=>array('index')),
	array('label'=>'Create Ap1Ind4a', 'url'=>array('create')),
	array('label'=>'View Ap1Ind4a', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ap1Ind4a', 'url'=>array('admin')),
);
?>

<h1>Update Ap1Ind4a <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>