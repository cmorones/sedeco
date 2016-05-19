<?php
/* @var $this Ap5Ind3Controller */
/* @var $model Ap5Ind3 */

$this->breadcrumbs=array(
	'Ap5 Ind3s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap5Ind3', 'url'=>array('index')),
	array('label'=>'Manage Ap5Ind3', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>