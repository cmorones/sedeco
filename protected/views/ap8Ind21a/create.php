<?php
/* @var $this Ap8Ind21aController */
/* @var $model Ap8Ind21a */

$this->breadcrumbs=array(
	'Ap8 Ind21as'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap8Ind21a', 'url'=>array('index')),
	array('label'=>'Manage Ap8Ind21a', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>