<?php
/* @var $this IndicadoresController */
/* @var $model Indicadores */

$this->breadcrumbs=array(
	'Indicadores'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Indicadores', 'url'=>array('index')),
	array('label'=>'Manage Indicadores', 'url'=>array('admin')),
);
?>

<h1>Create Indicadores</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>