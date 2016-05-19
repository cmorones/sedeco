<?php
/* @var $this Ap4Ind2Controller */
/* @var $model Ap4Ind2 */

$this->breadcrumbs=array(
	'Ap4 Ind2s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap4Ind2', 'url'=>array('index')),
	array('label'=>'Manage Ap4Ind2', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>