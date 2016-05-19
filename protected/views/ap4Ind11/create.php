<?php
/* @var $this Ap4Ind11Controller */
/* @var $model Ap4Ind11 */

$this->breadcrumbs=array(
	'Ap4 Ind11s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap4Ind11', 'url'=>array('index')),
	array('label'=>'Manage Ap4Ind11', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>