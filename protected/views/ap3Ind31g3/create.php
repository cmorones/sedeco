<?php
/* @var $this Ap3Ind31g3Controller */
/* @var $model Ap3Ind31g3 */

$this->breadcrumbs=array(
	'Ap3 Ind31g3s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap3Ind31g3', 'url'=>array('index')),
	array('label'=>'Manage Ap3Ind31g3', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>