<?php
/* @var $this Ap3Ind11Controller */
/* @var $model Ap3Ind11 */

$this->breadcrumbs=array(
	'Ap3 Ind11s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap3Ind11', 'url'=>array('index')),
	array('label'=>'Manage Ap3Ind11', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>