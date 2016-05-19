<?php
/* @var $this Ap1Ind4gController */
/* @var $model Ap1Ind4g */

$this->breadcrumbs=array(
	'Ap1 Ind4gs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap1Ind4g', 'url'=>array('index')),
	array('label'=>'Manage Ap1Ind4g', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>