<?php
/* @var $this Ap3Ind31g1Controller */
/* @var $model Ap3Ind31g1 */

$this->breadcrumbs=array(
	'Ap3 Ind31g1s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap3Ind31g1', 'url'=>array('index')),
	array('label'=>'Manage Ap3Ind31g1', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>