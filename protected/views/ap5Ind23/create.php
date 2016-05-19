<?php
/* @var $this Ap5Ind23Controller */
/* @var $model Ap5Ind23 */

$this->breadcrumbs=array(
	'Ap5 Ind23s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap5Ind23', 'url'=>array('index')),
	array('label'=>'Manage Ap5Ind23', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>