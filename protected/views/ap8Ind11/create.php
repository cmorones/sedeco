<?php
/* @var $this Ap8Ind11Controller */
/* @var $model Ap8Ind11 */

$this->breadcrumbs=array(
	'Ap8 Ind11s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap8Ind11', 'url'=>array('index')),
	array('label'=>'Manage Ap8Ind11', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>