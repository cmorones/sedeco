<?php
/* @var $this Ap1Ind82Controller */
/* @var $model Ap1Ind82 */

$this->breadcrumbs=array(
	'Ap1 Ind82s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap1Ind82', 'url'=>array('index')),
	array('label'=>'Manage Ap1Ind82', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>