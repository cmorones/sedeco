<?php
/* @var $this QueEsController */
/* @var $model QueEs */

$this->breadcrumbs=array(
	'Que Es'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List QueEs', 'url'=>array('index')),
	array('label'=>'Manage QueEs', 'url'=>array('admin')),
);
?>

<h1>Create QueEs</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>