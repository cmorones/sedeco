<?php
/* @var $this Ap2Ind4Controller */
/* @var $model Ap2Ind4 */

$this->breadcrumbs=array(
	'Ap2 Ind4s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap2Ind4', 'url'=>array('index')),
	array('label'=>'Manage Ap2Ind4', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>