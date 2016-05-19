<?php
/* @var $this Ap1Ind5aController */
/* @var $model Ap1Ind5a */

$this->breadcrumbs=array(
	'Ap1 Ind5as'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap1Ind5a', 'url'=>array('index')),
	array('label'=>'Manage Ap1Ind5a', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>