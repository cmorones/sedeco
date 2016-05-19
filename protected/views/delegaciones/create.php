<?php
/* @var $this DelegacionesController */
/* @var $model Delegaciones */

$this->breadcrumbs=array(
	'Delegaciones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Delegaciones', 'url'=>array('index')),
	array('label'=>'Manage Delegaciones', 'url'=>array('admin')),
);
?>

<h1>Create Delegaciones</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>