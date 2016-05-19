<?php
/* @var $this Ap9Ind2Controller */
/* @var $model Ap9Ind2 */

$this->breadcrumbs=array(
	'Ap9 Ind2s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap9Ind2', 'url'=>array('index')),
	array('label'=>'Manage Ap9Ind2', 'url'=>array('admin')),
);
?>


<div class="page-header">
  <h2>Agregar registro</h2>
</div>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>