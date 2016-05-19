<?php
/* @var $this HomePrincipalController */
/* @var $model HomePrincipal */

$this->breadcrumbs=array(
	'Home Principals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List HomePrincipal', 'url'=>array('index')),
	array('label'=>'Manage HomePrincipal', 'url'=>array('admin')),
);
?>

<h1>Create HomePrincipal</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>