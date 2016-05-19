<?php
/* @var $this Ap1Ind2aController */
/* @var $model Ap1Ind2a */

$this->breadcrumbs=array(
	'Ap1 Ind2as'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ap1Ind2a', 'url'=>array('index')),
	array('label'=>'Create Ap1Ind2a', 'url'=>array('create')),
	array('label'=>'View Ap1Ind2a', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ap1Ind2a', 'url'=>array('admin')),
);
?>

<h1>Update Ap1Ind2a <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>