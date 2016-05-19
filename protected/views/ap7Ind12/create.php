<?php
/* @var $this Ap7Ind12Controller */
/* @var $model Ap7Ind12 */

$this->breadcrumbs=array(
	'Ap7 Ind12s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap7Ind12', 'url'=>array('index')),
	array('label'=>'Manage Ap7Ind12', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>