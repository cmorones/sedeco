<?php
/* @var $this Ap7Ind2Controller */
/* @var $model Ap7Ind2 */

$this->breadcrumbs=array(
	'Ap7 Ind2s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap7Ind2', 'url'=>array('index')),
	array('label'=>'Manage Ap7Ind2', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>