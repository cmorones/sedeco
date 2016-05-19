<?php
/* @var $this Ap5Ind1Controller */
/* @var $model Ap5Ind1 */

$this->breadcrumbs=array(
	'Ap5 Ind1s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap5Ind1', 'url'=>array('index')),
	array('label'=>'Manage Ap5Ind1', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>