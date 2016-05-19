<?php
/* @var $this DelegacionesController */
/* @var $model Delegaciones */

$this->breadcrumbs=array(
	'Delegaciones'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Delegaciones', 'url'=>array('index')),
	array('label'=>'Create Delegaciones', 'url'=>array('create')),
	array('label'=>'View Delegaciones', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Delegaciones', 'url'=>array('admin')),
);
?>

<h1>Update Delegaciones <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>