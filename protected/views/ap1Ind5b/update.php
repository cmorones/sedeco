<?php
/* @var $this Ap1Ind5bController */
/* @var $model Ap1Ind5b */

$this->breadcrumbs=array(
	'Ap1 Ind5bs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ap1Ind5b', 'url'=>array('index')),
	array('label'=>'Create Ap1Ind5b', 'url'=>array('create')),
	array('label'=>'View Ap1Ind5b', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ap1Ind5b', 'url'=>array('admin')),
);
?>

<h1>Update Ap1Ind5b <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>