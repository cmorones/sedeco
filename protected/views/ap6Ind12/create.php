<?php
/* @var $this Ap6Ind12Controller */
/* @var $model Ap6Ind12 */

$this->breadcrumbs=array(
	'Ap6 Ind12s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap6Ind12', 'url'=>array('index')),
	array('label'=>'Manage Ap6Ind12', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>