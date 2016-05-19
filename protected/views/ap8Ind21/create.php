<?php
/* @var $this Ap8Ind21Controller */
/* @var $model Ap8Ind21 */

$this->breadcrumbs=array(
	'Ap8 Ind21s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap8Ind21', 'url'=>array('index')),
	array('label'=>'Manage Ap8Ind21', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>