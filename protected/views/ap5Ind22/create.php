<?php
/* @var $this Ap5Ind22Controller */
/* @var $model Ap5Ind22 */

$this->breadcrumbs=array(
	'Ap5 Ind22s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap5Ind22', 'url'=>array('index')),
	array('label'=>'Manage Ap5Ind22', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>