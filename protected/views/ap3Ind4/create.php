<?php
/* @var $this Ap3Ind4Controller */
/* @var $model Ap3Ind4 */

$this->breadcrumbs=array(
	'Ap3 Ind4s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap3Ind4', 'url'=>array('index')),
	array('label'=>'Manage Ap3Ind4', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>