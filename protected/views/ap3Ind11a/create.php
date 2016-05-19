<?php
/* @var $this Ap3Ind11aController */
/* @var $model Ap3Ind11a */

$this->breadcrumbs=array(
	'Ap3 Ind11as'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap3Ind11a', 'url'=>array('index')),
	array('label'=>'Manage Ap3Ind11a', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>