<?php
/* @var $this Ap6Ind2Controller */
/* @var $model Ap6Ind2 */

$this->breadcrumbs=array(
	'Ap6 Ind2s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap6Ind2', 'url'=>array('index')),
	array('label'=>'Manage Ap6Ind2', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>