<?php
/* @var $this Ap3Ind5Controller */
/* @var $model Ap3Ind5 */

$this->breadcrumbs=array(
	'Ap3 Ind5s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ap3Ind5', 'url'=>array('index')),
	array('label'=>'Manage Ap3Ind5', 'url'=>array('admin')),
);
?>

<div class="page-header">
  <h2>Agregar registro</h2>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>