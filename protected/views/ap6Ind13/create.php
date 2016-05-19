<?php
/* @var $this Ap6Ind13Controller */
/* @var $model Ap6Ind13 */

$this->breadcrumbs=array(
	'Ap6 Ind13s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap6Ind13', 'url'=>array('index')),
	array('label'=>'Manage Ap6Ind13', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>