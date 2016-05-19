<?php
/* @var $this Ap8Ind3Controller */
/* @var $model Ap8Ind3 */

$this->breadcrumbs=array(
	'Ap8 Ind3s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap8Ind3', 'url'=>array('index')),
	array('label'=>'Manage Ap8Ind3', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>