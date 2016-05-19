<?php
/* @var $this Ap4Ind4Controller */
/* @var $model Ap4Ind4 */

$this->breadcrumbs=array(
	'Ap4 Ind4s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap4Ind4', 'url'=>array('index')),
	array('label'=>'Manage Ap4Ind4', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>