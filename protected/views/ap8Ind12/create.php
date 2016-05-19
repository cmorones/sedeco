<?php
/* @var $this Ap8Ind12Controller */
/* @var $model Ap8Ind12 */

$this->breadcrumbs=array(
	'Ap8 Ind12s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap8Ind12', 'url'=>array('index')),
	array('label'=>'Manage Ap8Ind12', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>