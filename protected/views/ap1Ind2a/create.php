<?php
/* @var $this Ap1Ind2aController */
/* @var $model Ap1Ind2a */

$this->breadcrumbs=array(
	'Ap1 Ind2as'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap1Ind2a', 'url'=>array('index')),
	array('label'=>'Manage Ap1Ind2a', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>